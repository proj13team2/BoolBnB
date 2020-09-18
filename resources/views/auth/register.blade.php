@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.register') }}</title>
@endsection

@section('content')
<div class="body-auth">
  <form class="form-register text-center" name = "form_register" method="POST" action="{{ route('register') }}">
      @csrf
      <a class="navbar-brand" href="{{ url('/') }}">
        <i id="fa-home-iccon-login" class="fas fa-home"></i>
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>
      <label for="name" class="col-md-4 col-form-label text-center green-text green-text-bold ">Name</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        <label for="lastname" class="col-md-4 col-form-label text-center green-text green-text-bold ">Lastname</label>

            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <label for="date_of_birth" class="col-md-4 col-form-label text-center green-text green-text-bold ">Date of birth</label>

              <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

              @error('date_of_birth')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
        <label for="email" class="col-md-4 col-form-label text-center green-text green-text-bold ">E-Mail Address</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <label for="password" class="col-md-4 col-form-label text-center green-text green-text-bold ">Password</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <label for="password-confirm" class="col-md-4 col-form-label text-center green-text green-text-bold ">Confirm Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">



                <button id="login-register-btn" type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <a href="{{ url('/') }}"  id="login-register-btn" class="btn btn-primary">  {{ __('Return') }} </a>

    <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
</div>
@endsecti
@endsection

@push('head')
    <script src="{{ asset('js/validation.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
@endpush
