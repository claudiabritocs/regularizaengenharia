@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Certificados /</small> Adicionar certificados</h2>
    </legend>

    {!! Form::open(['route' => 'painel.certificados.store', 'files' => true]) !!}

        @include('painel.certificados.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
