@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mt-3 mb-3">Lista posts</h1>
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
                        @forelse ($apartments as $apartment)
                            <tr>
                                <td>{{ $apartment->title }}</td>
                                <td>{{ $apartment->address}}</td>
                                <td>{{ $apartment->price }}</td>
                                <td>
                                    <a class="btn btn-small btn-info"
                                    {{-- href="{{ route('user.apartments.show', ['post' => $post->id]) }}"> --}}
                                        Dettaglio
                                    </a>
                                    {{-- <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"> --}}
                                        Modifica
                                    </a>
                                    {{-- <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post"> --}}
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-small btn-danger" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    Non è presente alcun post
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
