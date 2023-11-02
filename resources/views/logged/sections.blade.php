@extends('layouts.app')

@section('content')

<ol class="lista">
    @foreach ($secciones as $tema)
    <li>{{$tema->titulo_tema}}
        @if($tema->secciones->count() > 0)
            <ol class="sublista">
                @foreach ($tema->secciones as $seccion)
                <a href="{{ route('temas', $seccion->id) }}">
                    <li>{{$seccion->titulo_seccion}}</li>
                </a>
                @endforeach
            </ol>
        @endif
    </li>
    @endforeach
</ol>

<script>
    document.querySelectorAll('.lista li').forEach(function (item) {
        item.addEventListener('click', function () {
            item.classList.toggle('sublista-activa');
        });
    });
</script>
@endsection