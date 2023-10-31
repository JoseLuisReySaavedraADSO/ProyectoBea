<title>Bea | Login</title>
@extends('layouts.out')

@section('content')

<div class="loginContainer">
    <div class="loginContainer__logo">
        <img class="loginContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>
    <div class="loginContainer__form">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form__item">
                <label class="item__label" for="correo_inst" class="left-label">{{ __('Correo Institucional') }}</label>
                <br>
                <input class="item__input" type="email" name="correo_inst" placeholder="Correo"">
                @error('email')
                    <span class="form__alert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form__item">
                <label class="item__label" for="password" class="left-label">{{ __('Contraseña') }}</label>
                <br>
                <input class="item__input" type="password" name="password" placeholder="Contraseña">
                @error('email')
                    <span class="form__alert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form__button">
                <button class="button" type="button" onclick="history.back()">Atrás</button>
                <button class="button" type="submit">{{ __('Iniciar') }}</button>
            </div>
        </form>
    </div>
    <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="welcomeContainer__sena">
</div>
@endsection
