<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use Carbon\Carbon;
use App\Service;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{

    public function index (Request $request) {


        $data = $request->all();
        
        $lat = $data['lat'];
        $lng = $data['lng'];

        $sponsoreds = [];
        $apartment_sponsors = Apartment::join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '>', Carbon::now());
        $apartment_query_sponsoreds = $apartment_sponsors->get();
        // $apartments = DB::table('apartments')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->doesntHave('sponsors');
        $apartment_query = Apartment::whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id');
        $apartment_query2 = Apartment::join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now());

        $apartments1 = scopeIsWithinMaxDistance($apartment_query,$lat , $lng, 20);
        $apartments2 = scopeIsWithinMaxDistance($apartment_query2,$lat , $lng, 20);
        // $apartments = $apartments1->merge($apartments2);

        foreach ($apartment_query_sponsoreds as $apartment_query_sponsored) {
            array_push($sponsoreds, $apartment_query_sponsored);
        }

        $array_results = [];

        foreach ($apartments1 as $apartment1) {
            array_push($array_results, $apartment1);
        }

        foreach ($sponsoreds as $sponsored) {
            foreach ($apartments2 as $apartment2) {
                if($apartment2->apartment_id == $sponsored->apartment_id) {
                    
                } elseif (in_array($apartment2, $array_results)) {

                } else {
                    array_push($array_results, $apartment2);
                }
            }
        }
        

    //    return view ('home', compact('apartments'))->render() ;


        return response()->json([
            'success' => true,
            'results' => $array_results ]);
    }

      public function stamp (Request $request) {

        $mutable = Carbon::now();
        $apartments = DB::table('apartments')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id' )->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('end_date' , '>' , $mutable)->get();

        return response()->json([
            'success' => true,
            'count' => $apartments->count(),
            'results' => $apartments ]);
    }

    public function filtered (Request $request){
        $data = $request->all();
        $number_of_beds = $data['number_of_beds'];
        $number_of_rooms = $data['number_of_rooms'];
        $radius = $data['radius'];
        $lat = $data['lat'];
        $lng = $data['lng'];
        if ($number_of_rooms == '' && $number_of_beds == '') {
            $results = scopeIsWithinMaxDistance(Apartment::with('services','sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id'),$lat,$lng,$radius);
        } elseif($number_of_rooms == '' && $number_of_beds != '') {
            $results = scopeIsWithinMaxDistance(Apartment::with('services','sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_beds', '=', $number_of_beds),$lat,$lng,$radius);
        } elseif($number_of_rooms != '' && $number_of_beds == '') {
            $results = scopeIsWithinMaxDistance(Apartment::with('services','sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_rooms', '=', $number_of_rooms),$lat,$lng,$radius);
        } else {
            $results = scopeIsWithinMaxDistance(Apartment::with('services','sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_beds', '=', $number_of_beds)->where('apartments.number_of_rooms', '=', $number_of_rooms),$lat,$lng,$radius);
        }

        return response()->json([
            'success' => true,
            'results' => $results]);
    }
}

function scopeIsWithinMaxDistance($query, $lat, $lon, $radius) {

    $calculationsForDistance = "(6371 * acos(cos(radians($lat))
                    * cos(radians(addresses.lat))
                    * cos(radians(addresses.lng)
                    - radians($lon))
                    + sin(radians($lat))
                    * sin(radians(addresses.lat))))";
    return $query
       ->select("*")
       ->selectRaw("{$calculationsForDistance} AS distance")
       ->whereRaw("{$calculationsForDistance} < ?", $radius)->get();
}


