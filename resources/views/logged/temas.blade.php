@extends('layouts.app')

@section('content')


<section class="container__temas second__container">

  <h1>{{ $temas->titulo_tema }}</h1>
  <div class="container__cards">
    @if (isset($contenido) && $contenido->count() > 0)
    @foreach ($contenido as $item)
    <a href=" {{route('teorias', $item->id)}} ">

      <div class="card__temas">
        <div>
          <img class="temas__photo--image" src="{{ asset('storage/' . $item->imagen->path) }}" alt="">
        </div>
        <div class="temas__info">
          <h2 class="temas__info--name">{{ $item->teoria->titulo_teoria }}</h2>
        </div>
      </div>

    </a>
    @endforeach
    @else
    <p>No se encontró información.</p>
    @endif
  </div>

</section>

@endsection