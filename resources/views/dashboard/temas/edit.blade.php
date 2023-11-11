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
            <div style="display: flex; justify-content: space-between;">
                <h2>Estas editando el tema con el id {{ $temaId->id }}</h2>
                <a href=" {{ route('dashboardAction', ['action' => 'temas']) }}">
                    <i class="bx bx-x"></i>
                </a>
            </div>
            <br>

            <form method="GET" action="{{ route('temasAction', ['action' => 'update', 'id' => $temaId->id]) }}">
                @csrf

                {{-- {{dd($temaId->secciones->id)}} --}}
                <select name="id_seccion">
                    <option disabled>A que seccion pertenece?</option>
                    <option value="">Sin seccion</option>
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}" 
                            @if (isset($temaId->secciones->id) && $temaId->secciones->id == $seccion->id) 
                                selected   
                            @endif>
                            {{ $seccion->titulo_seccion }}
                        </option>
                    @endforeach
                </select>

                <label for="titulo_tema"></label>
                <input type="text" name="titulo_tema" placeholder="Titulo" value="{{ $temaId->titulo_tema }}">

                <button type="submit" class="save">Guardar</button>
            </form>
        </article>
    </section>
@endsection
