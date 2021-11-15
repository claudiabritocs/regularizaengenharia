@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Adicionar Tag</h2>
    </legend>

    {!! Form::open(['route' => '<?=$namespace?>.<?=$route?>.tags.store']) !!}

        @include('<?=$namespace?>.<?=$route?>.tags.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
