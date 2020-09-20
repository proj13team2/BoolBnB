@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.dashboard') }}</title>
@endsection

@section('content')
    <div class="container no-margins">
        <div class="row">
            {{-- header --}}
              <h1 class="mt-3 mb-3  col-12 green-text">Lista Appartamenti</h1>
              <div class="col-12 text-right">
                  <a class=" btn btn-primary"  href="{{ route('user.apartments.create') }}">  New apartments  </a>
              </div>
            {{-- main --}}
              @forelse ($user_apartments as $user_apartment)
      <div class="col-12  index-admin-container mt-5">
            <div class="apt-index-title-each  row">
              <div class="title col-7">
                <h1 class="green-text"><a class="green-text"  href="{{ route('user.apartments.show', ['apartment' => $user_apartment->id]) }}">{{$user_apartment->title}}</a> / Id: {{$user_apartment->id}}</h1>
                <p class="text-muted">{{ $user_apartment->address->street}} {{$user_apartment->address->building_number}}, {{$user_apartment->address->city}}</p>
              </div>
                <div class="apt-services  services-container row align-items-center justify-content-around services-height col-3">
                        @forelse ($user_apartment->services as $service)
                          <div class="p-3 text-center white-text">
                            <i class="fas fa-{{ $service->description }} font-size-i"></i>
                          </div>
                        @empty
                          <div class="p-3 text-center white-text">
                            <i  id="no-services"class="fas fa-cogs  font-size-i"></i>
                            <span class="pl-2 align-top">No services</span>
                          </div>
                        @endforelse
                </div>
                <div class=" col-2 align-center text-right">
                  <form class="d-inline" action="{{ route('user.apartments.disable', ['apartment' => $user_apartment->id]) }}" method="post">
                      @csrf
                      @method('PUT')
                      @if ($user_apartment->is_active == 0)
                            <input type="submit" class="btn btn-small white-text gray-background" value="Attiva">
                      @else
                          <input type="submit" class="btn btn-small white-text gray-background" value="Disattiva">
                      @endif
                  </form>
                      <a id="delete" href="{{ route('user.apartments.delete', ['apartment' => $user_apartment->id]) }}" class="inline red-background button btn delete-confirm"><i  class="p-1 fas fa-times  white-text "></i></a>
                </div>
            </div>
            <div class="row  index-container  "     @if ($user_apartment->is_active == 0)  class='apartment-disabled'@endif>
              <div class="col-5">
                @if($user_apartment->src)
                    <img src="{{ asset('storage/' . $user_apartment->src) }}" alt="">
                @endif
              </div>
              <div class="col-2 pt-5 text-center">
                  <p class="white-text aligne-center" id="price-tag">{{ $user_apartment->price }} <i class="fas fa-euro-sign white-text"></i></p>
                  @forelse ($user_apartment->sponsors as $sponsor)
                  @if($sponsor->pivot->end_date > ($mutable ?? ''))
                      <img id="sponsored" class="mt-3"src="https://i.ibb.co/wBrstP0/pngkey-com-false-stamp-png-1383873.png" height="40px" width="100px"alt="Money">
                  @endif
                  @empty
                  @endforelse
              </div>
                <div class="col-5 ">
                  <div class="material-button-anim">
                    <ul class="list-inline" id="options">
                      <li class="option">
                        <button class="material-button option1" type="button">
                          <a class="fa fa-pencil-alt white-text no-hoover i-drop-selectall" href="{{ route('user.apartments.edit', ['apartment' => $user_apartment->id]) }}" aria-hidden="true"> <span id="info-popup" class="disabled">Edit</span></a>
                        </button>
                      </li>
                      <li class="option">
                        <button class="material-button option2" type="button">
                          <a class="fa fa-chart-bar white-text no-hoover i-drop-selectall" href="{{ route('user.apartments.stats', ['apartment' => $user_apartment->id]) }}" aria-hidden="true"> <span id="info-popup" class="disabled">Stats</span></a>
                        </button>
                      </li>
                      <li class="option">
                        <button class="material-button option3 " type="button">
                          <a class="fas fa-eye white-text no-hoover i-drop-selectall"  href="{{ route('user.apartments.show', ['apartment' => $user_apartment->id]) }}">  <span id="info-popup" class="disabled">Show</span></a>
                        </button>
                      </li>
                    </ul>
                    <button class="material-button material-button-toggle" type="button">
                      <span class="fa fa-plus" aria-hidden="true"></span>
                    </button>
                  </div>
                </div>
            </div>
            </div>
              @empty
                <div class="col-12">
                  <h1 class="green-text text-center">Non è presente alcun appartamento</h1>
                </div>
              @endforelse
        </div>
    </div>
@endsection

@push('head')
  <script src="{{ asset('js/delete.js')}}"></script>
@endpush
