<title>Editar | Secciones</title>
@php
    $Url = $_SERVER['REQUEST_URI'];
@endphp
@extends('dashboard.teorias.teorias')
{{-- @extends('layouts.dashboard') --}}
@section('formulario')
    <section class="search-and-user">
        <h1>Editar | Teorias</h1>
    </section>
    <section class="grid">
        <article>
            <div style="display: flex; justify-content: space-between;">
                <h2>Estas editando la teoria con el id {{ $teoriaId->id }}</h2>
                <a href=" {{ route('dashboardAction', ['action' => 'teorias']) }}">
                    <i class="bx bx-x"></i>
                </a>
            </div>
            <br>

            <form method="POST" action="{{ route('teoriasAction', ['action' => 'update', 'id' => $teoriaId->id]) }}" enctype="multipart/form-data">
                @csrf

                <label for="titulo_teoria">Título de la teoria</label>
                <input type="text" name="titulo_teoria" value="{{ $teoriaId->teoria->titulo_teoria }}">

                <br>

                <label for="descripcion_teoria">Descripcion</label>
                <br>
                <textarea name="descripcion_teoria" cols="30" rows="10">{{ $teoriaId->teoria->desc_teoria }}</textarea>

                <br>
                <label for="imagen_teoria">Imagen</label>
                @if ($teoriaId->imagen)
                    @if ($teoriaId->imagen)
                        <p>Recuerda que si no cambias esta imagen se dejara la anterior:
                            <a style="text-decoration: underline; color:blue"
                                href="{{ asset('storage/' . $teoriaId->imagen->path) }}">
                                {{ $teoriaId->imagen->path }}
                            </a>
                        </p>
                    @endif
                @endif
                <input type="file" name="imagen_teoria" accept="image/*">

                <br>

                <label for="pdf_practica">PDF</label>
                @if ($teoriaId->practica)
                    <p>Recuerda que si no cambias este pdf se dejara el documento anterior:
                        <a style="text-decoration: underline; color:blue"
                            href="{{ asset('storage/' . $teoriaId->practica->pdf_path) }}">
                            {{ $teoriaId->practica->pdf_path }}
                        </a>
                    </p>
                @endif
                <input type="file" name="pdf_practica" accept=".pdf">

                <select name="id_tema">
                    <option disabled>A que tema pertenece?</option>

                    @foreach ($temas as $tema)
                        <option value="{{ $tema->id }}"
                            @if (isset($teoriaId->tema->id) && $teoriaId->tema->id == $tema->id)
                                selected
                            @endif>
                            {{ $tema->titulo_tema }}
                        </option>
                    @endforeach
                </select>

                <button type="submit">Guardar</button>
            </form>
        </article>
    </section>
@endsection
