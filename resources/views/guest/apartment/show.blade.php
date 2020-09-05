@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h1 class="mt-3 mb-3">Dettagli Appartmento</h1>
                </div>
                <div>
                    @if($apartment->src)
                        <img src="{{ asset('storage/' . $apartment->src) }}" alt="">
                    @endif
                </div>
                <p>
                    <strong>Titolo:</strong>
                    {{ $apartment->title }}
                </p>
                <p>
                    <strong>address:</strong>
                    {{ $apartment->address->street }} {{ $apartment->address->building_number }}, {{ $apartment->address->city }}
                </p>
                <p>
                    <strong>price:</strong>
                    {{ $apartment->price }}
                </p>
                <p>
                    <strong>number_of_rooms:</strong>
                    {{ $apartment->number_of_rooms }}
                </p>
                <p>
                    <strong>number_of_bathrooms:</strong>
                    {{ $apartment->number_of_bathrooms }}
                </p>
                <p>
                    <strong>square_meters:</strong>
                    {{ $apartment->square_meters }}
                </p>
                <p>
                    <strong>Slug: </strong>
                    {{ $apartment->slug }}
                </p>
                <p>
                    <strong>Creato il: </strong>
                    {{ $apartment->created_at }}
                </p>
                <p>
                    <strong>Aggiornato il: </strong>
                    {{ $apartment->updated_at }}
                </p>
                <p>
                    <strong>Services: </strong>
                    @forelse ($apartment->services as $service)
                        {{ $service->type }}{{$loop->last ? '' : ', '}}
                    @empty
                        -
                    @endforelse
                </p>
            </div>
            <div class="col-12">
            <form action="{{route('guest.message', ['apartment' => $apartment->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email " value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea type="text" name="content" class="form-control" id="content" placeholder="content..." value='{{ old('content') }}'></textarea>
                </div>
                <button type='submit'>Invia Messaggio</button>
            </form>
            </div>
        </div>
    </div>
@endsection
