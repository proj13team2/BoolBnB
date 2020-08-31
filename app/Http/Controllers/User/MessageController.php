<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        SELECT *
        FROM messages
        JOIN apartments
        ON messages.apartment_id = apartments.id
        WHERE apartments.user_id = 8
        $messages = Message::all();
        return view('user.messages.index', compact('messages'));
    }
}
