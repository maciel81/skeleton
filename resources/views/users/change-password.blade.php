@extends('layouts.app')

@section('content')
    <section id="users">
        <x-headline icon="bi-person-fill" title="Alterar senha de {{ Auth::user()->username }}"/>
        <form method="POST" action="{{ route('users.change-own-password') }}">
            @csrf
            @method('PUT')
            <div class="row mb-3 align-items-center fs-5">
                <div class="col-12 col-xl-2 mt-3">
                    <label for="password"
                           class="form-label">Senha</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           id="password"
                           required>
                </div>
                <div class="col-12 col-xl-2 mt-3">
                    <label for="password_confirmation"
                           class="form-label">Confirmação de Senha</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           id="password_confirm"
                           required>
                </div>
                <div class="col mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-save"></i>
                        <span class="ps-2">Alterar</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            <p class="text-danger">
                <strong>A senha precisa atender aos requisitos:</strong>
                <em>Mínimo de 6 caracteres | Pelo menos uma letra | Pelo menos um número | Pode ou não conter caracteres especiais ( ex.: $ ! # @ % * / )
                </em>
            </p>
        </div>
    </section>
@endsection