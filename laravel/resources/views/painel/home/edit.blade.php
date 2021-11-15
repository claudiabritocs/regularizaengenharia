@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Home</h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['painel.home.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.home.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
