@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="num_doc" class="col-md-4 col-form-label text-md-end">{{ __('Número de documento') }}</label>

                            <div class="col-md-6">
                                <input id="num_doc" type="text" class="form-control @error('num_doc') is-invalid @enderror" name="num_doc" required autocomplete="num_doc">

                                @error('num_doc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_doc" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <select id="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror" name="tipo_doc">
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
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="correo_inst" class="col-md-4 col-form-label text-md-end">{{ __('Correo SENA') }}</label>

                            <div class="col-md-6">
                                <input id="correo_inst" type="email" class="form-control @error('correo_inst') is-invalid @enderror" name="correo_inst" required autocomplete="correo_inst">

                                @error('correo_inst')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="correo_alt" class="col-md-4 col-form-label text-md-end">{{ __('Correo alterno') }}</label>

                            <div class="col-md-6">
                                <input id="correo_alt" type="email" class="form-control @error('correo_alt') is-invalid @enderror" name="correo_alt" required autocomplete="correo_alt">

                                @error('correo_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="regional" class="col-md-4 col-form-label text-md-end">{{ __('Regional') }}</label>

                            <div class="col-md-6">

                                <select id="regional" class="form-control @error('regional') is-invalid @enderror" name="regional">
                                    <option value="" selected>Selecciona una regional...</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Antioquia">Antioquia</option>
                                </select>                

                                @error('regional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" required autocomplete="fecha_nac">

                                @error('fecha_nac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="centro_form" class="col-md-4 col-form-label text-md-end">{{ __('Centro de formación') }}</label>

                            <div class="col-md-6">
                                <input id="centro_form" type="text" class="form-control @error('centro_form') is-invalid @enderror" name="centro_form" required autocomplete="centro_form">

                                @error('centro_form')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
