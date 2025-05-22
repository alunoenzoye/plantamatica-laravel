@extends('layout.home')

@section('content')

<nav class="breadcrumb">
    <span class="breadcrumb-item active" aria-current="page">Painel</span>
</nav>

<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header hstack gap-2">
        <span class="user-select-none">Gerenciar</span>

        <span class="ms-auto d-sm-flex flex-row">
        </span>
    </div>

    <div class="card-body">
        <div class="d-flex col-4 text-center">
            @can('user')
            <a draggable="false" href="{{ route('user.index') }}" class="btn btn-primary btn">Usuários</a>
            @endcan
        </div>
    </div>
</div>

@endsection