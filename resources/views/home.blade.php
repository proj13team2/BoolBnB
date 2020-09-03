@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div> --}}

<input id='input' type="text">
<button>Cerca</button>
<main>
    <div class="tomtom_results">

    </div>
    <div class='our_results'></div>
    <script id="our_results" type="text/x-handlebars-template">
      <div class="apartment_result">
        <img src="storage/@{{img}}" width="200px" height="125px">
        <h4> <a href="{{route("guest.apartment.show", ["slug"=>$apartment->slug])}}"> @{{title}} </a></h4>
        <p> Address : @{{street}} @{{building_number}} @{{city}} @{{region}}  @{{zip_code}} </p>
        <!-- <p> City : @{{city}} </p>
        <p> Building number : @{{building_number}} </p>
        <p> Zip code : @{{zip_code}} </p>
        <p> Region : @{{region}} </p> -->
      </div>
    </script>
</main>
@endsection
