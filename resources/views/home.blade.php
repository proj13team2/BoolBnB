@extends('layouts.app')

@section('content')

<input id='input' type="text">
<button>Cerca</button>
<main>
    <div class="tomtom_results">

    </div>
    <div class='our_results'>

    </div>
    <script id="our_results" type="text/x-handlebars-template">
      <div class="apartment_result">
        <img src="storage/@{{src}}" width="200px" height="125px">
      <h4><a  href="@{{link}}"> @{{title}} </a></h4>
        <p> Address : @{{street}} @{{building_number}} @{{city}} @{{region}}  @{{zip_code}} </p>
    </script>
</main>
@endsection
@push('head')
  <script src="{{ asset('js/search.js')}}"></script>
@endpush
