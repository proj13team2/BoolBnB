<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use Carbon\Carbon;

class SearchController extends Controller
{

    public function index (Request $request) {


        $data = $request->all();
        $lat = $data['lat'];
        $lng = $data['lng'];
        $apartments = scopeIsWithinMaxDistance(DB::table('addresses')->join('apartments','addresses.apartment_id', '=', 'apartments.id'),$lat , $lng, $radius = 20);
    //    return view ('home', compact('apartments'))->render() ;
        return response()->json([
            'success' => true,
            'count' => $apartments->count(),
            'results' => $apartments ]);
    }

      public function stamp (Request $request) {

        $mutable = Carbon::now();
        $apartments = DB::table('apartments')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id' )->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('end_date' , '>' , $mutable)->get();

        return response()->json([
            'success' => true,
            'count' => $apartments->count(),
            'results' => $apartments ]);
    }
}

function scopeIsWithinMaxDistance($query, $lat, $lon, $radius = 20) {

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
