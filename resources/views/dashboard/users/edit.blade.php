<title>Editar | Usuarios</title>
@php
$Url = $_SERVER['REQUEST_URI'];
@endphp
@extends('dashboard.users.view')
{{-- @extends('layouts.dashboard') --}}
@section('formulario')
<section class="search-and-user">
  <h1>Editar | Usuarios</h1>
</section>
<section class="grid">
  <article>

    <a href=" {{ route('view', ['view' => 'dashboard.users.view']) }}" class="cerrar-formulario">
      <i class="bx bx-x"></i>
    </a>


    <form method="GET" action="{{ route('userAction', ['action' => 'update', 'id' => $userId->id]) }}">
      @csrf
      <div>
        <div class="form__item">
          <label class="item__label" for="nombre">{{ __('Nombre') }}</label>

          <div>
            <input value=" {{ $userId->nombre }} " placeholder="@error('nombre') {{ $message }} @enderror" id="nombre" type="text" class="@error('nombre') is-invalid @enderror item__input" name="nombre" required autocomplete="nombre" @if (!$errors->has('nombre')) value=" {{ old('nombre') }}" @endif>
          </div>
        </div>

        <div class="form__item">
          <label class="item__label" for="telefono">{{ __('Telefono') }}</label>

          <div>
            <input value=" {{ $userId->telefono }} " placeholder="@error('telefono') {{ $message }} @enderror" id="telefono" type="text" class="@error('telefono') is-invalid @enderror item__input" name="telefono" required autocomplete="telefono" @if (!$errors->has('telefono')) value=" {{ old('telefono') }}" @endif required
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
              <option value="{{ $tipo }}" @if (isset($userId->tipo_doc) && $userId->tipo_doc == $tipo) selected @endif>
                {{ $tipo }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form__item">
          <label class="item__label" for="num_doc">{{ __('Número de documento') }}</label>

          <div>
            <input value=" {{ $userId->num_doc }} " placeholder="@error('num_doc') {{ $message }} @enderror" id="num_doc" type="text" class="@error('num_doc') is-invalid @enderror item__input" name="num_doc" required autocomplete="num_doc" @if (!$errors->has('num_doc')) value=" {{ old('num_doc') }}" @endif>
          </div>
        </div>
      </div>

      <div>
        <div class="form__item">
          <label class="item__label" for="correo_inst">{{ __('Correo SENA') }}</label>

          <div>
            <input value=" {{ $userId->correo_inst }} " placeholder="@error('correo_inst') {{ $message }} @enderror" id="correo_inst" type="email" class="@error('correo_inst') is-invalid @enderror item__input" name="correo_inst" required autocomplete="correo_inst" @if (!$errors->has('correo_inst')) value=" {{ old('correo_inst') }}" @endif>
          </div>
        </div>

        <div class="form__item">
          <label class="item__label" for="correo_alt">{{ __('Correo alterno') }}</label>

          <div>
            <input value=" {{ $userId->correo_alt }} " placeholder="@error('correo_alt') {{ $message }} @enderror" id="correo_alt" type="email" class="@error('correo_alt') is-invalid @enderror item__input" name="correo_alt" required autocomplete="correo_alt" @if (!$errors->has('correo_alt')) value=" {{ old('correo_alt') }}" @endif>
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
              <option value="{{ $departamento }}" @if (isset($userId->regional) && $userId->regional == $departamento) selected @endif>
                {{ $departamento }}
              </option>
              @endforeach
            </select>
          </div>
        </div>


        <div class="form__item">
          <label class="item__label" for="centro_form">{{ __('Centro de formación') }}</label>

          <div>
            <input value=" {{ $userId->centro_form }}" placeholder="@error('centro_form') {{ $message }} @enderror" id="centro_form" type="text" class="@error('centro_form') is-invalid @enderror item__input" name="centro_form" required autocomplete="centro_form" @if (!$errors->has('centro_form')) value=" {{ old('centro_form') }}" @endif>
          </div>
        </div>
      </div>

      <div>

        <div class="form__item">
          <label class="item__label" for="fecha_nac">{{ __('Fecha de nacimiento') }}</label>

          <div>
            {{-- <input value=" {{$fechaNac}}" id="fecha_nac" type="date" class="@error('fecha_nac') is-invalid @enderror item__input"
            name="fecha_nac" required autocomplete="fecha_nac"
            @if (!$errors->has('fecha_nac')) value=" {{ old('fecha_nac') }}" @endif> --}}

            <input value="{{ $fechaNac }}" id="fecha_nac" type="date" class="@error('fecha_nac') is-invalid @enderror item__input" name="fecha_nac" required autocomplete="fecha_nac">

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
            <option value="" disabled selected>Selecciona un rol...</option>
            @foreach ($rol as $item)
            <option value="{{ $item->id }}" @if ($item->id == $userId->id_rol_fk) selected @endif>
              {{ $item->nom_rol }}
            </option>
            @endforeach
          </select>

        </div>

      </div>


      <button class="button button__dashboard" type="submit">Agregar</button>
    </form>
  </article>
</section>
@endsection