<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/index/index.css') }}">
    <title>Plantamática</title>
</head>
<body>
    <a href="{{ route('user.index') }}">Página de usuários (TESTE)</a>
    <header>
        <i>
        </i>
        <nav>
            <ul>
                <a href="{{ route('user.create') }}">
                    Cadastrar
                </a>
            </ul>
        </nav>
    </header>
    <main>
        <header>
            <h1>Bem Vindo!</h1>
            <img src="" alt="">
        </header>
        
    </main>
</body>
</html>