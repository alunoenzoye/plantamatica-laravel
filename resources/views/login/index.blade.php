@extends('layout.auth')

@section('content')
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('login.auth') }}" method="POST">
            @method('POST')
            @csrf
            <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <x-alert />

            <div class="fields">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="">
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="d-flex">
                    <div class="form-floating flex-grow-1">
                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                        <label for="floatingPassword">Senha</label>
                    </div>
                    <span class="input-group-text" role="button" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            <a href="{{ route('login.register') }}" class="text-decoration-none">Cadastrar</a>
        </form>
    </main>
@endsection
