@extends('layout.admin')

@section('content')
    <a href="{{ route('user.index')}}">Página de cadastro</a>

    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome: </label>
            <input class="form-control" type="text" name="name" placeholder="Nome do usuário" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">E-Mail: </label>
            <input class="form-control" type="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha: </label>
            <input class="form-control" type="password" name="password" placeholder="Senha">
        </div>

        @if ($errors->any())

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">
                {{ $error }}
            </p>
        @endforeach

        @endif

        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
@endsection