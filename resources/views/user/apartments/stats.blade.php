@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 container-chart">
            <h1>Visualizzazione totale</h1>
            <canvas id="chartViews">


            </canvas>

            <h1>{{$apartment->title}}</h1>
            @foreach ($visualizations as $visualization)
            <p>{{$visualization->id}}</p>
            @endforeach
        </div>
        <div class="col-6 container-chart">
            <canvas id="chartMessages">


            </canvas>
        </div>
    </div>
</div>
@endsection
@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
<script src="{{ asset('js/app.js')}}"></script>
@endpush

