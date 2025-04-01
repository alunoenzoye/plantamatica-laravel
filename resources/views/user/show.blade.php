@extends('layout.admin')

@section('content')
    <a href="{{ route('user.users') }}">Voltar</a>

    <p>ID: {{ $user->id }}</p>
    <p>Nome: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Data de criação: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</p>
    <p>Data de atualização: {{ \Carbon\Carbon::parse($user->update_at)->format('d/m/Y H:i:s') }}</p>
@endsection