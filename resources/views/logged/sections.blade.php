@extends('layouts.app')

@section('content')

@foreach ($secciones as $seccione)
    <div>
        <div>
            <h2>{{$seccione->titulo_seccion}}</h2>
        </div>

    </div>
</div>
@endforeach

@endsection