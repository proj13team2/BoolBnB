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

    // ------------- INDEX : stampa appartamenti non filtrati ------------- //

    public function index (Request $request) {


        $data = $request->all();

        $lat = $data['lat'];
        $lng = $data['lng'];

        //array per gli appartamenti attualmente sponsorizzati
        $active_sponsors = [];

        $apartment_sponsors = Apartment::join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '>', Carbon::now())->get();

        foreach ($apartment_sponsors as $apartment_sponsor) {
            array_push($active_sponsors, $apartment_sponsor);
        }

        //query per ottenere gli appartamenti che non sono mai stati sponsorizzati
        $never_sponsorized_apts = Apartment::whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id');

        //query per ottenere gli appartmenti con sponsorizzazioni scadute
        $expired_sponsorizations = Apartment::join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now());

        //query filtrate in base al raggio (20km per la ricerca base)
        $never_sponsorized_apts_near = scopeIsWithinMaxDistance($never_sponsorized_apts,$lat , $lng, 20);
        $expired_sponsorizations_near = scopeIsWithinMaxDistance($expired_sponsorizations,$lat , $lng, 20);

        //inseriamo gli appartamenti sponsorizzati indipendentemente dalla distanza
        $mutable = Carbon::now();
        $sponsorized_apartments = DB::table('apartments')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id' )->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('end_date' , '>' , $mutable)->limit(6)->get();
        
        $dati = [
            'no_sponsored' => results_maker($active_sponsors,$expired_sponsorizations_near,$never_sponsorized_apts_near),
            'sponsored' => $sponsorized_apartments
        ];

        return response()->json([
            'success' => true,
            'results' => $dati ]);
    }


    // ------------- STAMP : stampa appartamenti sponsorizzati ------------- //

      public function stamp (Request $request) {

        $mutable = Carbon::now();
        $apartments = DB::table('apartments')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id' )->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('end_date' , '>' , $mutable)->limit(6)->get();

        return response()->json([
            'success' => true,
            'count' => $apartments->count(),
            'results' => $apartments ]);
    }


    // ------------- FILTERED : stampa appartamenti filtrati ------------- //


    public function filtered (Request $request){
        $data = $request->all();
        $number_of_beds = $data['number_of_beds'];
        $number_of_rooms = $data['number_of_rooms'];
        $radius = $data['radius'];
        $lat = $data['lat'];
        $lng = $data['lng'];

        
        //array per gli appartamenti attualmente sponsorizzati
        $active_sponsors = [];

        $apartment_sponsors = Apartment::join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '>', Carbon::now())->get();

        foreach ($apartment_sponsors as $apartment_sponsor) {
            array_push($active_sponsors, $apartment_sponsor);
        }



        //condizioni per verificare i filtri scelti dall'utente (esclusi i servizi)

        if ($number_of_rooms == '' && $number_of_beds == '') {

            //query per ottenere gli appartamenti che non sono mai stati sponsorizzati
            $never_sponsorized_apts = Apartment::with('services')->whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id');
            //query per ottenere gli appartmenti con sponsorizzazioni scadute
            $expired_sponsorizations = Apartment::with('services')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now());

        } elseif ($number_of_rooms == '' && $number_of_beds != '') {

            $never_sponsorized_apts = Apartment::with('services')->whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_beds', '>=', $number_of_beds);
            $expired_sponsorizations = Apartment::with('services')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now())->where('apartments.number_of_beds', '>=', $number_of_beds);

        } elseif ($number_of_rooms != '' && $number_of_beds == '') {

            $never_sponsorized_apts = Apartment::with('services')->whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_rooms', '>=', $number_of_rooms);
            $expired_sponsorizations = Apartment::with('services')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now())->where('apartments.number_of_rooms', '>=', $number_of_rooms);

        } else {

            $never_sponsorized_apts = Apartment::with('services')->whereDoesntHave('sponsors')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('apartments.number_of_beds', '>=', $number_of_beds)->where('apartments.number_of_rooms', '>=', $number_of_rooms);
            $expired_sponsorizations = Apartment::with('services')->join('addresses','addresses.apartment_id', '=', 'apartments.id')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id')->where('end_date', '<=', Carbon::now())->where('apartments.number_of_beds', '>=', $number_of_beds)->where('apartments.number_of_rooms', '>=', $number_of_rooms);
        }

        //query filtrate in base al raggio (variabile tra 1km e 100km)
        $never_sponsorized_apts_near = scopeIsWithinMaxDistance($never_sponsorized_apts,$lat , $lng, $radius);
        $expired_sponsorizations_near = scopeIsWithinMaxDistance($expired_sponsorizations,$lat , $lng, $radius);

        $mutable = Carbon::now();
        $sponsorized_apartments = DB::table('apartments')->join('apartment_sponsor','apartment_sponsor.apartment_id' , '=', 'apartments.id' )->join('addresses','addresses.apartment_id', '=', 'apartments.id')->where('end_date' , '>' , $mutable)->limit(6)->get();

        $dati = [
            'no_sponsored' => results_maker($active_sponsors,$expired_sponsorizations_near,$never_sponsorized_apts_near),
            'sponsored' => $sponsorized_apartments
        ];
        

        return response()->json([
            'success' => true,
            'results' => $dati]);
        
    }
}

//funzione per trovare gli appartamenti con distanza inferiore al raggio scelto
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


function results_maker($active_sponsors,$expired_sponsorizations_near,$never_sponsorized_apts_near) {
        $array_sponsorized_apts = [];
        $array_old_apts = [];
        $array_results = [];

        //popolo l'array con gli appartamenti attualmente sponsorizzati
        foreach ($active_sponsors as $active_sponsor) {
            array_push($array_sponsorized_apts, $active_sponsor->apartment_id);
        }

        //popolo l'array dei risultati solo se gli appartamenti con sponsorizzazioni scadute non solo attualmente sponsorizzati
        foreach ($expired_sponsorizations_near as $expired_sponsorization_near){
            if (!in_array($expired_sponsorization_near->apartment_id, $array_sponsorized_apts)) {
                if (!in_array($expired_sponsorization_near->apartment_id, $array_old_apts)) {
                    array_push($array_old_apts, $expired_sponsorization_near->apartment_id);
                    array_push($array_results, $expired_sponsorization_near);
                }
            }
        }

        //inserisco nell'array dei risultati gli appartamenti mai sponsorizzati
        foreach ($never_sponsorized_apts_near as $never_sponsorized_apt_near) {
            array_push($array_results, $never_sponsorized_apt_near);
        }

        return $array_results;
}