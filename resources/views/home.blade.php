@extends('layouts.app')

{{-- TITLE --}}
@section('page_title')
  <title>{{ config('pagetitle.main_title') }}</title>
@endsection
{{-- TITLE --}}


{{-- HOMEPAGEHEADER --}}
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
  <h1 class="display-4 green-text">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
</div>
@endsection
{{-- HOMEPAGEHEADER --}}

{{-- CAROUSEL --}}
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
{{-- CAROUSEL --}}

{{-- PRIMA SEZIONE --}}
@section('section-first')
    <section class="section-first-container row">
      <div class="section-first-l  col-lg-6 col-md-6  col-sm-12 ">
        <div class="section-first-l-img"></div>
      </div>
      <div class="section-first-d text-center col-lg-6  col-md-6 col-sm-12">
        <div class="descript">
          <h4 class="descript-title green-text pl-3 pt-5">Find your style!</h4>
          <p class="descript-text  pt-5">Assisti a performance live interattive e partecipa a conversazioni con persone di Broadway e non solo. Tutto senza uscire di casa.</p>
        </div>
      </div>
    </section>
@endsection
{{-- PRIMA SEZIONE --}}

{{-- FOOTER --}}
@section('footer')
  	<section id="footer">
  		<div class="container">
  			<div class="row text-center text-xs-center text-sm-center text-md-center">
  				<div class="col-xs-12 col-sm-4 col-md-4">
  					<h5>Quick links</h5>
  					<ul class="list-unstyled quick-links">
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Home</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>About</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>FAQ</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Get Started</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Videos</a></li>
  					</ul>
  				</div>
  				<div class="col-xs-12 col-sm-4 col-md-4">
  					<h5>Quick links</h5>
  					<ul class="list-unstyled quick-links">
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Home</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>About</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>FAQ</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Get Started</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Videos</a></li>
  					</ul>
  				</div>
  				<div class="col-xs-12 col-sm-4 col-md-4">
  					<h5>Quick links</h5>
  					<ul class="list-unstyled quick-links">
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Home</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>About</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>FAQ</a></li>
  						<li><a href=""><i class="fa fa-angle-double-right"></i>Get Started</a></li>
  						<li><a href="" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
  					</ul>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
  					<ul class="list-unstyled list-inline social text-center">
  						<li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
  						<li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
  						<li class="list-inline-item"><a href=""><i class="fa fa-instagram"></i></a></li>
  						<li class="list-inline-item"><a href=""><i class="fa fa-google-plus"></i></a></li>
  						<li class="list-inline-item"><a href="" target="_blank"><i class="fa fa-envelope"></i></a></li>
  					</ul>
  				</div>
  				<hr>
  			</div>
  			<div class="row">
  				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
  					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
  					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
  				</div>
  				<hr>
  			</div>
  		</div>
  	</section>
@endsection
{{-- FOOTER --}}

{{-- SECTION-SECOND WHAT WE DO --}}
@section('section-second')
  <section id="what-we-do">
  <div class="container">
    <h2 class="section-title mb-2 h1">What we do</h2>
    <p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
    <div class="row mt-5">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-1">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-2">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-3">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-4">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-5">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-block block-6">
            <h3 class="card-title">Special title</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
{{-- SECTION-SECOND WHAT WE DO --}}

{{-- SECTION-THIRD-TESMIMONIALS--}}
@section('section-third')
  <section class="section-ptb bg-white bg-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <div class="heading mb-80">
            <h2 class="green-text">Testimonials</h2>
            <p class="mb-20">Looked up one of the more obscure Latin words, consectetur, from <br class="d-none d-md-block"> a Lorem Ipsum passage, and going</p>
            <hr class=" green-border line bw-2 mx-auto line-sm mb-5">
            <hr class=" green-border line bw-2 mx-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="client-testimonial position-relative">
            <div class="client-nav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#client1" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/1.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client2" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/2.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client3" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/3.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client4" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/4.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client5" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/5.png" alt="Client Image">
                  </a>
                </li>
              </ul>
            </div>
            <div class="row pt-3 text-center">
              <div class="col-10 col-md-8 col-lg-6 mx-auto">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="client1">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/1.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-10 green-text">Evelyn Riley</h4>
                        <h6 class="green-text-light">Hade Of Idea</h6>
                        <p>Richard McClintock, a Latin professor at Hampden <br class="d-none d-lg-block">College in Virginia, looked up one of the more obscure Latin words</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Client End -->
                  <div class="tab-pane fade" id="client2">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/2.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-10 green-text">Ethan Green</h4>
                        <h6 class="green-text-light">Photograper</h6>
                        <p>Many desktop publishing packages and web page editors <br class="d-none d-lg-block"> now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Client End -->
                  <div class="tab-pane fade" id="client3">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/3.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-10 green-text">Marie Soto</h4>
                        <h6 class="green-text-light">Designer</h6>
                        <p>Virginia, looked up one of the more obscure Latin <br class="d-none d-lg-block"> words, consectetur, from a Lorem Ipsum passage, and going through the cites of looked</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Client End -->
                  <div class="tab-pane fade" id="client4">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/4.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-10 green-text">Willie Munoz</h4>
                        <h6 class="green-text-light">Content Writer</h6>
                        <p>Words which don't look even slightly believable. <br class="d-none d-lg-block">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Client End -->
                  <div class="tab-pane fade" id="client5">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/5.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-10 green-text">Susan Gardner</h4>
                        <h6 class="green-text-light">Manager</h6>
                        <p>The point of using Lorem Ipsum is that it has a more <br class="d-none d-lg-block"> normal distribution of letters, as opposed to using 'Content here, content here point of using</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Client End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
{{-- SECTION-THIRD-TESMIMONIALS--}}

{{-- CONTENT --}}
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
      <div class="form_fallovede container disabled">
        <form class="o row" action="index.html" method="post">
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
    <div  class="searchedinputresult container">
      <div class="SPONSORIZED row pt-5 disabled"></div>
      <div class='our_results row'></div>
    </div>
  </div>
  @yield('section-first')
  @yield('section-second')
  @yield('section-third')
</div>
</div>
<footer>
   @yield('footer')
</footer>
{{-- CONTENT --}}

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
          <div class="apartment-content"'>
            <h3 class="title" '><a href="@{{link}}">@{{title}}</a></h3>
              <div class="price">
                  @{{price}} $
              </div>
              <ul class="rating">
                @{{{rating}}}
              </ul>
              @{{{sponsored}}}
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
