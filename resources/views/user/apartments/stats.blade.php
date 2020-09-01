@extends('layouts.app')
@section('content')
<h1>{{$apartment->title}}</h1>
    @foreach ($visualizations as $visualization)
        {{-- <p>{{$visualization->id}}</p> --}}
    @endforeach
@endsection