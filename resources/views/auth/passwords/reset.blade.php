@extends('layouts.app')

@section('content')

    <body class="contraseña">
        <div class="container__contraseña">
            <div class="contraseña__titulo">
                {{ __('Cambiar tu contraseña') }}
            </div>

            <div class="contraseña__div">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form__item">
                        <label for="email" class="item__label">{{ __('Correo institucional') }}</label>

                        <div>
                            <input id="email" type="email" class="item__input" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="success__alert" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form__item">
                        <label for="password" class="item__label">{{ __('Contraseña') }}</label>

                        <div>
                            <input id="password" type="password" class="item__input" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <div class="success__alert" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form__item">
                        <label for="password-confirm" class="item__label">{{ __('Confirmar contraseña') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="item__input" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div>
                        <div>
                            <button class="button" type="submit">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
