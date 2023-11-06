@extends('layouts.dashboard')
<title>Herramientas | Secciones</title>
@php
$currentRoute = \Route::currentRouteName();
@endphp
@section('content')
<section class="search-and-user">
    <h1>Herramientas | Secciones</h1>
</section>
<section class="grid">
    <article>
        <table>
            <tr>
                <th>Titulo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($secciones as $seccion)
            <tr>
                <th>{{ $seccion->titulo_tema }}</th>
                <th>
                    <a href="{{ route('dashboard.secciones.edit', $seccion->id) }}">
                        <i class="bx bx-edit-alt"></i>
                    </a>
                </th>
                <th>
                    <i class="bx bx-trash"></i>
                </th>
            </tr>
            @endforeach
        </table>
    </article>

    <article>

    </article>
</section>

@endsection