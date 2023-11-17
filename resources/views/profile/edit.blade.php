@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

<div>
    <table class="container">
      
    <form action="{{ route('userAction', ['action' => 'profile' ]) }}" method="get">
      @csrf
      
      <thead>
        <tr class=" text-center">
          <th scope="col"> Nombre del dato</th>

          <th scope="col"> 
            <a href="{{ route('view', ['view' => 'profile.user']) }}" class="btn btn-secondary"> Regresar </a>
            <button type="submit" class="btn btn-primary"> Guardar </button> 
          </th>
        </tr>
      </thead>
    
      <tbody>
            <tr>
              <th scope="row">Nombre</th>
              <td>
                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ Auth::user()->nombre }}" required autocomplete="nombre" autofocus >

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Teléfono</th>
              <td>  
                <div class="col-md-6">
                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ Auth::user()->telefono }}" required autocomplete="telefono">

                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Número de documento</th>
              <td>
                <div class="col-md-6">
                    <input id="num_doc" type="text" class="form-control @error('num_doc') is-invalid @enderror" value=" {{ Auth::user()->num_doc }} " name="num_doc" required autocomplete="num_doc">

                    @error('num_doc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Tipo de Documento</th>
              <td> 
                <div class="col-md-6">
                    <select id="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror" name="tipo_doc">
                        <option value="{{ Auth::user()->tipo_doc }}" selected>{{ Auth::user()->tipo_doc }}</option>
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
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Correo Institucional</th>
              <td> 
                <div class="col-md-6">
                    <input id="correo_inst" type="email" class="form-control @error('correo_inst') is-invalid @enderror" name="correo_inst" value="{{ Auth::user()->correo_inst }}" required autocomplete="correo_inst">

                    @error('correo_inst')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Correo Alterno</th>
              <td>
                <div class="col-md-6">
                    <input id="correo_alt" type="email" class="form-control @error('correo_alt') is-invalid @enderror" name="correo_alt" value=" {{ Auth::user()->correo_alt }} " required autocomplete="correo_alt">

                    @error('correo_alt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Regional</th>
              <td>  
                <div class="col-md-6">
                    <select id="regional" class="form-control @error('regional') is-invalid @enderror" name="regional">
                        <option value="{{ Auth::user()->regional }}" selected>{{ Auth::user()->regional }}</option>
                        <option value="Boyacá">Boyacá</option>
                        <option value="Cundinamarca">Cundinamarca</option>
                        <option value="Distrito Capital">Distrito Capital</option>
                        <option value="Huila">Huila</option>
                        <option value="Norte de Santander">Norte de Santander</option>
                        <option value="Santander">Santander</option>
                        <option value="Tolima">Tolima</option>
                    </select>                

                    @error('regional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Fecha de nacimiento</th>
              <td>  
                <div class="col-md-6">
                    <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ Auth::user()->fecha_nac }}" required autocomplete="fecha_nac">

                    @error('fecha_nac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </td>
            </tr>
        
            <tr>
              <th scope="row">Centro de formación</th>
              <td>
                <div class="col-md-6">
                    <input id="centro_form" type="text" class="form-control @error('centro_form') is-invalid @enderror" name="centro_form" value="{{ Auth::user()->centro_form }} " required autocomplete="centro_form">

                    @error('centro_form')
                        <span class="invalid-feedback" role="alert">
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