@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
    <br>
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark" ><i class="fas fa-plus-square"></i>  ADD</a></h1>


@stop

@section('content')
    <p>Listagem dos planos.</p>
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" value="{{ $filters['filter']?? '' }}" class="form-control">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>

        </div>
        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width: 200px;">Nome</th>
                        <th style="width: 10px;">Preço</th>
                        <th style="width: 50px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>R$ {{ number_format($plan->price,2,',','.') }}</td>
                        <td style="width: 50px;"><a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a> <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Edit</a> <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card">
            @if (isset($filters))
            {!! $plans->appends($filters)->links('pagination::bootstrap-4') !!}
            @else
            {!! $plans->links('pagination::bootstrap-4') !!}
            @endif

        </div>
    </div>
@stop
