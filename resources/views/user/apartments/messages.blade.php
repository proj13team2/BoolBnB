@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach ($user_messages as $user_message)
              <div class="message">
                <h4> Messaggio da: {{$user_message->email}}</h4>
                <h5>Appartamento: <a href="{{route('user.apartments.show', ['apartment' => $user_message->apartment_id])}}"> {{ $user_message->title}}</a></h5>
                <p> {{  $user_message->content}}</p>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('head')
  <script src="{{ asset('js/app.js')}}"></script>
@endpush
