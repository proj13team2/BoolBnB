<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;

class ApartmentController extends Controller
{
    public function show($slug) {
        $apartments = Apartment::where('slug', $slug)->get();
        $apartment = $apartments[0];
        return view('guest.apartment.show', compact('apartment'));
    }

   
}
