@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Projetos /</small> Adicionar Projeto</h2>
    </legend>

    {!! Form::open(['route' => 'painel.projetos.store', 'files' => true]) !!}

        @include('painel.projetos.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
