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
                <a href="{{ route('user.generate-pdf') }}" class="btn btn-warning btn-sm">Gerar PDF</a>
                <a draggable="false" href="{{ route('user.create') }}" class="btn btn-success btn-sm"><i></i>Cadastrar</a>
            </span>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header">
                <span>Pesquisar</span>
            </div>

            <div class="card-body">
                <form action="{{ route('user.index') }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ request('name') }}" placeholder="Nome do usuário">
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" email="email" class="form-control" id="email"
                                value="{{ request('email') }}" placeholder="Nome do usuário">
                        </div>

                        <div class="col-md-4 col-sm-12 mt-4 pt-3">
                            <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                            <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                            <a href="{{ url('generate-pdf-user?') . request()->getQueryString() }}" class="btn btn-danger btn-sm">
                                <i class="fa-regular fa-file-pdf"></i>Gerar PDF
                            </a>
                        </div>
                    </div>
                </form>
            </div>
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
                                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm"
                                    draggable="false">Visualizar</a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm"
                                    draggable="false">Editar</a>
                                <form id="delete-form-{{ $user->id }}" method="POST"
                                    action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $user->id }})">Apagar</button>
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
