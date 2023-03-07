@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>
    <br>
    <h1>Permissões do Perfil  {{  $profile->name }} <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark" ><i class="fas fa-plus-square"></i>  ADD Nova Permissão</a></h1>


@stop

@section('content')
    <p>Listagem dos permissões.</p>
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <form action="{{ route('profiles.permissions.available', $profile->id) }}" method="post" class="form form-inline">
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
                    @foreach ($permissions as $permission)
                    <tr>
                        <td style="width: 10px;">{{ $permission->name }}</td>
                        <td style="width: 10px;">{{ $permission->description }}</a></td>
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
            {!! $permissions->appends($filters)->links('pagination::bootstrap-4') !!}
            @else
            {!! $permissions->links('pagination::bootstrap-4') !!}
            @endif
        </div>
    </div>
@stop
