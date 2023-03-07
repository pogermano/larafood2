@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>
    <br>
    <h1>Perfis  <a href="{{ route('profiles.create') }}" class="btn btn-dark" ><i class="fas fa-plus-square"></i>  ADD</a></h1>


@stop

@section('content')
    <p>Listagem dos perfis.</p>
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
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
                        <td style="width: 10px;">{{ $profile->description }}</td>
                        <td style="width: 10px;">
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                            <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                            <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>
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
