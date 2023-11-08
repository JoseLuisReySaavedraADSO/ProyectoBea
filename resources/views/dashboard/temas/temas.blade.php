@extends('layouts.dashboard')
<title>Herramientas | Temas</title>
@php
    $currentRoute = \Route::currentRouteName();
@endphp
@section('content')
    @if (session('success'))
        <article style="background-color: rgb(126, 245, 126)">
            {{ session('success') }}
        </article>
    @endif

    <a href="#formulario" class="abrir-formulario" id="abrir-btn">Agregar Temas</a>

    <section class="grid">
        <div id="formulario">
            <section class="search-and-user">
                <h1>Agregar | Temas</h1>
            </section>
            <article>
                <a href="#" class="cerrar-formulario">
                    <i class="bx bx-x"></i>
                </a>
                <form method="post" action=" {{ route('dashboard.temas.add') }} ">
                    @csrf
                    <!-- Campos del formulario para agregar una sección -->
                    <label for="titulo_tema">Título del Tema</label>
                    <input type="text" name="titulo_tema" id="titulo_tema">
                    <select name="id_seccion">
                        <option disabled selected selected> A que seccion pertenece? </option>
                        @foreach ($secciones as $seccion)
                            <option value="{{ $seccion->id }}">{{ $seccion->titulo_tema }}</option>
                        @endforeach
                    </select>
                    <!-- Agrega otros campos según sea necesario -->
                    <button type="submit">Agregar</button>
                </form>
            </article>
        </div>

        <section class="search-and-user">
            <h1>Herramientas | Temas</h1>
        </section>
        <article>
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Secciones</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                @foreach ($temas as $tema)
                    <tr>
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
                            <a href="{{ route('dashboard.temas.edit', $tema->id) }}">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                        </th>
                        <th>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tema->id }}').submit();"><i
                                    class="bx bx-trash"></i></a>
                            <form id="delete-form-{{ $tema->id }}"
                                action="{{ route('dashboard.temas.delete', $tema->id) }}" method="POST"
                                style="display: none;">
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
