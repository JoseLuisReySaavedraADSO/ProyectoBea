@if (session('success'))
    <article class="succes-alert">
        <i class='bx bx-info-circle'></i>
        {{ session('success') }}
    </article>
@endif

@if ($errors->any())
    <article class="error__validacion">
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class='bx bxs-error'></i>{{ $error }}</li>
            @endforeach
        </ul>
    </article>
@endif
