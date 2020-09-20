@extends('layouts.app')

@section('page_title')
<title>{{ config('pagetitle.main_title') }} - {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.stats') }} - {{ $apartment->title }}</title>
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-center flex-column justify-content-center text-center">
        <h1 id='titolo-apt-stats' class="green-text" data-apartment='{{$apartment->id}}'>{{$apartment->title}}</h1>
        <div class="col-12 text-center mt-4">
            <img src="{{ asset('storage/' . $apartment->src) }}" alt="{{$apartment->title}}" class="col-6 col-offset-6">
        </div>
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
    <div class="pt-3 text-center">
      <a class="btn btn-small btn-info "  href="{{ route('user.apartments.index') }}">  Back - Dashboard </a>
    </div>
</div>
@endsection
@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
<script src="{{ asset('js/chart.js')}}"></script>
@endpush
