<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
</head>

<body>
    <a href="{{ route('user.index')}}">Página de cadastro</a>

    @if ($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: red">
            {{ $error }}
        </p>
    @endforeach

    @endif

    <form action="{{ route('user-store')}}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome do usuário" value="{{ old('name') }}">

        <label>E-Mail: </label>
        <input type="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">

        <label>Senha: </label>
        <input type="password" name="password" placeholder="Senha">

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>