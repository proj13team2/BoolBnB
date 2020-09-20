@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ $apartment->title }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-12 appartamento pb-5" data-lat='{{$apartment->address->lat}}' data-lng='{{$apartment->address->lng}}' data-endaddress="{{$apartment->address->zip_code}}, {{$apartment->address->country}}">
                <div class="d-flex  justify-content-around align-items-center pb-3">
                  <i class="fas fa-bars green-text icons-h1"></i>
                    <h1 class="mt-3 mb-3 green-text green-text-bold">Dettagli Appartmento</h1>
                  <i class="fas fa-bars green-text icons-h1"></i>
                </div>
                <div class="row guest-apt mt-5 justify-content-around">
                  <div class="apt-img col-5">
                    @if($apartment->src)
                        <img id="img-apartment-show" src="{{ asset('storage/' . $apartment->src) }}" alt="apartment">
                        <p id="square_meters" class="white-text">
                            <strong>Square Meters: </strong>
                            <span>  {{ $apartment->square_meters }} </span>
                        </p>
                    @endif
                  </div>
                  <div class="apt-services col-5 services-container row align-items-center justify-content-around">
                          @forelse ($apartment->services as $service)
                            <div class="p-3 text-center green-text">
                              <i class="fas fa-{{ $service->description }}"></i>
                              <p>{{ $service->type }}</p>
                            </div>
                          @empty
                            <div class="p-3 text-center green-text">
                                <i  id="no-services"class="fas fa-cogs"></i>
                              <p class="green-text">No Services</p>
                            </div>
                          @endforelse
                     </div>
                  </div>
                </div>

                <section id="what-we-do">
                <div class="container">
                  <h2 class="section-title mb-2 h1" data-title='{{ $apartment->title }}'> {{ $apartment->title }}</h2>
                  <p class="text-center text-muted h5" data-address='{{ $apartment->address->street }} {{ $apartment->address->building_number }}, {{ $apartment->address->city }}'>
                    Address:  <span> {{ $apartment->address->street }} {{ $apartment->address->building_number }}, {{ $apartment->address->city }} </span>
                  </p>
                  <div class="row mt-5">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                      <div class="card">
                        <div class="card-block style-the-icon">
                          <div class="text-center pb-3">
                              <i class="fas fa-bed  green-text"></i>
                          </div>
                          <h3 class="card-title text-center">Number of Beds</h3>
                          <p class="card-text text-center number-of">" {{ $apartment->number_of_beds }} "</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                      <div class="card">
                        <div class="card-block style-the-icon">
                          <div class="text-center pb-3">
                              <i class="fas fa-house-user green-text"></i>
                          </div>
                          <h3 class="card-title text-center">Number of Rooms</h3>
                          <p class="card-text text-center number-of">"   {{ $apartment->number_of_rooms }} "</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                      <div class="card">
                        <div class="card-block style-the-icon">
                          <div class="text-center pb-3">
                              <i class="fas fa-sink green-text"></i>
                          </div>
                          <h3 class="card-title text-center">Number of Bathrooms</h3>
                          <p class="card-text text-center number-of">"     {{ $apartment->number_of_bathrooms }} "</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-block style-the-icon">
                          <div class="text-center pb-3">
                          <i class="fas fa-money-bill-wave green-text"></i>
                          </div>
                            <h2 class="card-title  text-center">Price</h2>
                          <p class="card-text text-center number-of green-text">   {{ $apartment->price }} <i class="fas green-text fa-euro-sign"></i> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 p-5 mb-3">
              <div class="green-background  text-white form-message-touser">
                <form action="{{route('guest.message', ['apartment' => $apartment->id])}}" method="post" name = "message">
                    @csrf
                    <h3>Contact the Seller:</h3>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email " value="{{ $user->email ?? old('email') }}">
                    </div>
                    <div class="form-group ">
                        <label for="content">Message</label>
                        <textarea type="text" name="content" class="form-control" id="content" placeholder="content..." value='{{ old('content') }}'></textarea>
                    </div>
                    <button class="btn p-2 white-background green-text"type='submit'>Invia Messaggio</button>
                </form>
              </div>
            </div>
            <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 p-3 mb-3">
                <div id="map" style="width: 480px; height: 480px;"></div>
            </div>
        </div>
    </div>

@endsection
@push('head')
    <script src="{{ asset('js/map.js')}}"></script>
    <script src="{{ asset('js/validation.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
@endpush
