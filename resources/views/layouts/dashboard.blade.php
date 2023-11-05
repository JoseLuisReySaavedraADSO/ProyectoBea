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

</head>

<body>
    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="{{ route('home') }}">
                    <i class='bx bxs-home'></i>
                    <span class="nav-text">
                        Inicio
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class='bx bxs-key'></i>
                    <span class="nav-text">
                        Modificar roles
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="{{ route('secciones') }}">
                    <i class='bx bxs-objects-horizontal-left'></i>
                    <span class="nav-text">
                        Modificar secciones
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="{{ route('temas') }}">
                    <i class='bx bxs-edit-alt'></i>
                    <span class="nav-text">
                        Modificar temas
                    </span>
                </a>

            </li>
            <li>
                <a href="{{ route('teorias') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="nav-text">
                        Modificar teorias
                    </span>
                </a>
            </li>
            
            
        </ul>



        <ul class="logout">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-power-off'></i>
                    <span class="nav-text">
                        {{ __('Logout') }}
                    </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>
        </ul>
    </nav>
    <div class="content">
        <div class="title">
            <!-- Fullscreen Overlay Navigation Bar</div>
            <p>with HTML & CSS Neon Effect</p> -->
            @yield('content')
        </div>
    </div>
</body>

</html>