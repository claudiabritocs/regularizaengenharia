@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Principal</h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['painel.principal.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.principal.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
