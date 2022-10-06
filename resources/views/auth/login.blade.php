@extends('layouts.app')

@section('content')
    <div id="login" class="d-flex justify-content-center align-items-center mt-5 mt-sm-2">
        <div class="col-12 col-md-10 col-lg-4 p-2">
            <div class="shadow-lg bg-body p-4 rounded-4">
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
                                <i class="bi bi-eye-slash-fill fs-5" id="togglePassword"></i>
                            </span>
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-primary btn-lg btn-login" type="submit">Fazer login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
