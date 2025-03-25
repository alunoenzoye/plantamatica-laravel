<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('user.index')}}">Início</a>
    
    <h2>Lista de usuários cadastrados</h2>
    @if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
    @endif

    @forelse ($user as $dbuser)
       ID: {{ $dbuser->id}}<br>
       Nome: {{ $dbuser->name}}<br>
       Email: {{ $dbuser->email}}<br>
       <a href="{{ route('user.show', ['user' => $dbuser->id]) }}">Visualizar usuário</a>
       <a href="{{ route('user.edit', ['user' => $dbuser->id]) }}">Editar usuário</a>

       <hr>
    @empty
        
    @endforelse
</body>
</html>