<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Bea') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- style -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>

<body>

  <div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      @if (isset(Auth::user()->nombre))
      <div class="nav-title">
        <i class='bx bxs-user'></i>
        {{ 'ㅤ' . Auth::user()->nombre }}
      </div>
      @endif
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>

    <div class="nav-links">
      @guest
      @if (Route::has('login'))
      <a href="{{ route('login') }}">{{ __('Login') }}</a>
      @endif

      @if (Route::has('register'))
      <a href="{{ route('register') }}">{{ __('Register') }}</a>
      @endif
      @else
      @if (auth()->user()->id_rol_fk === 1)
      <a href="{{ route('dashboardAction', ['action' => 'secciones']) }}">Dashboard</a>
      @endif
      <a href="{{ route('view', ['view' => 'profile.user']) }}">{{ __('Perfil') }}</a>

      <a href="{{ route('secciones') }}">{{ __('Secciones') }}</a>

      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
      </form>
      @endguest

    </div>
  </div>

  <div class="content">
    <div class="title">

      @yield('content')

    </div>



</body>

</html>