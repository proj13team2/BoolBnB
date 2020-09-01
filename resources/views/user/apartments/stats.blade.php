@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{$apartment->title}}</h1>
            @foreach ($visualizations as $visualization)
                <p>{{$visualization->id}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection