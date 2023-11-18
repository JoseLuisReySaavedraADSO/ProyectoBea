@extends('layouts.app')

@section('content')

    <body class="contraseña">
        <div class="container__contraseña">
            <div class="contraseña__titulo">
                {{ __('Restablecer contraseña') }}
            </div>
            <div class="contraseña__div">

                <div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form__item">
                            <label class="item__label" for="email">{{ __('Correo institucional') }}</label>

                            <div>
                                <input class="item__input" id="email" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if (session('status'))
                                    <div class="success__alert" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @error('email')
                                    <div class="success__alert" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div>
                            <button class="button" type="submit">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
