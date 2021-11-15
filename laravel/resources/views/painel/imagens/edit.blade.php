@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Home / Imagens /</small> Editar Imagem</h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['painel.imagens.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.imagens.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
