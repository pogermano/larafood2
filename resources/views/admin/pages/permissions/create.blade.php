@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
    <h1>Cadastrar novo permissão </h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

         <form action="{{ route('permissions.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.permissions._partials.form')
         </form>
        </div>

    </div>
@stop
