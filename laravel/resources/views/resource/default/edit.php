@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Editar <?=$gen->unitName?></h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['<?=$namespace?>.<?=$route?>.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('<?=$namespace?>.<?=$route?>.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
