@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Home / Imagens /</small> Adicionar Imagem</h2>
    </legend>

    {!! Form::open(['route' => 'painel.imagens.store', 'files' => true]) !!}

        @include('painel.imagens.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
