@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Editar Tag</h2>
    </legend>

    {!! Form::model($tag, [
        'route'  => ['<?=$namespace?>.<?=$route?>.tags.update', $tag->id],
        'method' => 'patch'])
    !!}

    @include('<?=$namespace?>.<?=$route?>.tags.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
