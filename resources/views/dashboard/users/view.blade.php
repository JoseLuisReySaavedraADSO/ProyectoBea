@extends('layouts.dashboard')
<title>Herramientas | Teorias</title>

@php
$currentRoute = \Route::currentRouteName();
@endphp
@section('content')

<h1>Usuarios</h1>

<div>   
    <a href="{{ route('view', ['view' => 'dashboard.users.create']) }}" style="background-color: green;"> Agregar Usuario </a>

    <table>
        <thead >
            <tr>
                <th> Id </th>
                <th> Rol </th>
                <th> Nombre  </th>   
                <th> Teléfono </th>
                <th> Número de documento </th>
                <th> Tipo de documento</th>
                <th> Correo institucional</th>
                <th> Correo alterno</th>
                <th> Regional </th>
                <th> Fecha de Nacimiento </th>
                <th> Centro de formación</th>
                <th> Opciones</th>

            </tr>
        </thead>
    
        <tbody >
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->rol->nom_rol}}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->num_doc }}</td>
                    <td>{{ $item->tipo_doc}}</td>
                    <td>{{ $item->correo_inst}}</td>
                    <td>{{ $item->correo_alt }}</td>
                    <td>{{ $item->regional }}</td>
                    <td>{{ $item->fecha_nac }}</td>
                    <td>{{ $item->centro_form }}</td>
                    <td>
                        <a href="{{ route('userAction', ['action' => 'edit', 'id' => $item->id]) }}" style="background-color: blue;"> Editar </a> 
                        <a href="{{ route('userAction', ['action' => 'delete', 'id' => $item->id]) }}" style="background-color: red;"> Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




