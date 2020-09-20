@extends('layouts.app')

@section('page_title')
<title>{{ config('pagetitle.main_title') }} - {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.stats') }} - {{ $apartment->title }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <img src="{{ asset('storage/' . $apartment->src) }}" alt="{{$apartment->title}}" class="col-offset-2 col-4">
        <h1 id='titolo-apt-stats' data-apartment='{{$apartment->id}}'>{{$apartment->title}}</h1>
    </div>
    <div class="row">
        <div class="offset-2 col-8 container-chart p-5 ">
            <h3 class="p-2 text-center">Visualizzazioni</h3>
            <canvas id="chartViews"></canvas>
            <h5 id='total-visualizations' class="pb-5 text-center">Totale visualizzazioni: <span></span> </h5>
        </div>
    </div>
    <div class="row">
        <div class="offset-2 col-8  container-chart p-5">
            <h3 class="p-2 text-center">Messaggi ricevuti</h3>
            <canvas id="chartMessages"></canvas>
            <h5 id='total-messages' class="text-center" >Totale messaggi: <span></span> </h5>
        </div>
    </div>
</div>
@endsection
@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
<script src="{{ asset('js/chart.js')}}"></script>
@endpush