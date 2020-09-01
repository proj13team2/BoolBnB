<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;


class MessageController extends Controller
{
    public function index(Apartment $apartment)
    {
        $user = Auth::id();
        $user_messages = DB::table('messages')->join('apartments','messages.apartment_id', '=', 'apartments.id')->where('apartments.user_id', '=', $user)->get();
        // $user_messages = $apartment->messages->where('apartments.user_id', '=', $user)->get();
        $data = [
            'user_messages' => $user_messages,
            'apartment' => $apartment
        ];
        return view('user.apartments.messages', $data);
    }
}
