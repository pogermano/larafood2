@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>
    <br>
    <h1>Permissões  <a href="{{ route('permissions.create') }}" class="btn btn-dark" ><i class="fas fa-plus-square"></i>  ADD</a></h1>


@stop

@section('content')
    <p>Listagem dos permissões.</p>
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
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
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">Ver</a>
                            <a href="{{ route('permission.profiles', $permission->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
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
