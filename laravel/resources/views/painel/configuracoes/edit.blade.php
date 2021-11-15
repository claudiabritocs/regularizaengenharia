@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Configurações</h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['painel.configuracoes.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.configuracoes.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
