@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.create') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h1 class="mt-3 mb-3">New apartment</h1>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class='apartment-form' action="{{ route('user.apartments.store') }}" method="post" enctype="multipart/form-data" name ="form_apartment">
                    @csrf

                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="title " value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="street">street</label>
                        <input type="text" name="street" class="form-control" id="street" placeholder="street..." value='{{ old('street') }}'>
                    </div>
                    <div class="form-group">
                        <label for="building_number">building_number</label>
                        <input type="text" name="building_number" class="form-control" id="building_number" placeholder="building_number..." value='{{ old('building_number') }}'>
                    </div>
                    <div class="form-group">
                        <label for="city">city</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="city..." value='{{ old('city') }}'>
                    </div>
                    <div class="form-group">
                        <label for="zip_code">zip_code</label>
                        <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="zip_code..." value='{{ old('zip_code') }}'>
                    </div>
                    <div class="form-group">
                        <label for="region">region</label>
                        <input type="text" name="region" class="form-control" id="region" placeholder="region..." value='{{ old('region') }}'>
                    </div>
                    <div class="form-group">
                        <label for="country">country</label>
                        <input type="text" name="country" class="form-control" id="country" placeholder="country..." value='{{ old('country') }}'>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="lat" class="form-control" id="lat" placeholder="lat..." value='{{ old('lat') }}'>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="lng" class="form-control" id="lng" placeholder="lng..." value='{{ old('lng') }}'>
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <textarea type="text" name="price" class="form-control" id="price" placeholder="price...">{{ old('price') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="number_of_rooms">number_of_rooms</label>
                        <textarea type="text" name="number_of_rooms" class="form-control" id="number_of_rooms" placeholder="number of rooms">{{ old('number_of_rooms') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="number_of_beds">number_of_beds</label>
                        <textarea type="text" name="number_of_beds" class="form-control" id="number_of_beds" placeholder="number of beds">{{ old('number_of_beds') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="number_of_bathrooms">number_of_bathrooms</label>
                        <textarea type="text" name="number_of_bathrooms" class="form-control" id="number_of_bathrooms" placeholder="number_of_bathrooms">{{ old('number_of_bathrooms') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="square_meters">square_meters</label>
                        <textarea type="text" name="square_meters" class="form-control" id="square_meters" placeholder="square_meters">{{ old('square_meters') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating">rating</label>
                        <textarea type="text" name="rating" class="form-control" id="rating" placeholder="rating">{{ old('rating') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="immagine">Immagine di copertina</label>
                        <input type="file" name="src" class="form-control-file">
                    </div>
                    <div class="form-group">
                    @foreach ($services as $service)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input {{ in_array($service->id, old('service_id', [])) ? 'checked' : '' }} name="service_id[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                                {{ $service->type }}
                            </label>
                        </div>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Salva</button>
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
