<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <img
                src="{{ Vite::asset('resources/images/admin/img/AdminLTELogo.png') }}"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">Painel</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false"
            >
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" @class(['nav-link', 'active' => isset($menu) && $menu == 'dashboard'])>
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" @class(['nav-link', 'active' => isset($menu) && $menu == 'users'])>
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Usuários
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon bi bi-globe-americas"></i>
                        <p>
                            Portifólio
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
