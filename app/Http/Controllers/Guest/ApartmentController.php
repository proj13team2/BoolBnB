<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Visualization;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ApartmentController extends Controller
{
    public function show($slug) {
        $apartments = Apartment::where('slug', $slug)->get();
        $apartment = $apartments[0];
        $ip = \Request::getClientIp();
        $date = Carbon::now();
        if((Auth::id() !== $apartment->user_id) || !Auth::check()) {
            Visualization::create([ //aggiungo un record alla tabella visits
                'apartment_id' => $apartment->id,
                'visual_ip' => $ip
            ]);
        }
        return view('guest.apartment.show', compact('apartment'));
    }


}
