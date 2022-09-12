@extends('layouts.app')

@section('content')
    <div id="login" class="px-4 py-5 my-5 text-center">
        <div class="col-sm-12 col-md-5 mx-auto">
            <div class="card border-0 shadow rounded-5 my-3">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center">
                        <img src="//www.cdn.der.rj.gov.br/Imagens/logo-color-der.png" class="mt-1"
                             style="height: 50px;" alt="logo-der">
                        <img src="//www.cdn.der.rj.gov.br/Imagens/logo-color-secretaria.png" style="width: 300px;"
                             alt="logo-secretaria">
                        <h4 class="mt-4 mb-5 pb-1">{{ config('app.name') }}</h4>
                    </div>

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
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required autocomplete="current-password"
                                   placeholder="Senha">
                            <label for="password">Senha</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg btn-login" type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
