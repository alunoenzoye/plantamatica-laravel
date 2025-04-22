@extends('layout.admin')

@section('content')
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">Painel</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">Usuários</a>
        <span class="breadcrumb-item active" aria-current="page">Cadastrar</span>
    </nav>

    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span>Cadastrar Usuário</span>

            <span class="ms-auto d-sm-flex flex-row">

           </span>
        </div>

        <div class="card-body">

            <x-alert />

            <form action="{{ route('user.store') }}" method="POST" class="row g-3">
                @csrf
                @method('POST')

                <div class="col-md-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo"
                        value="{{ old('name') }}">
                </div>

                <div class="col-md-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="E-mail do usuário" value="{{ old('email')}}">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group mb3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                        <span class="input-group-text" role="button" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div> 
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Confirmar Senha</label>
                    <div class="input-group mb3">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="Confirmar senha" value="{{ old('password_confirmation') }}">
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
