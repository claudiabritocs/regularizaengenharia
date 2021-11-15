@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><?=$gen->resourceName?></h2>
    </legend>

    {!! Form::model($registro, [
        'route'  => ['<?=$namespace?>.<?=$route?>.update', $registro->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('<?=$namespace?>.<?=$route?>.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
