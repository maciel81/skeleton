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
                background-image: url('//cdn.der.rj.gov.br/Imagens/background-estrada.jpg');
                min-height: 85vh !important;
            }
      </style>
    @endguest


</head>
<body @if(Cookie::get('theme') === 'dark') class="dark" @endif>
@auth
    <x-header/>
    <x-sidebar/>
@endauth
<section class="content">
    <div class="container-fluid">
    Dashboard
    @auth
        <x-alert/>
    @endauth

    @yield('content')
    </div>
</section>
</body>
</html>
