@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.messages') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
          @foreach ($user_messages as $user_message)
      <div class="col-sm-6 col-md-12">
            <div class="alert alert-success">
                <h4 class="glyphicon glyphicon-ok"> Messaggio da: {{$user_message->email}}</h4>
                <hr class="message-inner-separator">
                <div class="row">
                  <div class="col-6">
                        <p> In data: {{ $user_message->created_at }}</p>
                        <h6> {{  $user_message->content}}</h6>
                  </div>
                  <div class="col-6 mess-right text-center">
                      <img  id="img-messages" src="{{ asset('storage/' . $user_message->src) }}" alt="">
                      <h6 class="p-2 mt-3">Appartamento: <a href="{{route('user.apartments.show', ['apartment' => $user_message->apartment_id])}}"> {{ $user_message->title}}</a></h6>
                  </div>
                </div>
            </div>
      </div>

        @endforeach
@endsection

@push('head')
  <script src="{{ asset('js/app.js')}}"></script>
@endpush
