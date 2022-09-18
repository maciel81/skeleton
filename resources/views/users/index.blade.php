@extends('layouts.app')

@section('content')
    <section id="users">
        <x-headline icon="bi-people-fill" title="Lista de Usuários" btn-text="Novo Usuário" btn-route="users.create"/>
            <table class="table table">
                <thead>
                <tr>
                    <th width="250px" class="fs-4">Login</th>
                    <th width="400px" class="fs-4">Nome</th>
                    <th width="120px" class="fs-4">Perfil</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle fs-5">{{ $user->username }}</td>
                        <td class="align-middle fs-5">{{ $user->name }}</td>
                        <td class="align-middle fs-5">{{ Str::ucfirst($user->getRoleNames()->first()) }}</td>
                        <td class="align-middle text-end">
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-outline-warning text-dark px-3" href="{{ route('users.edit', $user) }}"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Usuário"><i
                                            class="bi bi-pencil-fill"></i>
                                    <span class="ps-1">Editar Dados</span>
                                </a>
                                <a class="btn btn-sm btn-outline-danger text-dark px-3" href="#"
                                   onclick="event.preventDefault(); document.getElementById('changePassword{{ $user->id }}').submit();"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Resetar Senha do Usuário">
                                    <i class="bi bi-exclamation-diamond"></i>
                                    <span class="ps-1">Resetar Senha</span>
                                </a>
                                <form id="changePassword{{ $user->id }}" action="{{ route('users.change-user-password', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                                @if ($user->isActive())
                                    <a class="btn btn-sm btn-outline-success px-3" href="{{ route('users.active', $user->id) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Desabilitar Usuário"><i
                                                class="bi bi-toggle-on"></i></a>
                                @else
                                    <a class="btn btn-sm btn-outline-secondary px-3" href="{{ route('users.active', $user->id) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Habilitar Usuário"><i
                                                class="fbi bi-toggle-off"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row text-end">
                {{ $users->links() }}
            </div>
    </section>
@endsection