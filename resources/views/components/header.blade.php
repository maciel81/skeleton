<section id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-blue p-0 sticky-top mb-5">
        <div class="container-fluid">
            <a class="navbar-brand"
               href="{{ route('home') }}">
                <img src="//www.cdn.der.rj.gov.br/Imagens/logo-negativo-der.png"
                     style="height: 100%; width: 60px;"
                     alt="DER-RJ"
                     class="mt-1">
                <img src="//www.cdn.der.rj.gov.br/Imagens/logo-negativo-secretaria.png"
                     style="height: 100%; width: 250px"
                     alt="SECID"
                     class="mb-1">
            </a>
            <div class="w-100 text-center my-3">
                <span class="navbar-brand">{{ config('app.name') }}</span>
            </div>
            <button class="navbar-toggler mb-3"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent"
                    aria-controls="navbarContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse my-3"
                 id="navbarContent">
                <ul class="navbar-nav w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarAdmin"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">Administração</a>
                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarAdmin">
                            @hasanyrole('admin|super-admin')
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('users.index') }}">Usuários</a>
                            </li>
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
                            @endhasanyrole

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarPerfil"
                           role="button"
                           data-bs-toggle="dropdown">
                            <i class="fas fa-sm fa-user"></i>
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"
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
                                   href="{{ route('users.change-password-form') }}">
                                    Trocar Senha
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>