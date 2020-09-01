@extends('layouts.app')
@section('content')
    @foreach ($visualizations as $visualization)
        <p>{{$visualization->id}}</p>
    @endforeach
@endsection