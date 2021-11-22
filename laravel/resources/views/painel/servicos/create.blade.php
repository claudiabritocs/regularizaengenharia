@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Serviços /</small> Adicionar Mais Serviços</h2>
    </legend>

    {!! Form::open(['route' => 'painel.servicos.store', 'files' => true]) !!}

        @include('painel.servicos.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
