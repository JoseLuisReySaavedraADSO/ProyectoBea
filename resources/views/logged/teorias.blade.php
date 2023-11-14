@extends('layouts.app')

@section('content')

<h1>{{ $teoria->teoria->titulo_teoria }}</h1>

<img src="{{ asset('storage/' . $teoria->imagen->path) }}" alt="">

<p>
  {{ $teoria->teoria->desc_teoria }}
</p>

@endsection