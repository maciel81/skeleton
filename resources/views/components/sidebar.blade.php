<nav id="sidebar" class="sidebar @if(Cookie::get('sidebar') === 'close') close @endif">
    <header>
        <div class="text header-text">
            <span class="title">MENU</span>
        </div>
        <i class="bx bx-chevron-right toggle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links list-unstyled">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-dashboard icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                @hasanyrole('admin|super-admin')
                <li class="nav-item dropend">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bx bx-brightness icon"></i>
                        <span class="text nav-text">Administração</span>
                        <span class="dropdown-toggle dropdown-icon"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Usuários</a></li>
                    </ul>
                </li>
                @endhasanyrole
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link">
                <a class="dropdown-item ms-n2"
                   href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bx bx-run icon"></i>
                    <span class="text nav-text">Sair</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>

            <li class="nav-link mode">
                <div class="toggle-switch">
                    <i class="bx bx-toggle-right" id="switch"></i>
                </div>
                <span class="mode-text text">
                    Dark
                </span>
                <div class="moon-sun">
                    <i class="bx bx-moon icon moon"></i>
                    <i class="bx bx-sun icon sun"></i>
                </div>
            </li>
        </div>
    </div>
</nav>