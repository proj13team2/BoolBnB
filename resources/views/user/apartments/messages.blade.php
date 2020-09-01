@extends('layouts.app')

@section('content')

    @foreach ($user_messages as $user_message)
        <p> {{  $user_message->email}}</p>
        <p> {{  $user_message->content}}</p>
    @endforeach

@endsection

