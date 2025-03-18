<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>ID: {{ $user->id }}</p>
    <p>Nome: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Data de criação: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</p>
    <p>Data de atualização: {{ \Carbon\Carbon::parse($user->update_at)->format('d/m/Y H:i:s') }}</p>
</body>
</html>