@extends('adminlte::page')

@section('title', "Detalhe do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do Plano <b>{{ $plan->name }}</b></a></h1>
@stop

@section('content')
    <p>Listagem dos planos.</p>
    <div class="card">
        <div class="card-header">Plano </b></div>
        <div class="card-body">
<ul>
    <li>
        <strong>Nome:</strong> {{ $plan->name }}
    </li>
    <li>
        <strong>Url:</strong> {{ $plan->url }}
    </li>
    <li>
        <strong>Preço:</strong> R$ {{ number_format($plan->price,2,',','.') }}
    </li>
    <li>
        <strong>Descrição:</strong> {{ $plan->description }}
    </li>
</ul>
 <form action="{{ route('plans.delete', $plan->id) }}" method="POST">
    @csrf
    @method('DELETE')
<button typt="submit" class="btn btn-danger"><i style="border:5px;" class="fas fa-trash-alt"></i> Deletar o plano</button>
</form>

        </div>

    </div>
@stop
