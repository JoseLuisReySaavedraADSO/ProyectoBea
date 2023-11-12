<title>Editar | Secciones</title>
@php
    $Url = $_SERVER['REQUEST_URI'];
@endphp
@extends('dashboard.temas.temas')
{{-- @extends('layouts.dashboard') --}}
@section('formulario')
    <section class="search-and-user">
        <h1>Editar | Temas</h1>
    </section>
    <section class="grid">
        <article>
            <a href="{{ route('dashboardAction', ['action' => 'temas']) }}" class="cerrar-formulario">
                <i class="bx bx-x"></i>
            </a>

            <form method="GET" action="{{ route('temasAction', ['action' => 'update', 'id' => $temaId->id]) }}">
                @csrf

                <div class="elementos">

                    <div class="form__item">
                        <label class="item__label" for="titulo_tema">Título del Tema</label>
                        <input class="item__input" type="text" name="titulo_tema" id="titulo_tema"
                            value="{{ $temaId->titulo_tema }}">
                    </div>

                    <div>
                        <label class="item__label" for="id_seccion">A que seccion pertenece?</label>
                        <select class="item__input" name="id_seccion" id="id_seccion">
                            <option disabled>A que seccion pertenece?</option>
                            <option value="">Sin seccion</option>
                            @foreach ($secciones as $seccion)
                                <option value="{{ $seccion->id }}" @if (isset($temaId->secciones->id) && $temaId->secciones->id == $seccion->id) selected @endif>
                                    {{ $seccion->titulo_seccion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="button button__dashboard" type="submit">Guardar</button>

                </div>

            </form>
        </article>
    </section>
@endsection
