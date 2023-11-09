@extends('layouts.dashboard')
<title>Herramientas | Teorias</title>

@php
    $Url = $_SERVER['REQUEST_URI'];
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
                <form method="GET" action="{{ route('teoriasAction', ['action' => 'create']) }}">
                    @csrf
                    {{-- ACA VA A HABER UN MIERDERO --}}
                    <select name="id_tema">
                        <option disabled selected selected> A que tema pertenece? </option>
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}">{{ $tema->titulo_tema }}</option>
                            @endforeach
                        </select>
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
                    <th>Tema</th>
                    {{-- <th>practica</th> --}}
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                @foreach ($teorias as $teoria)
                    <tr>
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
                        {{-- <th>
                            <a href="{{ route('temasAction', ['action' => 'edit', 'id' => $teoria->id]) }}">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                        </th> --}}


                        {{-- <th>
                            <a href="{{ route('temasAction', ['action' => 'delete', 'id' => $teoria->id]) }}">
                                <i class="bx bx-trash"></i>
                            </a>
                        </th> --}}

                    </tr>
                @endforeach
            </table>
        </article>

        @yield('formulario')
        {{-- <article>

    </article> --}}
    </section>
@endsection
