@extends('layouts.dashboard')
<title>Herramientas | Teorias</title>

@php
$Url = $_SERVER['REQUEST_URI'];
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
                <th> Opciones</th>

            </tr>
        </thead>
    
        <tbody >
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->rol->nom_rol}}</td>
                    <td>{{ $item->nombre }}</td>
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




