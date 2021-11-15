@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Editar Usuário</h2>
    </legend>

    {!! Form::model($usuario, [
        'route' => ['painel.usuarios.update', $usuario->id],
        'method' => 'patch'])
    !!}

    @include('painel.usuarios.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
