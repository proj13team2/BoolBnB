@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }}</title>
@endsection

@section('homepage_header_unique')
  <div class="TOP_MAIN    d-flex justify-content-center align-items-center">
      <div class="input_search float">
            <input  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id='input' type="text">
            <button>Cerca</button>
            <div class="tomtom_results gray dropdown-menu"  aria-labelledby="input">

            </div>
        </div>
  </div>
  <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
@endsection

@section('content')
<div class="container">
  <p class="brown" id="ricerca_user"></p>
      <div class="SPONSORIZED d-flex justify-content-center align-items-center blue.">
      </div>
  <div class="searchedinputresult d-flex ">
    <div class="FORM_SEARCH  float yellow">
      <div class="form_fallovede disabled">
        <form class="" action="index.html" method="post">
          @csrf
          <div class="services  d-flex flex-column">
            @foreach ($services as $service)
                <div class="form-check form-check-inline ">
                    <label class="form-check-label">
                        <input class='services_input'
                        name="service_id[]" class="form-check-input" type="checkbox" value="{{ $service->type }}">
                        {{ $service->type }}
                    </label>
                </div>
            @endforeach
          </div>
          <div class="number_of">
            <label for="number_of_rooms">Select number of rooms:</label>
            <select class="" id="number_of_rooms" name="number_of_rooms">
              <option value="">...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <label for="number_of_beds">Select number of beds:</label>
            <select class="" id="number_of_beds" name="number_of_beds">
              <option value="">...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="slider">
            <label for="km_slider">Km (between 0 and 100):</label>
            <input type="range" min="1" max="100" id="km_slider" name="km_slider" value="100">
            <p>value: <span id="slider_range"></span></p>
          </div>
          <button type="button" id='go' name="button">Go</button>
        </form>
      </div>
   </div>
   <div class='our_results d-flex justify-content-center align-items-center flex-wrap gray'>
   </div>
  </div>
</div>
<script id="our_results" type="text/x-handlebars-template">
<div class="card apartment_result">
        <img class="card-img-top" src="storage/@{{src}}" width="200px" height="125px">
   <div class="card-body">
       <h4 class="card-title"><a  href="@{{link}}"> @{{title}} </a></h4>
       <p class="card-text"> Address : @{{street}} @{{building_number}} </p>
       <p class="card-text">  @{{city}}</p>
       <a href="@{{link}}" class="btn btn-primary">Go Visit</a>
  </div>
</div>
</script>
<script id="SPONSORIZED" type="text/x-handlebars-template">
  <div class="card apartment_result">
          <img class="card-img-top" src="storage/@{{src}}" width="200px" height="125px">
     <div class="card-body">
         <h4 class="card-title"><a  href="@{{link}}"> @{{title}} </a></h4>
         <p class="card-text"> Address : @{{street}} @{{building_number}}</p>
         <p class="card-text"> @{{city}}</p>
         <a href="@{{link}}" class="btn btn-primary">Go Visit</a>
    </div>
  </div>
</script>
@endsection
@push('head')
  <script src="{{ asset('js/search.js')}}"></script>
@endpush
