@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.login') }}</title>
@endsection

@section('content')
<div class="body-auth">
  <form class="form-signin text-center" method="POST" action="{{ route('login') }}">
      @csrf
      <a class="navbar-brand" href="{{ url('/') }}">
        <i id="fa-home-iccon-login" class="fas fa-home"></i>
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Please Log in</h1>
      <label for="email" class=" col-form-label text-md-right green-text-bold green-text">Email address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      <label for="password" class="col-form-label text-md-right green-text-bold green-text">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <div class="checkbox mb-3">
              <input class="form-check-input" type="checkbox" name="remember" checked id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>

          <button id="login-register-btn" type="submit" class="btn btn-primary">
              {{ __('Login') }}
          </button>
          <a href="{{ url('/') }}"  id="login-register-btn" class="btn btn-primary">  {{ __('Return') }} </a>

    <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
</div>
@endsection
