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

    public function store(Request $request) {
        // $request->validate([
        //     'email' => 'required|email',
        //     'content'=>'required',
        // ]);
        // $message = $request->all();  
        // $new_message = new Message();
        // $new_message['apartment_id'] = $new_message->apartment->id;
        // $new_message->fill($message);
        // $new_message->save();

        // return redirect()->route('guest.apartment.show', ['slug' => $new_message->apartment->slug]);
    }
}
