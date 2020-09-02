<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;

class SearchController extends Controller
{
    
    public function index (Request $request) {


        $data = $request->all();
        $address = $data['address'];
        $lat = $data['lat'];
        $lng = $data['lng'];
       $apartments = scopeIsWithinMaxDistance(DB::table('apartments'),$lat , $lng, $radius = 20);
        return response()->json([
            'success' => true,
            'count' => $apartments->count(),
            'results' => $apartments ]);
    }

    // public function store(Request $request, Apartment $apartment) {
    //     $data = $request->all();
    //     $lat = $data['lat'];
    //     $lng = $data['lng'];
    //     $apartment->address->lat = $lat;
    //     $apartment->address->lng = $lng;
    // }
}

function scopeIsWithinMaxDistance($query, $lat, $lon, $radius = 20) {

    $calculationsForDistance = "(6371 * acos(cos(radians($lat)) 
                    * cos(radians(apartments.address_lat)) 
                    * cos(radians(apartments.address_lng) 
                    - radians($lon)) 
                    + sin(radians($lat)) 
                    * sin(radians(apartments.address_lat))))";
    return $query
       ->select("*")
       ->selectRaw("{$calculationsForDistance} AS distance")
       ->whereRaw("{$calculationsForDistance} < ?", $radius)->get();
}
