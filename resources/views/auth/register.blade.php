@extends('layouts.app')

@section('content')
<main class="registerContainer">

    <form class="registerContainer__form" method="POST" action="{{ route('register') }}">
        @csrf

        <h2><b>Por favor diligencie los items</b></h2>

        <div>
            <div class="form__item">
                <label class="item__label" for="nombre">{{ __('Nombre') }}</label>
    
                <div>
                    <input id="nombre" type="text" class="@error('nombre') is-invalid @enderror item__input" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
    
                    @error('nombre')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form__item">
                <label class="item__label" for="telefono">{{ __('Telefono') }}</label>
    
                <div>
                    <input id="telefono" type="text" class="@error('telefono') is-invalid @enderror item__input" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
    
                    @error('telefono')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="tipo_doc">{{ __('Tipo de documento') }}</label>
    
                <div>
                    <select id="tipo_doc" class="@error('tipo_doc') is-invalid @enderror item__input" name="tipo_doc">
                        <option value="" selected>Selecciona un tipo de documento...</option>
                        <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                        <option value="Numero ciego SENA">Numero ciego SENA</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Documento Nacional de Identificación Pasaporte">Documento Nacional de Identificación Pasaporte</option>
                        <option value="Número de Identificación Tributaria">Número de Identificación Tributaria</option>
                        <option value="PEP - RAMV">PEP - RAMV</option>
                        <option value="PEP">PEP</option>
                        <option value="Permiso por Protección Temporal">Permiso por Protección Temporal</option>
                    </select>
    
                    @error('tipo_doc')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form__item">
                <label class="item__label" for="num_doc">{{ __('Número de documento') }}</label>
    
                <div>
                    <input id="num_doc" type="text" class="@error('num_doc') is-invalid @enderror item__input" name="num_doc" required autocomplete="num_doc">
    
                    @error('num_doc')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="correo_inst">{{ __('Correo SENA') }}</label>
    
                <div>
                    <input id="correo_inst" type="email" class="@error('correo_inst') is-invalid @enderror item__input" name="correo_inst" required autocomplete="correo_inst">
    
                    @error('correo_inst')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form__item">
                <label class="item__label" for="correo_alt">{{ __('Correo alterno') }}</label>
    
                <div>
                    <input id="correo_alt" type="email" class="@error('correo_alt') is-invalid @enderror item__input" name="correo_alt" required autocomplete="correo_alt">
    
                    @error('correo_alt')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <div class="form__item">
                <label class="item__label" for="regional">{{ __('Regional') }}</label>
    
                <div>
                    <select id="regional" class="@error('regional') is-invalid @enderror item__input" name="regional">
                        <option value="" selected>Selecciona una regional...</option>
                        <option value="Santander">Santander</option>
                        <option value="Antioquia">Antioquia</option>
                    </select>
    
                    @error('regional')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
    
            <div class="form__item">
                <label class="item__label" for="centro_form">{{ __('Centro de formación') }}</label>
    
                <div>
                    <input id="centro_form" type="text" class="@error('centro_form') is-invalid @enderror item__input" name="centro_form" required autocomplete="centro_form">
    
                    @error('centro_form')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__item">
            <label class="item__label" for="fecha_nac">{{ __('Fecha de nacimiento') }}</label>

            <div>
                <input id="fecha_nac" type="date" class="@error('fecha_nac') is-invalid @enderror item__input" name="fecha_nac" required autocomplete="fecha_nac">

                @error('fecha_nac')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form__button">
            <button class="button" type="button" onclick="history.back()">Atrás</button>
            <button class="button" type="submit">{{ __('Iniciar') }}</button>
        </div>
    </form>
    
    <div class="registerContainer__logo">
        <img class="registerContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
    </div>

    <img src="{{ asset('/img/logoSena 1.png') }}" alt="Logo sena" class="welcomeContainer__sena">
</main>

@endsection
