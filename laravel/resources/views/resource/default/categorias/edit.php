@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Editar Categoria</h2>
    </legend>

    {!! Form::model($categoria, [
        'route'  => ['<?=$namespace?>.<?=$route?>.categorias.update', $categoria->id],
        'method' => 'patch'])
    !!}

    @include('<?=$namespace?>.<?=$route?>.categorias.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
