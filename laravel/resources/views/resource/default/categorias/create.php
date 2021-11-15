@extends('<?=$namespace?>.common.template')

@section('content')

    <legend>
        <h2><small><?=$gen->resourceName?> /</small> Adicionar Categoria</h2>
    </legend>

    {!! Form::open(['route' => '<?=$namespace?>.<?=$route?>.categorias.store']) !!}

        @include('<?=$namespace?>.<?=$route?>.categorias.form', ['submitText' => 'Inserir'])

    {!! Form::close() !!}

@endsection
