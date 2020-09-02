@extends('layouts.app')

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
                <form action="{{ route('user.apartments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="title " value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="address">address</label>
                        <textarea type="text" name="address" class="form-control" id="address" placeholder="address...">{{ old('address') }}</textarea>
                        <p class="address-btn">Conferma Indirizzo</p>
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
                        <label for="address_lng">address_lng</label>
                        <textarea type="text" name="address_lng" class="form-control" id="address_lng" placeholder="address_lng">{{ old('address_lng') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="address_lat">address_lat</label>
                        <textarea type="text" name="address_lat" class="form-control" id="address_lat" placeholder="address_lat">{{ old('address_lat') }}</textarea>
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

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
