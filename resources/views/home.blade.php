@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }}</title>
@endsection

@section('homepage_header_unique')
  <div class="TOP_MAIN" id="search_input">
      <div class="input_search  pt-5 d-flex justify-content-center align-items-center">
            <input  id='input' autocomplete="off" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  type="text">
            <button id="button_search"><i class="fas fa-search"></i> Cerca </button>
            <div class="tomtom_results gray dropdown-menu"  aria-labelledby="input">

            </div>
        </div>
  </div>
  <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
 
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
@endsection

@section('carousel')
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner">

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div>
@endsection

@section('content')
  <div class="d-flex justify-content-center align-items-center">
    <span class="separator"></span>
  </div>
  <div class="carousel_container">
    @yield('carousel')
  </div>
<div class="container">
    <p class="brown" id="ricerca_user"></p>
  <div id="results" class="filter_container">
    <div class="FORM_SEARCH  MistyRose" id="filter">
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
  </div>
  <div  class="searchedinputresult">
    <div class="SPONSORIZED d-flex flex-column justify-content-center align-items-center disabled">
    </div>
   <div class='our_results'>
   </div>
  </div>
</div>
<script id="our_results" type="text/x-handlebars-template">
<div class="card flex-row align-items-center apartment_result p-5">
   <div class="card-body ">
       <h4 class="card-title"><a  href="@{{link}}"> @{{title}} </a></h4>
       <p class="card-text"> Address : @{{street}} @{{building_number}} </p>
       <p class="card-text">  @{{city}}</p>
       <a href="@{{link}}" class="btn btn-primary">Go Visit</a>
  </div>
  <div class="card-img">
    <img class="" src="storage/@{{src}}">
  </div>
</div>
</script>
<script id="SPONSORIZED" type="text/x-handlebars-template">
  <div class="card flex-row align-items-center p-5 apartment_result-sponsored yellow">
     <div class="card-body">
         <h4 class="card-title"><a  href="@{{link}}"> @{{title}} </a></h4>
         <p class="card-text"> Address : @{{street}} @{{building_number}}</p>
         <p class="card-text"> @{{city}}</p>
         <a href="@{{link}}" class="btn btn-primary">Go Visit</a>
    </div>
    <div class="card-img">
      <img class="" src="storage/@{{src}}">
    </div>
  </div>
</script>
<script id="carousel-data-slide" type="text/x-handlebars-template">
          <div class="carousel-item ">
            <img id="carousel_img" class="img-fluid bd-placeholder-img" width="100%" height="100%" src="storage/@{{src}}" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img>
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>@{{title}}</h1>
                <p>@{{street}} @{{building_number}} @{{city}}</p>
                <p><a class="btn btn-lg btn-primary" href="@{{link}}" role="button">Go visit!</a></p>
              </div>
            </div>
          </div>
</script>
@endsection
@push('head')
  <script src="{{ asset('js/search.js')}}"></script>
@endpush
