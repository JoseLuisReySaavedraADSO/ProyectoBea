@extends('layouts.dashboard')
<title>Herramientas | Secciones</title>
@php
$Url = $_SERVER['REQUEST_URI'];
@endphp
@section('content')

@include('alerts')

<section class="grid">
  <div id="formulario">
    <section class="search-and-user">
      <h1>Agregar | Secciones</h1>
    </section>
    <article>
      <a href="#" class="cerrar-formulario">
        <i class="bx bx-x"></i>
      </a>
      <form method="GET" action=" {{ route('seccionesAction', ['action' => 'create']) }} ">
        @csrf
        <!-- Campos del formulario para agregar una sección -->
        <div class="elementos">
          <div class="form__item">
            <label class="item__label" for="titulo_seccion">Título de la Sección</label>
            <input class="item__input" type="text" name="titulo_seccion" id="titulo_seccion">
          </div>

          <button class="button button__dashboard" type="submit">Agregar</button>

        </div>
      </form>
    </article>
  </div>

  <section class="search-and-user">
    <h1>Herramientas | Secciones</h1>
  </section>
  <div>
    <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Sección</a>

    <article class="principal">
      <table class="tabla_3">
        <thead>
          <th>Visibilidad</th>
          <th>Titulo</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </thead>
        @foreach ($secciones as $seccion)
        <tr>
          <th>
            <div class="toggle-container">
              <form id="visibilidadForm_{{ $seccion->id }}" method="POST" action="{{ route('seccionesAction', ['action' => 'visibilidad', 'id' => $seccion->id]) }}">
                @csrf
                <div class="toggle-container">
                  <label class="switch">
                    <input id="visibilidadCheckbox_{{ $seccion->id }}" type="checkbox" name="visibilidad" {{$seccion->visibilidad ? 'checked' : ''}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <button type="submit" style="display: none;"></button>
              </form>

              <script>
                document.getElementById('visibilidadCheckbox_{{ $seccion->id }}').addEventListener('change', function() {
                  document.getElementById('visibilidadForm_{{ $seccion->id }}').submit();
                });
              </script>
            </div>
          </th>
          <th>{{ $seccion->titulo_seccion }}</th>
          <th>
            <a href="{{ route('seccionesAction', ['action' => 'edit', 'id' => $seccion->id]) }}">
              <i class="bx bx-edit-alt editar"></i>
            </a>
          </th>
          <th>
            <a href="{{ route('seccionesAction', ['action' => 'delete', 'id' => $seccion->id]) }}">
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