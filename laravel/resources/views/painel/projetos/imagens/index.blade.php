@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <a href="{{ route('painel.projetos.index') }}" title="Voltar para Projetos" class="btn btn-sm btn-default">
        &larr; Voltar para Projetos    </a>

    <legend>
        <h2>
            <small>Projetos / Imagens do Projeto:</small> {{ $projeto->titulo }}

            {!! Form::open(['route' => ['painel.projetos.imagens.store', $projeto->id], 'files' => true, 'class' => 'pull-right']) !!}
            <div class="btn-group btn-group-sm pull-right">
                <span class="btn btn-success btn-sm" style="position:relative;overflow:hidden">
                    <span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>
                    Adicionar Imagens
                    <input id="images-upload" type="file" name="imagem" id="imagem" multiple style="position:absolute;top:0;right:0;opacity:0;font-size:200px;cursor:pointer;">
                </span>
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

    <div id="imagens" data-table="projetos_imagens">
    @if(!count($imagens))
        <div class="alert alert-warning no-images" role="alert">Nenhuma imagem cadastrada.</div>
    @else
        @foreach($imagens as $imagem)
        @include('painel.projetos.imagens.imagem')
        @endforeach
    @endif
    </div>

@endsection
