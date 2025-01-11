<nav class="app-header navbar navbar-expand bg-body">

    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    @if(Auth::check())
                        @if(auth()->user()->image)
                            <img
                                src="{{ asset('storage/' . auth()->user()->image)}}"
                                class="user-image rounded-circle shadow"
                                alt="User Image"
                            />
                        @else
                            <img
                                src="{{ Vite::asset('resources/images/admin/img/user2-160x160.jpg') }}"
                                class="user-image rounded-circle shadow"
                                alt="User Image"
                            />
                        @endif
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <li class="user-header text-bg-primary">
                        @if(Auth::check())
                            @if(auth()->user()->image)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->image)}}"
                                    class="rounded-circle shadow"
                                    alt="User Image"
                                />
                            @else
                                <img
                                    src="{{ Vite::asset('resources/images/admin/img/user2-160x160.jpg') }}"
                                    class="rounded-circle shadow"
                                    alt="User Image"
                                />
                            @endif
                            <p>
                                {{ auth()->user()->name }}
                                <small>Membro
                                    desde {{ \Carbon\Carbon::parse(auth()->user()->create_at)->translatedFormat('F/Y') }}</small>
                            </p>
                        @endif
                    </li>

                    <li class="user-body ">

                        <div class="row">
                            <div class="col-6"><a href="#" class="btn btn-default btn-sm">Perfil</a></div>
                            <div class="col-6 text-end">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-sm">Sair</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
