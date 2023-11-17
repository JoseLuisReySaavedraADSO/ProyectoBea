@extends('layouts.dashboard')
<title>Herramientas | Usuarios</title>
@php
$Url = $_SERVER['REQUEST_URI'];
@endphp

@section('content')

@if (session('success'))
<article style="background-color: rgb(126, 245, 126)">
    {{ session('success') }}
</article>
@endif

<section class="grid">
    <div id="formulario">
        <section class="search-and-user">
            <h1>Agregar | Usuarios</h1>
        </section>

        <article>
            <a href="#" class="cerrar-formulario">
                <i class="bx bx-x"></i>
            </a>

            <form class="register__form" action="{{ route('userAction', ['action' => 'create']) }}" method="get">
                @csrf

                <div>
                    <div class="form__item">
                        <label class="item__label" for="nombre">{{ __('Nombre') }}</label>

                        <div>
                            <input placeholder="@error('nombre') {{ $message }} @enderror" id="nombre" type="text" class="@error('nombre') is-invalid @enderror item__input" name="nombre" required autocomplete="nombre" @if (!$errors->has('nombre')) value=" {{ old('nombre') }}" @endif>
                        </div>
                    </div>

                    <div class="form__item">
                        <label class="item__label" for="telefono">{{ __('Telefono') }}</label>

                        <div>
                            <input placeholder="@error('telefono') {{ $message }} @enderror" id="telefono" type="text" class="@error('telefono') is-invalid @enderror item__input" name="telefono" required autocomplete="telefono" @if (!$errors->has('telefono')) value=" {{ old('telefono') }}" @endif required
                            autocomplete="telefono">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="form__item">
                        <label class="item__label" for="tipo_doc">{{ __('Tipo de documento') }}</label>

                        <div>
                            <select id="tipo_doc" class="@error('tipo_doc') is-invalid @enderror item__input" name="tipo_doc" @if (!$errors->has('tipo_doc')) value=" {{ old('tipo_doc') }}" @endif>
                                <option value="" disabled selected selected>Selecciona un tipo de documento...
                                </option>
                                @foreach ($tiposDocumento as $tipo)
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form__item">
                        <label class="item__label" for="num_doc">{{ __('Número de documento') }}</label>

                        <div>
                            <input placeholder="@error('num_doc') {{ $message }} @enderror" id="num_doc" type="text" class="@error('num_doc') is-invalid @enderror item__input" name="num_doc" required autocomplete="num_doc" @if (!$errors->has('num_doc')) value=" {{ old('num_doc') }}" @endif>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="form__item">
                        <label class="item__label" for="correo_inst">{{ __('Correo SENA') }}</label>

                        <div>
                            <input placeholder="@error('correo_inst') {{ $message }} @enderror" id="correo_inst" type="email" class="@error('correo_inst') is-invalid @enderror item__input" name="correo_inst" required autocomplete="correo_inst" @if (!$errors->has('correo_inst')) value=" {{ old('correo_inst') }}" @endif>
                        </div>
                    </div>

                    <div class="form__item">
                        <label class="item__label" for="correo_alt">{{ __('Correo alterno') }}</label>

                        <div>
                            <input placeholder="@error('correo_alt') {{ $message }} @enderror" id="correo_alt" type="email" class="@error('correo_alt') is-invalid @enderror item__input" name="correo_alt" required autocomplete="correo_alt" @if (!$errors->has('correo_alt')) value=" {{ old('correo_alt') }}" @endif>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="form__item">
                        <label class="item__label" for="regional">{{ __('Regional') }}</label>

                        <div>
                            <select id="regional" class="@error('regional') is-invalid @enderror item__input" name="regional" @if (!$errors->has('regional')) value=" {{ old('regional') }}" @endif>
                                <option value="" disabled selected>Selecciona una regional...</option>
                                @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento }}">{{ $departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form__item">
                        <label class="item__label" for="centro_form">{{ __('Centro de formación') }}</label>

                        <div>
                            <input placeholder="@error('centro_form') {{ $message }} @enderror" id="centro_form" type="text" class="@error('centro_form') is-invalid @enderror item__input" name="centro_form" required autocomplete="centro_form" @if (!$errors->has('centro_form')) value=" {{ old('centro_form') }}" @endif>
                        </div>
                    </div>
                </div>

                <div>
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

                    <div class="form__item">
                        <label class="item__label" for="id_rol_fk">{{ __('Rol') }}</label>

                        <select id="id_rol_fk" name="id_rol_fk" class="item__input">
                            @foreach ($rol as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nom_rol }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Aquí para las secciones que puede ver el usuario -->
                <div>
                    <div class="form__item">
                        <label class="item__label" for="vistas">{{ __('Administrar vistas secciones') }}</label>

                        <div>
                            @foreach($seccion as $item)
                            <div>
                                <input type="checkbox" class="@error('vistas') is-invalid @enderror" name="vistas[]" value="{{ $item->id }}">
                                <label>{{ $item->titulo_seccion }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <button class="button button__dashboard" type="submit">Agregar</button>

            </form>
        </article>
    </div>

    <section class="search-and-user">
        <h1>Herramientas | Usuarios</h1>
    </section>
    <div>
        <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Usuarios</a>

        <article class="principal">
            <table class="tabla_4">
                <thead>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>

                @foreach ($data as $item)
                <tr>
                    <th>{{ $item->nombre }}</th>
                    <th>{{ $item->rol->nom_rol }}</th>
                    <th>
                        <a href="{{ route('userAction', ['action' => 'edit', 'id' => $item->id]) }}">
                            <i class="bx bx-edit-alt editar"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('userAction', ['action' => 'delete', 'id' => $item->id]) }}">
                            <i class="bx bx-trash eliminar"></i>
                        </a>
                    </th>
                </tr>
                @endforeach
            </table>
        </article>

    </div>

    @yield('formulario')
    {{-- <article>

    </article> --}}
</section>
@endsection