@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$details->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.show', [$plan->url, $details->id]) }}" class="active">Detalhes</a></li>
    </ol>

    <h1>Detalhes do detalhe {{ $details->name }}</h1>
@stop


@section('content')
    <p>Listagem dos planos.</p>
    <div class="card">
        <div class="card-header">Plano </b></div>
        <div class="card-body">
<ul>
    <li>
        <strong>Nome:</strong> {{ $details->name }}
    </li>
</ul>
 <form action="{{ route('details.plan.destroy', [$plan->url,  $details->id]) }}" method="POST">
    @csrf
    @method('DELETE')
<button typt="submit" class="btn btn-danger"><i style="border:5px;" class="fas fa-trash-alt"></i> Deletar o detalhe</button>
</form>

        </div>

    </div>
@stop
