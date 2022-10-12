<nav id="header">
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand"
               href="{{ route('home') }}">
                <img
                        @if(Cookie::get('theme') === 'dark')
                            src="{{ Vite::asset('resources/images/logo-color-der.png') }}"
                        @else
                            src="{{ Vite::asset('resources/images/logo-negative-der.png') }}"
                        @endif
                        alt="DER-RJ"
                        id="nav-brand"
                        class="me-2"
                        style="">
                <span class="text d-none d-lg-inline ms-3">{{ config('app.name') }}</span>
                <span class="text d-inline d-lg-none ms-3">{{ config('app.sigla') }}</span>
            </a>
            <ul class="navbar-nav text-end">
                <li class="nav-item">
                    <a href="{{ route('user.change-own-password') }}"
                       class="nav-link d-flex align-items-center">
                        <i class="bx bx-user-pin fs-2 pe-2"></i>
                        {{ auth()->user()->username }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</nav>