@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Informações de Contato</h2>
    </legend>

    {!! Form::model($contato, [
        'route'  => ['painel.contato.update', $contato->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.contato.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
