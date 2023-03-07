@extends('adminlte::page')

@section('title', "Detalhe da permissão {$permission->name}")

@section('content_header')
    <h1>Detalhes da permissão <b>{{ $permission->name }}</b></a></h1>
@stop

@section('content')
    <p>Detalhes da permissão.</p>
    <div class="card">

        <div class="card-body">
<ul>
    <li>
        <strong>Nome:</strong> {{ $permission->name }}
    </li>
    <li>
        <strong>Descrição:</strong> {{ $permission->description }}
    </li>
</ul>
@include('admin.includes.alerts')
 <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
    @csrf
    @method('DELETE')
<button typt="submit" class="btn btn-danger"><i style="border:5px;" class="fas fa-trash-alt"></i> Deletar a permissão</button>
</form>

        </div>

    </div>
@stop
