@extends('layouts.out')

@section('content')
<main class="registerContainer">

    <form class="registerContainer__form" method="POST" action="{{ route('register') }}">
        @csrf

        <h2><b>Por favor diligencie los items</b></h2>

        <div>
            <div class="form__item">
                <label class="item__label" for="nombre">{{ __('Nombre') }}</label>

                <div>
                    <input placeholder="@error('nombre') {{$message}} @enderror" id="nombre" type="text" class="@error('nombre') is-invalid @enderror item__input" name="nombre" required autocomplete="nombre" @if (!$errors->has('nombre')) value=" {{ old('nombre') }}" @endif>
                </div>
            </div>

            <div class="form__item">
                <label class="item__label" for="telefono">{{ __('Telefono') }}</label>

                <div>
                    <input placeholder="@error('telefono') {{$message}} @enderror" id="telefono" type="text" class="@error('telefono') is-invalid @enderror item__input" name="telefono" required autocomplete="telefono" @if (!$errors->has('telefono')) value=" {{ old('telefono') }}" @endif required autocomplete="telefono">
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="tipo_doc">{{ __('Tipo de documento') }}</label>

                <div>
                    <select id="tipo_doc" class="@error('tipo_doc') is-invalid @enderror item__input" name="tipo_doc" @if (!$errors->has('tipo_doc')) value=" {{ old('tipo_doc') }}" @endif>
                        <option value="" disabled selected selected>Selecciona un tipo de documento...</option>
                        @foreach($tiposDocumento as $tipo)
                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form__item">
                <label class="item__label" for="num_doc">{{ __('Número de documento') }}</label>

                <div>
                    <input placeholder="@error('num_doc') {{$message}} @enderror" id="num_doc" type="text" class="@error('num_doc') is-invalid @enderror item__input" name="num_doc" required autocomplete="num_doc" @if (!$errors->has('num_doc')) value=" {{ old('num_doc') }}" @endif>
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="correo_inst">{{ __('Correo SENA') }}</label>

                <div>
                    <input placeholder="@error('correo_inst') {{$message}} @enderror" id="correo_inst" type="email" class="@error('correo_inst') is-invalid @enderror item__input" name="correo_inst" required autocomplete="correo_inst" @if (!$errors->has('correo_inst')) value=" {{ old('correo_inst') }}" @endif>
                </div>
            </div>

            <div class="form__item">
                <label class="item__label" for="correo_alt">{{ __('Correo alterno') }}</label>

                <div>
                    <input placeholder="@error('correo_alt') {{$message}} @enderror" id="correo_alt" type="email" class="@error('correo_alt') is-invalid @enderror item__input" name="correo_alt" required autocomplete="correo_alt" @if (!$errors->has('correo_alt')) value=" {{ old('correo_alt') }}" @endif>
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="regional">{{ __('Regional') }}</label>

                <div>
                    <select id="regional" class="@error('regional') is-invalid @enderror item__input" name="regional" @if (!$errors->has('regional')) value=" {{ old('regional') }}" @endif>
                        <option value="" disabled selected>Selecciona una regional...</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{ $departamento }}">{{ $departamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form__item">
                <label class="item__label" for="centro_form">{{ __('Centro de formación') }}</label>

                <div>
                    <input placeholder="@error('centro_form') {{$message}} @enderror" id="centro_form" type="text" class="@error('centro_form') is-invalid @enderror item__input" name="centro_form" required autocomplete="centro_form" @if (!$errors->has('centro_form')) value=" {{ old('centro_form') }}" @endif>
                </div>
            </div>
        </div>

        <div class="form__item">
            <label class="item__label" for="fecha_nac">{{ __('Fecha de nacimiento') }}</label>

            <div>
                <input id="fecha_nac" type="date" class="@error('fecha_nac') is-invalid @enderror item__input" name="fecha_nac" required autocomplete="fecha_nac" @if (!$errors->has('fecha_nac')) value=" {{ old('fecha_nac') }}" @endif>

                @error('fecha_nac')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form__button">
            <a href="{{ url('/') }}">
                <button class="button" type="button">{{ __('Atras') }}</button>
            </a>
            <button class="button" type="submit">{{ __('Iniciar') }}</button>
        </div>
    </form>

    <div class="registerContainer__logo">
        <img class="registerContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>

    <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="welcomeContainer__sena">
</main>

@endsection