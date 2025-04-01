@extends('layout.admin')

@section('content')
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">Painel</a>
        <span class="breadcrumb-item active" aria-current="page">Usuários</span>
    </nav>
    

    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span class="user-select-none">Listar Usuários</span>

            <span class="ms-auto">
                <a draggable="false" href="{{ route('user.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
            </span>
        </div>

        <div class="card-body">

            <x-alert />

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="user-select-none">ID</th>
                        <th scope="col" class="user-select-none">Nome</th>
                        <th scope="col" class="user-select-none">E-mail</th>
                        <th scope="col" class="text-center user-select-none">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center user-select-none">
                                <a href="{{ route('user.show', ['user' => $user->id]) }}"
                                    class="btn btn-primary btn-sm" draggable="false">Visualizar</a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                    class="btn btn-warning btn-sm" draggable="false">Editar</a>
                                <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
