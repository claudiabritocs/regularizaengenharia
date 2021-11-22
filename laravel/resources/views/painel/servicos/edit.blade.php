@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Serviços</h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['painel.servicos.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.servicos.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
