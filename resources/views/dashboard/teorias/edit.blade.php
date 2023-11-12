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
            <a href="{{ route('dashboardAction', ['action' => 'teorias']) }}" class="cerrar-formulario">
                <i class="bx bx-x"></i>
            </a>
            <form class="register__form" method="POST"
                action="{{ route('teoriasAction', ['action' => 'update', 'id' => $teoriaId->id]) }}"
                enctype="multipart/form-data">
                @csrf

                <div>

                    <div class="form__item">
                        <label class="item__label" for="titulo_teoria">Título de la teoria</label>
                        <br>
                        <input class="item__input" type="text" name="titulo_teoria" id="titulo_teoria"
                            value="{{ $teoriaId->teoria->titulo_teoria }}">
                    </div>

                    <div class="form__item">

                        <label class="item__label" for="id_tema">A que tema pertenece?</label>
                        <br>
                        <select class="item__input" name="id_tema">
                            <option disabled>A que tema pertenece?</option>
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}" @if (isset($teoriaId->tema->id) && $teoriaId->tema->id == $tema->id) selected @endif>
                                    {{ $tema->titulo_tema }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div>

                    <div class="form__item">
                        <label class="item__label" for="descripcion_teoria">Descripcion</label>
                        <br>
                        <textarea class="item__input text_area" name="descripcion_teoria">{{ $teoriaId->teoria->desc_teoria }}</textarea>
                    </div>

                </div>

                <div>

                    

                    <br>

                    <div class="form__item">
                        <label class="item__label" for="imagen_teoria">Imagen</label>
                            {{-- <div class="file-select" id="imagen"> --}}
                                <input type="file" name="imagen_teoria" id="imagen_teoria" accept="image/*">
                                {{-- <input type="file" name="imagen_teoria" id="imagen_teoria" accept="image/*"> --}}
                            {{-- </div> --}}
                    </div>


                    <div class="form__item">
                        <label class="item__label" for="pdf_practica">PDF
                            {{-- <div class="file-select" id="pdf"></label> --}}
                                <input type="file" name="pdf_practica" accept=".pdf">

                                {{-- <input type="file" name="pdf_practica" id="pdf_practica" accept=".pdf"> --}}
                            {{-- </div> --}}
                    </div>
                </div>
                <button class="button button__dashboard" type="submit">Guardar</button>
            </form>
        </article>
    </section>
@endsection
