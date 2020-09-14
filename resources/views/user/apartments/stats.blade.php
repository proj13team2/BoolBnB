@extends('layouts.app')
@section('content')
<div class="container">
    <h1 id='titolo-apt-stats' data-apartment='{{$apartment->id}}'>{{$apartment->title}}</h1>
    <div class="row"> 
        <div class="col-8 col-offset-2 container-chart">
            <h1>Visualizzazione totale</h1>
            <canvas id="chartViews"></canvas>
            <h2 id='total-visualizations'>Totale visualizzazioni: <span></span> </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-8 col-offset-2 container-chart">
            <h1>Visualizzazione totale</h1>
            <canvas id="chartMessages"></canvas>
            <h2 id='total-messages'>Totale messaggi: <span></span> </h2>
        </div>
    </div>
</div>
@endsection
@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
<script src="{{ asset('js/chart.js')}}"></script>
@endpush

