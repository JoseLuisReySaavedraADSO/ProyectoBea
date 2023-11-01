<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bea | Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>

    <body>

    @if (Route::has('login'))
        <main class="welcomeContainer">
            <div class="welcomeContainer__logo">
                <img class="welcomeContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
            </div>
            <div class="welcomeContainer__options">
                @auth
                    <div class="options">
                        <a href="{{ url('/home') }}">
                            <div class="options__icon">
                                <i class='bx bx-user'></i>
                            </div>
                            HOME
                        </a>
                    </div>
                @else
                    <div class="options">
                        <a href="{{ route('login') }}">
                            INGRESA
                            <div class="options__icon">
                                <i class='bx bxs-log-in'></i>
                            </div>
                        </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="options">
                            <a href="{{ route('register') }}">
                                REGISTRATE
                                <div class="options__icon">
                                    <i class='bx bxs-plus-square'></i>
                                </div>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
            <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="welcomeContainer__sena welcomeContainer__sena--white">
        </main>
    @endif
    
    </body>
</html>
