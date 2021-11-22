@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Banners /</small> Adicionar Banner</h2>
    </legend>

    {!! Form::open(['route' => 'painel.banners.store', 'files' => true]) !!}

        @include('painel.banners.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
