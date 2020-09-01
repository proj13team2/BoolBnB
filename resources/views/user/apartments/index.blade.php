@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mt-3 mb-3">Lista Appartamenti</h1>
                    <a class="btn btn-primary"
                    href="{{ route('user.apartments.create') }}">
                        New apartments
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>address</th>
                            <th>price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user_apartments as $user_apartment)
                            <tr>
                                <td>{{ $user_apartment->title }}</td>
                                <td>{{ $user_apartment->address}}</td>
                                <td>{{ $user_apartment->price }}</td>
                                <td>
                                    <a class="btn btn-small btn-info"
                                    href="{{ route('user.apartments.show', ['apartment' => $user_apartment->id]) }}">
                                        Dettaglio
                                    </a>
                                    <a class="btn btn-small btn-warning"  href="{{ route('user.apartments.edit', ['apartment' => $user_apartment->id]) }}">
                                        Modifica
                                    </a>
                                    <a class="btn btn-small btn-info"  href="{{ route('user.apartments.stats', ['apartment' => $user_apartment->id]) }}">
                                        Statistiche
                                    </a>
                                    <form class="d-inline" action="{{ route('user.apartments.destroy', ['apartment' => $user_apartment->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-small btn-danger" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    Non è presente alcun appartamento
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
