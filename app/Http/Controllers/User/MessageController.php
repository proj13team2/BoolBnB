<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $user_messages = DB::table('messages')->join('apartments','messages.apartment_id', '=', 'apartments.id')->where('apartments.user_id', '=', $user)->get();
        return view('user.apartments.messages', compact('user_messages'));
    }
}
