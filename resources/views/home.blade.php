@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }}</title>
@endsection

@section('homepage_header_unique')
  <div class="TOP_MAIN" id="search_input">
      <div class="input_search  pt-5 d-flex justify-content-center align-items-center">
            <input  id='input' autocomplete="off" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  type="text">
            <button id="button_search"><i class="fas fa-search"></i> Cerca </button>
            <div class="tomtom_results dropdown-menu"  aria-labelledby="input">

            </div>
        </div>
  </div>
  <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
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

@section('section-first')
    <div class="section-first-container d-flex flex-wrap">
      <div class="section-first-l  col-lg-6 col-md-6  col-sm-12 ">
        <div class="section-first-l-img"></div>
      </div>
      <div class="section-first-d text-center col-lg-6  col-md-6 col-sm-12">
        <div class="descript">
          <h4 class="descript-title pl-3 pt-5">Find your style!</h4>
          <p class="descript-text  pt-5">Assisti a performance live interattive e partecipa a conversazioni con persone di Broadway e non solo. Tutto senza uscire di casa.</p>
        </div>
      </div>
    </div>
@endsection

@section('content')
<div class="container">
<div class="row">
  <div class="carousel_container col-12">
    @yield('carousel')
  </div>
  <div class="pop-up-results col-12 mt-5">
  <div class="results-for-p text-center">
      <h3 class="" id="ricerca_user"></h3>
  </div>
  <div id="results" class="filter_container ">
    <div class="FORM_SEARCH" id="filter">
      <div class="form_fallovede  disabled">
        <form class="row" action="index.html" method="post">
          @csrf
          <div class="services card col-4">
            <article class="card-group-item">
              <div class="card-header">
                <h6 class="title">Services </h6>
              </div>
              <div class="card-body">
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
            </article> <!-- card-group-item.// -->
          </div>
          <div class="number_of  card  col-4">
            <div class="card-group-item">
              <div class="card-header">
                <h6 class="title">Filter for number of </h6>
              </div>
              <div class="card-body">
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
          </div>
          </div>
          <div class="slider  card  col-4">
            <article class="card-group-item">
              <div class="card-header">
                <h6 class="title">Distance </h6>
              </div>
              <div class="card-body">
            <label for="km_slider">Km (between 0 and 100):</label>
            <input type="range" min="1" max="100" id="km_slider" name="km_slider" value="100">
            <p>value: <span id="slider_range"></span></p>
            </article> <!-- card-group-item.// -->
            </div>
          </div>
        </form>
        <div class="mt-3 text-center">
          <button class="disabled"type="button" id='go' name="button">Go</button>
        </div>
      </div>
   </div>
  </div>
    <div  class="searchedinputresult">
      <div class="SPONSORIZED row pt-5 disabled"></div>
      <div class='our_results row'></div>
    </div>
  </div>
  @yield('section-first')
</div>
</div>
<script id="our_results" type="text/x-handlebars-template">
  <div class="apartment-grid col-4">
          <div class="apartment-image">
              <a href="@{{link}}">
                  <img width="300px" class="pic-1" src="storage/@{{src}}">
                  <img width="300px" class="pic-2" src="storage/@{{src}}">
              </a>
              <ul class="social">
                  <li><a href="@{{link}}"><i class="fa fa-shopping-bag"></i></a></li>
                  <li><a href="@{{link}}"><i class="fas fa-location-arrow"></i></a></li>
              </ul>
          </div>
          <div class="apartment-content">
              <h3 class="title"><a href="@{{link}}">@{{title}}</a></h3>
              <div class="price">
                  @{{price}} $
              </div>
              <ul class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
              </ul>
          </div>
      </div>
</script>
<script id="SPONSORIZED" type="text/x-handlebars-template">
  <div class="apartment-grid col-4">
          <div class="apartment-image">
              <a href="@{{link}}">
                  <img width="300px" class="pic-1" src="storage/@{{src}}">
                  <img width="300px" class="pic-2" src="storage/@{{src}}">
              </a>
              <ul class="social">
                  <li><a href="@{{link}}"><i class="fa fa-shopping-bag"></i></a></li>
                  <li><a href="@{{link}}"><i class="fas fa-location-arrow"></i></a></li>
              </ul>
               <span class="apartment-new-label">Sponsored</span>
          </div>
          <div class="apartment-content">
              <h3 class="title"><a href="@{{link}}">@{{title}}</a></h3>
              <div class="price">
                  @{{price}} $
              </div>
              <ul class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
              </ul>
          </div>
      </div>
</script>
<script id="carousel-data-slide" type="text/x-handlebars-template">
          <div class="carousel-item">
            <img id="carousel_img" class="img-fluid bd-placeholder-img" width="100%" height="100%" src="storage/@{{src}}" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
              <div class="carousel-caption text-left">
                <h1>@{{title}}</h1>
                <p>@{{street}} @{{building_number}} @{{city}}</p>
                <p><a class="btn btn-lg btn-primary" href="@{{link}}" role="button">Go visit!</a></p>
              </div>
          </div>
</script>
@endsection
@push('head')
  <script src="{{ asset('js/search.js')}}"></script>
@endpush
