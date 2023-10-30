<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>

    <body>

    @if (Route::has('login'))
        <div class="container">
            <div class="logo">
                <img src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
            </div>
            <div class="options">
                @auth
                    <div class="option">
                        <a href="{{ url('/home') }}">
                            <div class="icon">
                                <i class='bx bx-user' style='color:#00b400'></i>
                            </div>
                            Home
                        </a>
                    </div>
                @else
                    <div class="option">
                        <a href="{{ route('login') }}">
                            <div class="icon">
                                <i class='bx bx-log-in' style='color:#00b400'></i>
                            </div>
                            INGRESA
                        </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="option">
                            <a href="{{ route('register') }}">
                                <div class="icon">
                                    <i class='bx bxs-plus-square' style='color:#00b400'></i>
                                </div>
                                REGISTRATE
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
            <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="bottom-logo">
        </div>
    @endif
    
    </body>
</html>
