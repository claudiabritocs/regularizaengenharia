@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Adicionar <?=$gen->unitName?></h2>
    </legend>

    {!! Form::open(['route' => '<?=$namespace?>.<?=$route?>.store', 'files' => true]) !!}

        @include('<?=$namespace?>.<?=$route?>.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
