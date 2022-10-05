@extends('layouts.app')

@section('content')

    <section id="users">
        <x-headline icon="bi-person-lines-fill" title="Alterar dados de {{ $user->username }}"/>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row flex align-items-end">
                <div class="col-12 col-xl-2 mb-3">
                    <label for="username"
                           class="form-label">Login</label>
                    <input type="text"
                           class="form-control"
                           name="username"
                           id="username"
                           value="{{ $user->username }}"
                           required>
                </div>
                <div class="col-12 col-xl-2 mb-3">
                    <label for="nome"
                           class="form-label">Nome</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           value="{{ $user->name }}"
                           required>
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label for="role"
                           class="form-label">Perfil</label>
                    <select name="role[]"
                            id="role"
                            class="selectize"
                            multiple
                            required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}"
                                    @if (Str::contains($user->getRoleNames()->implode('|'), $role->name)) selected @endif>{{ Str::ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col mt-3 text-end">
                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-save"></i>
                        <span class="ps-2">Atualizar</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection