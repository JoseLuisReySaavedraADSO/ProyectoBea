<title>Editar | Secciones</title>
@php
$currentRoute = \Route::currentRouteName();
@endphp
@extends('dashboard.secciones.secciones')
{{-- @extends('layouts.dashboard') --}}
@section('formulario')

<section class="search-and-user">
    <h1>Editar | Secciones</h1>
</section>
<section class="grid">
    <article>
    <div style="display: flex; justify-content: space-between;">
            <h2>Estas editando la seccion con el id {{$seccionId->id}}</h2>
            <a href=" {{ route('dashboard.secciones') }}">
                <i class="bx bx-x"></i>
            </a>
        </div>
        <br>

        <form method="POST" action="{{ route('dashboard.secciones.update', $seccionId->id) }}">
            @csrf
            
            <label for="titulo_seccion"></label>
            <input type="text" name="titulo_seccion" placeholder="Titulo" value="{{ $seccionId->titulo_seccion }}">

            <button type="submit" class="save">Guardar</button>
        </form>
    </article>
</section>

@endsection

