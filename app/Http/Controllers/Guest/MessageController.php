<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    public function store(Request $request, Apartment $apartment) {
        $request->validate([
            'email' => 'required|email',
            'content'=>'required',
        ]);
        $message = $request->all();  
        $new_message = new Message();
        $new_message['apartment_id'] = $apartment;
        $new_message->fill($message);
        $new_message->save();

        return redirect()->route('guest.apartment.show', ['slug' => $apartment->slug]);
    }
}
