@extends('layouts.app')

@section('content')
    <section id="users">
        <x-headline icon="bi-person-fill" title="Alterar senha de {{ Auth::user()->username }}"/>
        <form method="POST" action="{{ route('user.change-own-password') }}">
            @csrf
            @method('PUT')
            <div class="d-flex gap-3 flex-column flex-lg-row align-items-start px-4 px-sm-0 fs-5">
                <div class="col-12 col-lg-3 my-3">
                    <label for="password">Nova Senha</label>
                    <div class="input-group">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password"
                               required
                               autocomplete="current-password">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-eye-slash-fill fs-5" id="togglePassword"></i>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-lg-3 my-3">
                    <label for="password_confirmation">Confirme a nova Senha</label>
                    <div class="input-group">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password_confirmation"
                               name="password_confirmation"
                               required>
                        <span class="input-group-text bg-white">
                            <i class="bi bi-eye-slash-fill fs-5" id="togglePasswordConfirmation"></i>
                        </span>
                    </div>
                </div>
                <div class="col mt-lg-5 text-end">
                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-save"></i>
                        <span class="ps-2">Alterar</span>
                    </button>
                </div>

            </div>
            <div class="row">
                <div class="col mt-3">
                    <p class="text-danger fs-6">
                        <strong>A senha precisa atender aos requisitos:</strong>
                        <em>Mínimo de 6 caracteres | Pelo menos uma letra | Pelo menos um número | Pode ou não conter
                            caracteres
                            especiais. ex.: $ ! # @ % * /
                        </em>
                    </p>
                </div>
            </div>
        </form>

    </section>
@endsection