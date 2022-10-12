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
    @guest()
    <style>
        body {
            background-image: url('https://cdn.der.rj.gov.br/Imagens/background-estrada.jpg');
        }
    </style>
    @endguest


</head>
<body>
<box
@auth
    <x-header/>
@endauth

<section id="content">
    <div class="container">
        @auth
            <x-alert/>
        @endauth

        @yield('content')
    </div>
</section>
</body>
</html>
