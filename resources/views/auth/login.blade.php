<title>Bea | Login</title>
@extends('layouts.out')

@section('content')

<main class="loginContainer">
    <div class="loginContainer__logo">
        <img class="loginContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>

    <div class="loginContainer__form">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form__item">
                <label class="item__label left-label" for="correo_inst">{{ __('Correo Institucional') }}</label>
                {{-- <br> --}}
                {{-- <input class="item__input" type="email" name="correo_inst" placeholder="Correo" required autofocus> --}}
                <input class="item__input" type="email" name="correo_inst" id="correo_inst" placeholder="Correo" required autofocus>
                @error('correo_inst')
                <span class="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form__item">
                <label class="item__label left-label" for="password">{{ __('Contraseña') }}</label>
                {{-- <br> --}}
                <input class="item__input" type="password" name="password" id="password" placeholder="Contraseña" required>

            </div>

            <!-- @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif -->

            <div class="form__button">
                <a href="{{ url('/') }}">
                    <button class="button" type="button">{{ __('Atras') }}</button>
                </a>
                <button class="button" type="submit">{{ __('Iniciar') }}</button>
            </div>
            
        </form>
    </div>

    <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="welcomeContainer__sena">
</main>
@endsection