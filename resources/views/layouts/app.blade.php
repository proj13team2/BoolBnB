<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- icon --}}
    <link rel="icon" href="https://i.ibb.co/Nx8y17C/NEW-LOGO.png">
    {{-- PAGE title --}}
    @yield('page_title')

    <!-- Scripts -->
    @stack('head')
    {{-- NB su tutte le rotte si collega app.js tranne
        he sulla home, là si collega search.js,
         POSSIBILI CAMBIAMENTI IN CORSO D'OPERA,
         guardare dopo endsection di ogni view --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600&family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header id="app">
        <div class="header-log-home">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
              {{-- ICON-TITLE - FLIZTBO --}}
              <div class="home" id="navbar">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <i class="fas fa-home"></i>
                  {{ config('pagetitle.main_title') }}
                </a>
              </div>
              {{-- MENU LOGIN(OR) PLUS TOGGLER--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="text-white collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-register" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-user" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.apartments.index') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.apartments.messages') }}">
                                        {{ __('Messages') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
      </div>
      </div>
      <div class="container">
        @yield('homepage_header_unique')
      </div>
    </header>

        <main>
            @yield('content')
        </main>
<script src="https://kit.fontawesome.com/912c80e664.js" crossorigin="anonymous"></script>
</body>
</html>
