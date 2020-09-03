<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function show(Apartment $apartment) {
        return view('guest.apartment.show', compact('apartment'));
    }
}
