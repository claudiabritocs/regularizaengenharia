@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <a href="{{ route('painel.<?=$route?>.index') }}" title="Voltar para <?=$gen->resourceName?>" class="btn btn-sm btn-default">
        &larr; Voltar para <?=$gen->resourceName?>
    </a>

    <legend>
        <h2>
            <small><?=$gen->resourceName?> / Imagens do <?=$gen->unitName?>:</small> {{ $registro->id }}

            {!! Form::open(['route' => ['painel.<?=$route?>.imagens.store', $registro->id], 'files' => true, 'class' => 'pull-right']) !!}
            <div class="btn-group btn-group-sm pull-right">
                <span class="btn btn-success btn-sm" style="position:relative;overflow:hidden">
                    <span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>
                    Adicionar Imagens
                    <input id="images-upload" type="file" name="imagem" id="imagem" multiple style="position:absolute;top:0;right:0;opacity:0;font-size:200px;cursor:pointer;">
                </span>

                <a href="{{ route('painel.<?=$route?>.imagens.clear', $registro->id) }}" class="btn btn-danger btn-sm btn-delete btn-delete-link btn-delete-multiple">
                    <span class="glyphicon glyphicon-trash" style="margin-right:10px;"></span>
                    Limpar
                </a>
            </div>
            {!! Form::close() !!}
        </h2>
    </legend>

    <div class="progress progress-striped active">
        <div class="progress-bar" style="width: 0"></div>
    </div>

    <div class="alert alert-block alert-danger errors" style="display:none"></div>

    <div class="alert alert-info" style="display:inline-block;padding:10px 15px;">
        <small>
            <span class="glyphicon glyphicon-move" style="margin-right: 10px;"></span>
            Clique e arraste as imagens para ordená-las.
        </small>
    </div>

    <div id="imagens" data-table="<?=$route?>_imagens">
    @if(!count($imagens))
        <div class="alert alert-warning no-images" role="alert">Nenhuma imagem cadastrada.</div>
    @else
        @foreach($imagens as $imagem)
        @include('painel.<?=$route?>.imagens.imagem')
        @endforeach
    @endif
    </div>

@endsection
