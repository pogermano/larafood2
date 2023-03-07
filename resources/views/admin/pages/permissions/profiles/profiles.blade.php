@extends('adminlte::page')

@section('title', "Perfis da Permissão  {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>
    <br>
    <h1>Perfis da Permissão  <b> {{  $permission->name }}</b> </h1>


@stop

@section('content')
    <p>Listagem dos perfis.</p>
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <form action="{{ route('profiles.permissions.available', $permission->id) }}" method="post" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" value="{{ $filters['filter']?? '' }}" class="form-control">
                    <button type="submit" class="btn btn-dark">Filtrar</button>
                </form>

            </div>

        </div>
        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th style="width: 10px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <td style="width: 10px;">{{ $profile->name }}</td>
                        <td style="width: 10px;">{{ $profile->description }}</a></td>
                        <td style="width: 10px;">
                            <a href="{{ route('profiles.permission.detach',[$profile->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card">

            @if (isset($filters))
            {!! $profiles->appends($filters)->links('pagination::bootstrap-4') !!}
            @else
            {!! $profiles->links('pagination::bootstrap-4') !!}
            @endif
        </div>
    </div>
@stop
