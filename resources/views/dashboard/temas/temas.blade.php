<title>Herramientas | Temas</title>
@php
$Url = $_SERVER['REQUEST_URI'];
@endphp
@extends('layouts.dashboard')

@section('content')
@if (session('success'))
<article style="background-color: rgb(126, 245, 126)">
  {{ session('success') }}
</article>
@endif


<section class="grid">
  <div id="formulario">
    <section class="search-and-user">
      <h1>Agregar | Temas</h1>
    </section>
    <article>
      <a href="#" class="cerrar-formulario">
        <i class="bx bx-x"></i>
      </a>
      <form class="" method="GET" action="{{ route('temasAction', ['action' => 'create']) }}">
        @csrf
        <!-- Campos del formulario para agregar un tema -->
        <div class="elementos">

          <div class="form__item">
            <label class="item__label" for="titulo_tema">Título del Tema</label>
            <br>
            <input class="item__input" type="text" name="titulo_tema" id="titulo_tema">
          </div>

          <div>
            <label class="item__label" for="id_seccion">A que seccion pertenece?</label>
            <select class="item__input" name="id_seccion" id="id_seccion">
              <option disabled selected selected> A que seccion pertenece? </option>
              @foreach ($secciones as $seccion)
              <option value="{{ $seccion->id }}">{{ $seccion->titulo_seccion }}</option>
              @endforeach
            </select>
          </div>


          <button class="button button__dashboard" type="submit">Agregar</button>
        </div>

      </form>
    </article>
  </div>

  <section class="search-and-user">
    <h1>Herramientas | Temas</h1>
  </section>
  <div>
    <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Temas</a>
    <article class="principal">
      <table class="tabla_4">
        <thead>
          <th>Visibilidad</th>
          <th>Titulo</th>
          <th>Secciones</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </thead>
        @foreach ($temas as $tema)
        <tr>
          <th>
            <div class="toggle-container">
              <form id="visibilidadForm_{{ $tema->id }}" method="POST" action="{{ route('temasAction', ['action' => 'visibilidad', 'id' => $tema->id]) }}">
                @csrf
                <div class="toggle-container">
                  <label class="switch">
                    <input id="visibilidadCheckbox_{{ $tema->id }}" type="checkbox" name="visibilidad" {{$tema->visibilidad ? 'checked' : ''}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <button type="submit" style="display: none;"></button>
              </form>

              <script>
                document.getElementById('visibilidadCheckbox_{{ $tema->id }}').addEventListener('change', function() {
                  document.getElementById('visibilidadForm_{{ $tema->id }}').submit();
                });
              </script>
            </div>
          </th>
          <th>{{ $tema->titulo_tema }}</th>
          {{-- {{ dd($tema->id_seccion_fk) }} --}}
          <th>
            @if ($tema->id_seccion_fk !== null)
            {{ $tema->secciones->titulo_seccion }}
            @else
            No tiene una sección
            @endif
          </th>
          <th>
            <a href="{{ route('temasAction', ['action' => 'edit', 'id' => $tema->id]) }}">
              <i class="bx bx-edit-alt editar"></i>
            </a>
          </th>
          <th>
            <a href="{{ route('temasAction', ['action' => 'delete', 'id' => $tema->id]) }}">
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