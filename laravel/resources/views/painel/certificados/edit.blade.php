@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Certificados /</small> Editar Certificados</h2>
    </legend>

    {!! Form::model($certificados, [
        'route'  => ['painel.certificados.update', $certificados->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.certificados.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
