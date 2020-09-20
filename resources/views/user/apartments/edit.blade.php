@extends('layouts.app')

@section('page_title')
<title>{{ config('pagetitle.main_title') }} - {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.edit') }} - {{ $apartment->title }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <form class='apartment-form form-register text-center' action="{{ route('user.apartments.update', ['apartment' => $apartment->id])}}" method="post" enctype="multipart/form-data" name='form_apartment'>
                @csrf
                @method('PUT')
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i id="fa-home-iccon-login" class="fas fa-home"></i>
                </a>
                <h1 class="h3 mb-3 font-weight-normal text-center">Edit {{$apartment->title}}</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <label for="title" class="col-md-4 col-form-label text-center green-text green-text-bold ">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title " value="{{old('title', $apartment->title)}}">

                <label for="street" class="col-md-4 col-form-label text-center green-text green-text-bold ">Street</label>
                <input type="text" name="street" class="form-control" id="street" placeholder="street..." value='{{ old('street', $apartment->address->street) }}'>

                <label for="building_number" class="col-md-4 col-form-label text-center green-text green-text-bold ">Building number</label>
                <input type="text" name="building_number" class="form-control" id="building_number" placeholder="building number..." value='{{ old('building_number', $apartment->address->building_number) }}'>

                <label for="city" class="col-md-4 col-form-label text-center green-text green-text-bold ">City</label>
                <input type="text" name="city" class="form-control" id="city" placeholder="city..." value='{{ old('city', $apartment->address->city) }}'>

                <label for="zip_code" class="col-md-4 col-form-label text-center green-text green-text-bold ">Zip code</label>
                <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="zip code..." value='{{ old('zip_code',$apartment->address->zip_code) }}'>

                <label for="region" class="col-md-4 col-form-label text-center green-text green-text-bold ">Region</label>
                <input type="text" name="region" class="form-control" id="region" placeholder="region..." value='{{ old('region',$apartment->address->region) }}'>

                <label for="country" class="col-md-4 col-form-label text-center green-text green-text-bold ">Country</label>
                <input type="text" name="country" class="form-control" id="country" placeholder="country..." value='{{ old('country',$apartment->address->country) }}'>

                <input type="hidden" name="lat" class="form-control" id="lat" placeholder="lat..." value='{{ old('lat',$apartment->address->lat) }}'>

                <input type="hidden" name="lng" class="form-control" id="lng" placeholder="lng..." value='{{ old('lng',$apartment->address->lng) }}'>

                <label for="price" class="col-md-4 col-form-label text-center green-text green-text-bold ">Price per night</label>
                <textarea type="text" name="price" class="form-control" id="price" placeholder="price...">{{old('price', $apartment->price)}}</textarea>

                <label for="number_of_rooms" class="col-md-4 col-form-label text-center green-text green-text-bold ">Number of rooms (max 10)</label>
                <textarea type="text" name="number_of_rooms" class="form-control" id="number_of_rooms" placeholder="number of rooms">{{old('number_of_rooms', $apartment->number_of_rooms)}}</textarea>

                <label for="number_of_beds" class="col-md-4 col-form-label text-center green-text green-text-bold ">Number of beds (max 10)</label>
                <textarea type="text" name="number_of_beds" class="form-control" id="number_of_beds" placeholder="number of beds">{{old('number_of_beds', $apartment->number_of_beds)}}</textarea>

                <label for="number_of_bathrooms" class="col-md-4 col-form-label text-center green-text green-text-bold ">Number of bathrooms (max 10)</label>
                <textarea type="text" name="number_of_bathrooms" class="form-control" id="number_of_bathrooms" placeholder="number of bathrooms">{{old('number_of_bathrooms', $apartment->number_of_bathrooms)}}</textarea>

                <label for="square_meters1" class="col-md-4 col-form-label text-center green-text green-text-bold ">Square meters</label>
                <textarea type="text" name="square_meters" class="form-control" id="square_meters1" placeholder="square_meters">{{ old('square_meters', $apartment->square_meters)}}</textarea>

                <label for="rating" class="col-md-4 col-form-label text-center green-text green-text-bold ">Rating (number between 1 and 5)</label>
                <textarea type="text" name="rating" class="form-control" id="rating" placeholder="rating">{{ old('rating', $apartment->rating)  }}</textarea>


                <label for="immagine" class="col-md-4 col-form-label text-center green-text green-text-bold ">Image</label>
                <input type="file" name="src" class="form-control-file" multiple>
                @if ($apartment->src)
                <p class="col-md-4 col-form-label text-center green-text green-text-bold ">Image Ok</p>
                <img src="{{ asset('storage/' . $apartment->src) }}">
                @else
                <p>There's no Image</p>
                @endif

                @foreach ($services as $service)
                <div class="form-check">
                    <label class="form-check-label">
                        <input @if ($errors->any())
                        {{ in_array($service->id, old('service_id', [])) ? 'checked' : '' }}
                        @else
                        {{ $apartment->services->contains($service) ? 'checked' : '' }}
                        @endif
                        name="service_id[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                        {{ $service->type }}
                    </label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary btn-submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('head')
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/validation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
@endpush