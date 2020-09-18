<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use App\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $apartments = DB::table('apartments')->join('apartment_service','apartment_service.apartment_id' , '=', 'apartments.id' )->join('services' , 'services.id' , '=' , 'apartment_service.service_id')->get();
        $services = Service::all();
        $apartments = Apartment::all();

        //creo un array da riempire con la sponsorizzazione attuale dell'appartamento (se esiste)
    //   $array_sponsorizzati_attuali = [];
    //   foreach ($apartment->sponsors as $sponsor) {
    //       if($sponsor->pivot->end_date > Carbon::now()) {
    //           array_push($array_sponsorizzati_attuali, $sponsor);
    //       }
    //   }

        return view('home',compact('services' , 'apartments'));
    }

}
