<div class="imagem col-md-2 col-sm-3 col-xs-4" style="margin:5px 0;position:relative;padding:0 5px;" id="{{ $imagem->id }}" data-ordem="{{ $imagem->ordem or 0 }}" data-imagem="{{ $imagem->imagem }}">
    <img src="{{ url('assets/img/projetos/imagens/thumbs/'.$imagem->imagem) }}" alt="" style="display:block;width:100%;height:auto;cursor:move;">
    {!! Form::open([
        'route'  => ['painel.projetos.imagens.destroy', $projeto->id, $imagem->id],
        'method' => 'delete'
    ]) !!}

    <div class="btn-group btn-group-sm" style="position:absolute;bottom:8px;left:10px;">
        <button type="submit" class="btn btn-danger btn-sm btn-delete"><span class="glyphicon glyphicon-remove"></span></button>
    </div>

    {!! Form::close() !!}
</div>
