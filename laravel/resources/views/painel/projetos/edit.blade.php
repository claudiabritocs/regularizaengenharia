@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Projetos /</small> Editar Projeto</h2>
    </legend>

    {!! Form::model($projeto, [
        'route'  => ['painel.projetos.update', $projeto->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.projetos.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
