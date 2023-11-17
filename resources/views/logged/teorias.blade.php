@extends('layouts.app')

@section('content')

<body class="body__teoria">

  <h1 class="titulo__teoria">{{ $teoria->teoria->titulo_teoria }}</h1>

  <div class="contenido__teoria">

    <div class="imagen__teoria">
      <img src="{{ asset('storage/' . $teoria->imagen->path) }}" alt="">

      <p>
        {{ $teoria->teoria->desc_teoria }}
      </p>
    </div>

    <div class="pdf__teoria">
      <div class="embed-container">
        <embed src="{{ asset('storage/' . $teoria->practica->pdf_path) }}" type="application/pdf" width="100%" height="660px">
      </div>
    </div>


  </div>

</body>
@endsection