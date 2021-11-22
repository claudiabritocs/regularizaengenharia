@extends('painel.common.template')

@section('content')

    <legend>
        <h2><small>Banners /</small> Editar Banner</h2>
    </legend>

    {!! Form::model($registros, [
        'route'  => ['painel.banners.update', $registros->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.banners.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
