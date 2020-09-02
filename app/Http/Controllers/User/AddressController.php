<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
    // public function store(Request $request) {
    //     $request->validate([
    //         'street'=>'required|max:255',
    //         'building_number'=>'required',
    //         'city'=>'required|max:255',
    //         'zip_code'=>'required|numeric',
    //         'region'=>'required|max:255',
    //         'country'=>'required|max:255',
    //     ]);
    //     $dati = $request->all();
    //     $new_address =new Address();
    //     $new_address->fill($dati);
    //     $new_address->save();
    // } 
}
