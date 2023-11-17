@extends('layouts.dashboard')
<title>Herramientas | Teorias</title>

@php
$Url = $_SERVER['REQUEST_URI'];
@endphp

@section('content')
@if (session('success'))
<article class="succes-alert">
  <i class='bx bx-info-circle'></i>
  {{ session('success') }}
</article>
@endif
@if ($errors->any())
<article style="background-color: rgb(255, 60, 0)">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</article>
@endif



<section class="grid">
  <div id="formulario">
    <section class="search-and-user">
      <h1>Agregar | Teorias</h1>
    </section>
    <article>
      <a href="#" class="cerrar-formulario">
        <i class="bx bx-x"></i>
      </a>
      <form class="register__form" method="POST" action="{{ route('teoriasAction', ['action' => 'create']) }}" enctype="multipart/form-data">
        @csrf

        <div>

          <div class="form__item">
            <label class="item__label" for="titulo_teoria">Título de la teoria</label>
            <br>
            <input class="item__input" type="text" name="titulo_teoria" id="titulo_teoria">
          </div>

          <div class="form__item">
            <label class="item__label" for="id_tema">A que tema pertenece?</label>
            <br>
            <select class="item__input" name="id_tema">
              <option disabled selected selected> A que tema pertenece? </option>
              @foreach ($temas as $tema)
              <option value="{{ $tema->id }}">{{ $tema->titulo_tema }}</option>
              @endforeach
            </select>
          </div>

        </div>

        <div>

          <div class="form__item">
            <label class="item__label" for="descripcion_teoria">Descripcion</label>
            <br>
            <textarea class="item__input text_area" name="descripcion_teoria"></textarea>
          </div>

        </div>

        <div>

          <div class="form__item">
            <label class="item__label" for="imagen_teoria">Imagen
              <div class="file-select" id="imagen">
            </label>
            <input type="file" name="imagen_teoria" id="imagen_teoria" accept="image/*">
          </div>
        </div>


        <div class="form__item">
          <label class="item__label" for="pdf_practica">PDF
            <div class="file-select" id="pdf">
          </label>
          <input type="file" name="pdf_practica" id="pdf_practica" accept=".pdf">
        </div>
  </div>

  </div>
  <button class="button button__dashboard" type="submit">Guardar</button>
  </form>
  </article>
  </div>

  <section class="search-and-user">
    <h1>Herramientas | Temas</h1>
  </section>
  <div>
    <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Teorias</a>

    <article class="principal">
      <table class="tabla_4">
        <thead>
          <th>Visibilidad</th>
          <th>Titulo</th>
          <th>Tema</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </thead>
        @foreach ($teorias as $teoria)
        <tr>
          <th>
            <div class="toggle-container">
              <form id="visibilidadForm_{{ $teoria->id }}" method="POST" action="{{ route('teoriasAction', ['action' => 'visibilidad', 'id' => $teoria->id]) }}">
                @csrf
                <div class="toggle-container">
                  <label class="switch">
                    <input id="visibilidadCheckbox_{{ $teoria->id }}" type="checkbox" name="visibilidad" {{$teoria->visibilidad ? 'checked' : ''}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <button type="submit" style="display: none;"></button>
              </form>

              <script>
                document.getElementById('visibilidadCheckbox_{{ $teoria->id }}').addEventListener('change', function() {
                  document.getElementById('visibilidadForm_{{ $teoria->id }}').submit();
                });
              </script>
            </div>
          </th>
          <th>{{ $teoria->teoria->titulo_teoria }}</th>
          {{-- {{ dd($tema->id_seccion_fk) }} --}}
          <th>
            @if ($teoria->id_tema_fk !== null)
            {{ $teoria->tema->titulo_tema }}
            @else
            No tiene un tema
            @endif
          </th>
          {{-- <th>
                                @if ($teoria->id_practica_fk !== null)
                                    {{ $teoria->practica->titulo_practica }}
          @else
          No tiene un tema
          @endif
          </th> --}}


          {{-- centrate solo en agregar por ahora --}}
          <th>
            <a href="{{ route('teoriasAction', ['action' => 'edit', 'id' => $teoria->id]) }}">
              <i class="bx bx-edit-alt editar"></i>
            </a>
          </th>


          <th>
            <a href="{{ route('teoriasAction', ['action' => 'delete', 'id' => $teoria->id]) }}">
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