@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Adicionar Usuário</h2>
    </legend>

    {!! Form::open(['route' => 'painel.usuarios.store']) !!}

        @include('painel.usuarios.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
