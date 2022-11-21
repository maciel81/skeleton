<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Integrado de Gestão') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @guest()
        <style>
            body {
                background-image: url('https://cdn.der.rj.gov.br/Imagens/background-estrada.jpg');
            }

            .card
        </style>
    @endguest


</head>
<body>
<div class="container d-flex flex-row justify-content-center align-items-center h-100">
    <div class="col-10 col-md-8 col-lg-4 p-2">
        <div class="shadow-lg bg-body bg-opacity-50 p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <img src="//www.cdn.der.rj.gov.br/Imagens/logo-color-der.png" class="mt-1"
                     style="height: 50px;" alt="logo-der">
                <h4 class="mt-2 ms-3">{{ config('app.name') }}</h4>
            </div>
            <div class="d-flex flex-column">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input id="username" name="username" type="text"
                               class="form-control @error('username') is-invalid @enderror"
                               placeholder="nome.usuario" value="{{ old('username') }}" required
                               autocomplete="username">
                        <label for="username">Nome de Usuário</label>
                        @error('username')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <div class="form-floating">
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="Senha">
                            <label for="password">Senha</label>
                        </div>
                        <span class="input-group-text bg-white">
                                <i class="bx bxs-lock-alt fs-5" id="togglePassword"></i>
                            </span>
                    </div>
                    <div class="col text-end">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg btn-login btn-extended" type="submit">Entrar no sistema</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
