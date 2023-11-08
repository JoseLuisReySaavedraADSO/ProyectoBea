@extends('layouts.dashboard')
<title>Herramientas | Secciones</title>
@php
    $currentRoute = \Route::currentRouteName();
@endphp
@section('content')
    @if (session('success'))
        <article style="background-color: rgb(126, 245, 126)">
            {{ session('success') }}
        </article>
    @endif

    <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Sección</a>

    <section class="grid">
        <div id="formulario">
            <section class="search-and-user">
                <h1>Agregar | Secciones</h1>
            </section>
            <article>
                <a href="#" class="cerrar-formulario">
                    <i class="bx bx-x"></i>
                </a>
                <form method="post" action=" {{ route('dashboard.secciones.add') }} ">
                    @csrf
                    <!-- Campos del formulario para agregar una sección -->
                    <label for="titulo_seccion">Título de la Sección</label>
                    <input type="text" name="titulo_seccion">
                    <!-- Agrega otros campos según sea necesario -->
                    <button type="submit">Agregar</button>
                </form>
            </article>
        </div>

        <section class="search-and-user">
            <h1>Herramientas | Secciones</h1>
        </section>
        <article>
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                @foreach ($secciones as $seccion)
                    <tr>
                        <th>{{ $seccion->titulo_seccion }}</th>
                        <th>
                            <a href="{{ route('dashboard.secciones.edit', $seccion->id) }}">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                        </th>
                        <th>
                            <a href="#"        
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $seccion->id }}').submit();"><i class="bx bx-trash"></i></a>
                            <form id="delete-form-{{ $seccion->id }}" action="{{ route('dashboard.secciones.delete', $seccion->id) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </article>

        @yield('formulario')
        {{-- <article>

    </article> --}}
    </section>
@endsection
