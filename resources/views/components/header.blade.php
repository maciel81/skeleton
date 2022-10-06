<section id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark stick mb-3">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand"
               href="{{ route('home') }}">
                <img src="//www.cdn.der.rj.gov.br/Imagens/logo-negativo-der.png"
                     style="height: 100%; width: 50px;"
                     alt="DER-RJ"
                     class="me-2">
                {{ config('app.name') }}
            </a>
            <span class="navbar-brand"></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                 aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{ config('app.name') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-6">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"
                               href="{{ route('home') }}">Home</a>
                        </li>
                        @hasanyrole('admin|super-admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ (request()->is('admin*')) ? 'active' : '' }}"
                               href="#"
                               id="navbarAdmin"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">Administração</a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('admin.users.index') }}">Usuários</a>
                                </li>
                                {{--                            <li>--}}
                                {{--                                <hr class="dropdown-divider">--}}
                                {{--                            </li>--}}
                            </ul>
                        </li>
                        @endhasanyrole
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="navbarPerfil"
                               role="button"
                               data-bs-toggle="dropdown">
                                <i class="bi bi-person-badge"></i>
                                {{ auth()->user()->username }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                                aria-labelledby="navbarPerfil">
                                <li>
                                    <a class="dropdown-item disabled">
                                        {{ auth()->user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('user.change-password-form') }}">
                                        Trocar Senha
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>