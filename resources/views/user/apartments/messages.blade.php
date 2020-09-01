@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach ($user_messages as $user_message)
            <p> {{  $user_message->email}}</p>
            <p> {{  $user_message->content}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection

