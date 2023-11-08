@extends('layouts.app')

@section('content')

<ol class="lista">
    @foreach ($secciones as $seccion)
    <li>{{$seccion->titulo_seccion}}
      @if($seccion->tema->count() > 0)
      {{-- {{dd($seccion->tema);}} --}}
            <ol class="sublista">
                @foreach ($seccion->tema as $tema)
                <a href="{{ route('temas', $tema->id) }}">
                    <li>{{$tema->titulo_tema}}</li>
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