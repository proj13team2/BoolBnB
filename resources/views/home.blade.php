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
        <p> Street : @{{street}} </p>
        <span> City : @{{city}} </span></div>
      </div>
    </script>
</main>
@endsection
