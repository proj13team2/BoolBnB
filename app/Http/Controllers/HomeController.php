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

        return view('home',compact('services' , 'apartments'));
    }

}
