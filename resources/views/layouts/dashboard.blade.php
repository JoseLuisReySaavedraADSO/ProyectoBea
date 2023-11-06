<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bea') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

    <header class="page-header">
        <nav>
            <a href="#0" aria-label="forecastr logo" class="logo">
                <img class="logo loginContainer__logo--img" src="{{ asset('/img/boceto logo 2.png') }}" alt="Logo Bea">
            </a>
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
                <i class='bx bx-chevron-down'></i>
            </button>
            <ul class="admin-menu">
                <li class="menu-heading">
                    <h3>Admin</h3>
                </li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class='bx bxs-home'></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li @if(isset($currentRoute) && $currentRoute==='dashboard.roles' )
                    class="selected" @endif>
                    <a href="{{ route('view', ['view' => 'dashboard.users.view']) }}">
                        <i class='bx bxs-key'></i>
                        <span> Usuarios </span>
                    </a>
                </li>
                
                <li @if(isset($currentRoute) && in_array($currentRoute, ['dashboard.secciones', 'dashboard.secciones.edit'])) class="selected" @endif>
                    <a href="{{ route('dashboard.secciones') }}">
                        <i class='bx bxs-objects-horizontal-left'></i>
                        <span>Secciones</span>
                    </a>
                </li>
                <li @if(isset($currentRoute) && $currentRoute==='dashboard.temas' ) class="selected" @endif>
                    <a href="{{ route('dashboard.temas') }}">
                        <i class='bx bxs-edit-alt'></i>
                        <span>Temas</span>
                    </a>
                </li>
                <li @if(isset($currentRoute) && $currentRoute==='dashboard.teorias' ) class="selected" @endif>
                    <a href="{{ route('dashboard.teorias') }}">
                        <i class='bx bxs-message-dots'></i>
                        <span>Teorias</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-power-off'></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <div class="switch">
                    <input type="checkbox" id="mode" checked>
                    <label for="mode">
                    </label>
                </div>
                <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                </button>
            </ul>
        </nav>

    </header>
    <section class="page-content">
        
        @yield('content')

    </section>


    <script>
        const html = document.documentElement;
        const body = document.body;
        const menuLinks = document.querySelectorAll(".admin-menu a");
        const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
        const toggleMobileMenu = document.querySelector(".toggle-mob-menu");
        const switchInput = document.querySelector(".switch input");
        const switchLabel = document.querySelector(".switch label");
        const switchLabelText = switchLabel.querySelector("span:last-child");
        const collapsedClass = "collapsed";
        const lightModeClass = "light-mode";

        /*TOGGLE HEADER STATE*/
        collapseBtn.addEventListener("click", function() {
            body.classList.toggle(collapsedClass);
            this.getAttribute("aria-expanded") == "true" ?
                this.setAttribute("aria-expanded", "false") :
                this.setAttribute("aria-expanded", "true");
            this.getAttribute("aria-label") == "collapse menu" ?
                this.setAttribute("aria-label", "expand menu") :
                this.setAttribute("aria-label", "collapse menu");
        });

        /*TOGGLE MOBILE MENU*/
        toggleMobileMenu.addEventListener("click", function() {
            body.classList.toggle("mob-menu-opened");
            this.getAttribute("aria-expanded") == "true" ?
                this.setAttribute("aria-expanded", "false") :
                this.setAttribute("aria-expanded", "true");
            this.getAttribute("aria-label") == "open menu" ?
                this.setAttribute("aria-label", "close menu") :
                this.setAttribute("aria-label", "open menu");
        });
    </script>
</body>

</html>