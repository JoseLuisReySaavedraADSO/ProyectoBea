@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@section('content')

<div>
    <table class="container">
      <thead>
        <tr>
          <th scope="col"> Nombre del dato</th>
          <th scope="col"> 
            <a href="{{ route('view', ['view' => 'profile.edit']) }}" class="btn btn-success"> Editar </a> 
          </th>
        </tr>
      </thead>
    
      <tbody>
        <tr>
          <th scope="row">Rol</th>
          <td> {{ Auth::user()->rol->nom_rol }} </td>
        </tr>
        
        <tr>
          <th scope="row">Nombre</th>
          <td> {{ Auth::user()->nombre }} </td>
        </tr>
    
        <tr>
          <th scope="row">Teléfono</th>
          <td> {{ Auth::user()->telefono }} </td>
        </tr>
    
        <tr>
          <th scope="row">Número de documento</th>
          <td> {{ Auth::user()->num_doc }} </td>
        </tr>
    
        <tr>
          <th scope="row">Tipo de Documento</th>
          <td> {{ Auth::user()->tipo_doc }} </td>
        </tr>
    
        <tr>
          <th scope="row">Correo Institucional</th>
          <td> {{ Auth::user()->correo_inst }} </td>
        </tr>
    
        <tr>
          <th scope="row">Correo Alterno</th>
          <td> {{ Auth::user()->correo_alt }} </td>
        </tr>
    
        <tr>
          <th scope="row">Regional</th>
          <td> {{ Auth::user()->regional }} </td>
        </tr>
    
        <tr>
          <th scope="row">Fecha de nacimiento</th>
          <td> {{ Auth::user()->fecha_nac }} </td>
        </tr>
    
        <tr>
          <th scope="row">Centro de formación</th>
          <td> {{ Auth::user()->centro_form }} </td>
        </tr>

      </tbody>
    </table>
</div>


@endsection