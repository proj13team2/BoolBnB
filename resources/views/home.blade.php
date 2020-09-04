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
      @if ($apartments)
      @foreach($apartments as $apartment)
      <div class="apartment_result">
        <img src="storage/{{$apartment->src}}" width="200px" height="125px">
        <h4><a  href="{{ route('guest.apartment.show', ['slug' => $apartment->slug ])}}"
          > {{$apartment->title}} </a></h4>
        <p> Address : {{$apartment->address->street}} {{$apartment->address->building_number}} {{$apartment->address->city}} {{$apartment->address->region}}  {{$apartment->address->zip_code}} </p>
      @endforeach
      @endif
      
    </script>
    
</main>
@endsection
