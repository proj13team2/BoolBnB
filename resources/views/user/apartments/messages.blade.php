@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <p></p>
            @foreach ($user_messages as $user_message)
            <p> Messaggio da {{$user_message->email}} per l'appartamento {{ $user_message->apartment_id }}</p>
            <p> {{  $user_message->content}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection

