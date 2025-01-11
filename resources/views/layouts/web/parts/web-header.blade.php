<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ Vite::asset('resources/images/logo.png') }} alt=""> -->
            <h1 class="sitename">MAV</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}#hero" class="active">Home<br></a></li>
                <li><a href="{{ route('home') }}#about">Sobre</a></li>
                <li><a href="{{ route('home') }}#portfolio">Projetos</a></li>
                <li><a href="{{ route('home') }}#contact">Contato</a></li>

                @if(Auth::check())
                    <li><a href="{{ route('dashboard.index') }}">Entrar</a></li>
                @else
                    <li><a href="{{ route('login') }}">Restrito</a></li>
                @endif

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
