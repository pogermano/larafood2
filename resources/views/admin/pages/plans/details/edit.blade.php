@extends('adminlte::page')

@section('title', "Atualizar Detalhe  - {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.show',$plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item "><a href="{{ route('details.plan.index',$plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit',[$plan->url, $detail->id]) }}">Atualizar</a></li>
    </ol>
    <br>
    <h1>Atualizar Detalhe - {{ $detail->name }}</h1>


@stop

@section('content')
    <p>Detalhes do plano.</p>
    <div class="card">

        <div class="card-body">
            <form action="{{ route('details.plan.update',[$plan->url, $detail->id]) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans.details._partials.form')
             </form>
        </div>
    </div>
@endsection
