@extends('layout.admin')

@section('content')
    @if (session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('user.create')}}">Página de cadastro</a>
    <a href="{{ route('user.users')}}">Lista de usuários</a>
@endsection