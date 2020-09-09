@extends('layouts.app')

@section('content')
  <div class="TOP_MAIN">
      <div class="input_search float yellow">
            <input id='input' type="text">
            <button>Cerca</button>
        </div>
        <div class="FORM_SEARCH float yellow">
          <div class="form_fallovede disabled">
            <form class="" action="index.html" method="post">
              @csrf
              <div class="services">
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
<main>
    <div class="tomtom_results">

    </div>
      <div class="SPONSORIZED">
      </div>
    <div class='our_results'>

    </div>
    <script id="our_results" type="text/x-handlebars-template">
      <div class="apartment_result">
        <img src="storage/@{{src}}" width="200px" height="125px">
      <h4><a  href="@{{link}}"> @{{title}} </a></h4>
        <p> Address : @{{street}} @{{building_number}} @{{city}} @{{region}}  @{{zip_code}} </p>
    </script>
    <script id="SPONSORIZED" type="text/x-handlebars-template">
      <div class="apartment_sponsorized">
        <img src="storage/@{{src}}" width="200px" height="125px">
      <h4><a  href="@{{link}}"> @{{title}} </a></h4>
        <p> Address : @{{street}} @{{building_number}} @{{city}} @{{region}}  @{{zip_code}} </p>
    </script>
</main>
@endsection
@push('head')
  <script src="{{ asset('js/search.js')}}"></script>
@endpush
