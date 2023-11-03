@extends('layouts.app')

@section('content')

    <section class="container__temas second__container">


        <div class="container__cards">
            @if (isset($contenido) && $contenido->count() > 0)

            @foreach ($contenido as $item)
            <div class="card__temas">
                <div class="animal__photo">
                    <a href="">
                        <!-- <img class="temas__photo--image" src="{{ $item->imagen->path }}" alt=""> -->
                        <img class="temas__photo--image" src="https://cdn-icons-png.flaticon.com/512/2103/2103800.png" alt="">
                    </a>
                </div>
                <div class="temas__info">
                    <h2 class="temas__info--name">{{$item->teoria->titulo_teoria}}</h2>
                    <!-- <p class="animal__info--race">{{$item->teoria->desc_teoria}}</p> -->
                </div>
            </div>
            @endforeach
            @else
            <p>No se encontró información.</p>
            @endif
        </div>

    </section>


<!-- 
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (isset($contenido) && $contenido->count() > 0)
            <h2>Información</h2>
            @foreach ($contenido as $item)
            <div class="tema">
                <h3>{{ $item->teoria->titulo_teoria }}</h3>
                <p>{{ $item->teoria->desc_teoria }}</p>
                @if ($item->imagen)
                <img src="{{ $item->imagen->path }}" alt="Imagen">
                <img src="https://d100mj7v0l85u5.cloudfront.net/s3fs-public/GRA-Conozca-los-tipos-de-automatizacion-industrial.jpg" alt="Imagen">
                @endif
                <h4>{{ $item->practica->titulo_practica }}</h4>
            </div>
            @endforeach
            @else
            <p>No se encontró información.</p>
            @endif
        </div>
    </div>
</div>
 -->


@endsection