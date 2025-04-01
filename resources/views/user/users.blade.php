@extends('layout.admin')

@section('content')
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

       <form action="{{ route('user.destroy', ['user' => $dbuser->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Você tem certeza que quer apagar o usuário {{ $dbuser->name }}?');">Apagar</button>
       </form>
       <hr>
    @empty
        
    @endforelse
@endsection