@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>FAQ /</small> Adicionar Perguntas Frequentes</h2>
    </legend>

    {!! Form::open(['route' => 'painel.faq.store', 'files' => true]) !!}

        @include('painel.faq.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
