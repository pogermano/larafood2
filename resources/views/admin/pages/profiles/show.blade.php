@extends('adminlte::page')

@section('title', "Detalhe do profile {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $profile->name }}</b></a></h1>
@stop

@section('content')
    <p>Detalhes do perfil.</p>
    <div class="card">
      
        <div class="card-body">
<ul>
    <li>
        <strong>Nome:</strong> {{ $profile->name }}
    </li>
    <li>
        <strong>Descrição:</strong> {{ $profile->description }}
    </li>
</ul>
@include('admin.includes.alerts')
 <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
    @csrf
    @method('DELETE')
<button typt="submit" class="btn btn-danger"><i style="border:5px;" class="fas fa-trash-alt"></i> Deletar o perfil</button>
</form>

        </div>

    </div>
@stop
