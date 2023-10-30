<title>Bea | Login</title>
@extends('layouts.out')

@section('content')

<div class="container">
    <div class="logo">
        <img src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>
    <div class="options">
            <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="correo_inst" class="left-label">{{ __('Correo Institucional') }}</label>
                    <input type="email" name="correo_inst" placeholder="Correo" style="background-color: #D9D9D9;">
                    @error('email')
                        <span class="form__alert" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="left-label">{{ __('Contraseña') }}</label>
                    <input type="password" name="password" placeholder="Contraseña" style="background-color: #D9D9D9;">
                    @error('email')
                        <span class="form__alert" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group buttons">
                    <button type="button" onclick="history.back()">Atrás</button>
                    <button type="submit">{{ __('Iniciar') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="logo">
        <img src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                           <label for="correo_inst">{{ __('Correo Institucional') }}</label>

                            <div>
                                   <input id="correo_inst" type="text" class="form-group form-control @error('correo_inst') is-invalid @enderror" name="correo_inst" value="{{ old('correo_inst') }}" required autocomplete="correo_inst" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="password">{{ __('Contraseña') }}</label>

                            <div>
                                <input id="password" type="password" class="form-group form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
