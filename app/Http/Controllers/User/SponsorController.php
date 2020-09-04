<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;

class SponsorController extends Controller
{
    public function show(Apartment $apartment){
        $sponsors = Sponsor::all();
        return view('user.apartments.sponsorization', compact('apartment','sponsors'));
    }
}
