<title>Editar | Secciones</title>
@php
    $Url = $_SERVER['REQUEST_URI'];
@endphp
@extends('dashboard.secciones.secciones')
{{-- @extends('layouts.dashboard') --}}
@section('formulario')
    <section class="search-and-user">
        <h1>Editar | Secciones</h1>
    </section>
    <section class="grid">
        <article>

            <a href=" {{ route('dashboardAction', ['action' => 'secciones']) }}" class="cerrar-formulario">
                <i class="bx bx-x"></i>
            </a>


            <form method="GET" action="{{ route('seccionesAction', ['action' => 'update', 'id' => $seccionId->id]) }}">
                @csrf

                <div class="elementos">

                    <div class="form__item">

                        <label class="item__label" for="titulo_seccion">Título de la Sección</label>
                        <input class="item__input" type="text" name="titulo_seccion" placeholder="Titulo"
                            value="{{ $seccionId->titulo_seccion }}">

                    </div>

                    <button class="button button__dashboard" type="submit">Agregar</button>

                </div>


            </form>
        </article>
    </section>
@endsection
