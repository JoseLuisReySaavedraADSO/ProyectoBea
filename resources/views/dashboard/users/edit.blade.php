@extends('layouts.dashboard')
<title>Herramientas | Teorias</title>

@php
$currentRoute = \Route::currentRouteName();
@endphp
@section('content')

<h1>Editando Usuario</h1>

<div>
    <table>
      
    <form action="{{ route('userAction', ['action' => 'update', 'id' => $id]) }}" method="get">
      @csrf
      
      <thead>
        <tr>
          <th scope="col"> Nombre del dato</th>

          <th scope="col"> 
            <a href="{{ route('view', ['view' => 'dashboard.users.view']) }}" style="background-color: pink;"> Regresar </a>

            <button type="submit" style="background-color: green;"> Guardar </button> 
          </th>
        </tr>
      </thead>
    
      <tbody>
            <tr>
              <th scope="row">Rol</th>
              <td>
                <div>
                    <select id="id_rol_fk" name="id_rol_fk">
                        <option value="{{ $user->id_rol_fk }}" selected>{{ $user->rol->nom_rol}}</option>
                        @foreach($data as $item)
                            <option value="{{ $item->id }}"> {{ $item->nom_rol }} </option>
                        @endforeach
                    </select> 

                    @error('id_rol_fk')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
            
            <tr>
              <th scope="row">Nombre</th>
              <td>
                <div>
                    <input id="nombre" type="text" name="nombre" value="{{ $user->nombre }}" required autocomplete="nombre" autofocus >

                    @error('nombre')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Teléfono</th>
              <td>  
                <div>
                    <input id="telefono" type="text" name="telefono" value="{{ $user->telefono }}" required autocomplete="telefono">

                    @error('telefono')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Número de documento</th>
              <td>
                <div>
                    <input id="num_doc" type="text" value=" {{$user->num_doc }} " name="num_doc" required autocomplete="num_doc">

                    @error('num_doc')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Tipo de Documento</th>
              <td> 
                <div>
                    <select id="tipo_doc" name="tipo_doc">
                        <option value="{{ $user->tipo_doc }}" selected>{{ $user->tipo_doc }}</option>
                        <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                        <option value="Numero ciego SENA">Numero ciego SENA</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Documento Nacional de Identificación Pasaporte">Documento Nacional de Identificación Pasaporte</option>
                        <option value="Número de Identificación Tributaria">Número de Identificación Tributaria</option>
                        <option value="PEP - RAMV">PEP - RAMV</option>
                        <option value="PEP">PEP</option>
                        <option value="Permiso por Protección Temporal">Permiso por Protección Temporal</option>
                    </select> 

                    @error('tipo_doc')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Correo Institucional</th>
              <td> 
                <div>
                    <input id="correo_inst" type="email" name="correo_inst" value="{{ $user->correo_inst }}" required autocomplete="correo_inst">

                    @error('correo_inst')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Correo Alterno</th>
              <td>
                <div>
                    <input id="correo_alt" type="email" name="correo_alt" value=" {{ $user->correo_alt }} " required autocomplete="correo_alt">

                    @error('correo_alt')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Regional</th>
              <td>  
                <div>
                    <select id="regional" name="regional">
                        <option value="{{ $user->regional }}" selected>{{ $user->regional }}</option>
                        <option value="Boyacá">Boyacá</option>
                        <option value="Cundinamarca">Cundinamarca</option>
                        <option value="Distrito Capital">Distrito Capital</option>
                        <option value="Huila">Huila</option>
                        <option value="Norte de Santander">Norte de Santander</option>
                        <option value="Santander">Santander</option>
                        <option value="Tolima">Tolima</option>
                    </select>                

                    @error('regional')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Fecha de nacimiento</th>
              <td>  
                <div>
                    <input id="fecha_nac" type="date" name="fecha_nac" value="{{ $user->fecha_nac }}" required autocomplete="fecha_nac">

                    @error('fecha_nac')
                        <span  role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Centro de formación</th>
              <td>
                <div>
                    <input id="centro_form" type="text" name="centro_form" value="{{ $user->centro_form }} " required autocomplete="centro_form">

                    @error('centro_form')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
              </td>
            </tr>
        </form>
      </tbody>
    </table>
</div>


@endsection