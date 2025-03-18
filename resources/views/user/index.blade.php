<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('user.create')}}">Página de cadastro</a>
    <a href="{{ route('user.users')}}">Lista de usuários</a>
</body>
</html>