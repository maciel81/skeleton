@extends('layouts.app')

@section('content')
    <section id="users">
        <x-headline icon="bi-person-plus-fill" title="Criar novo Usuário"/>
        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="row flex align-items-end">
                <div class="col-12 col-lg-2 my-3">
                    <label for="username" class="form-label">
                        Login
                    </label>
                    <input type="text"
                           class="form-control"
                           name="username"
                           id="username"
                           value="{{ old('username') }}"
                           required>
                </div>
                <div class="col-12 col-lg-2 my-3">
                    <label for="name" class="form-label">Nome Completo</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required>
                </div>
                <div class="col-12 col-lg-6 my-3">
                    <label for="role" class="form-label">Perfil</label>
                    <select name="role[]"
                            id="role"
                            class="selectize"
                            multiple
                            required>
                        <option value=""></option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ Str::ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col text-end my-3">
                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-save"></i>
                        <span class="ps-2">Criar</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection