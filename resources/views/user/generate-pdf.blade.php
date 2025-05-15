<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/user/generate-pdf.scss'])
    <title>Usuários</title>

    <style>
        body {
            padding: 1rem;
            margin: 0;
            font-family: "Arial";
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        body > h1, body > h2 {
            text-align: center;
        }

        body > h2 {
            margin: 1rem 0;
        }

        body > p {
            margin: 3rem;
            font-size: 1rem;
            text-align: center;
        }

        .data {
            margin-top: 4rem;
        }

        .data > p {
            text-align: start;
            margin: 0.25rem 0;
            font-size: 1rem;
            font-weight: 500;
        }

        .data > p > span {
            font-weight: 400;
        }

        table {
            width: 100%;
            border: 1px solid rgb(0, 0, 0);
        }

        table > thead {
            background-color: rgb(71, 123, 255);
        }

        table > thead > th {
            border: 1px solid rgb(0, 0, 0);
            padding: 0.5rem;
        }

        table > tbody {
            background-color: rgb(230, 230, 230);
        }

        table > tbody > td {
            border: 1px solid rgb(0, 0, 0);
            padding: 1rem;
        }
    </style>
</head>

<body>
    <h1>Plantamática</h1>

    <h2>Lista de usuários cadastrados</h2>

    <p>Este documento representa a lista de todos os usuários cadastrados no sistema da Plantamática que estão ativos.</p>

    <div class="data">
        <p>Emitido em: 
            <span>
                {{ now()->format('Y-m-d H:i:s') }}
            </span>
        </p>
        <p>Emitido por:
            <span>
                @if (auth()->check())
                    {{ auth()->user()->name }}
                @endif
            </span>
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($users->created_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        Nenhum usuário encontrado!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>