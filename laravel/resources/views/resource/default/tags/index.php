@extends('<?=$namespace?>.common.template')

@section('content')

    @include('<?=$namespace?>.common.flash')

    <a href="{{ route('painel.<?=$route?>.index') }}" title="Voltar para <?=$gen->resourceName?>" class="btn btn-sm btn-default">
        &larr; Voltar para <?=$gen->resourceName?>
    </a>

    <legend>
        <h2>
            <small><?=$gen->resourceName?> /</small> Tags

            <a href="{{ route('<?=$namespace?>.<?=$route?>.tags.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Tag</a>
        </h2>
    </legend>

    @if(!count($tags))
    <div class="alert alert-warning" role="alert">Nenhuma tag cadastrada.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-sortable" data-table="<?=$route?>_tags">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Título</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($tags as $tag)
            <tr class="tr-row" id="{{ $tag->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>
                <td>{{ $tag->titulo }}</td>
                <td class="crud-actions">
                    {!! Form::open(array('route' => array('painel.<?=$route?>.tags.destroy', $tag->id), 'method' => 'delete')) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.<?=$route?>.tags.edit', $tag->id ) }}" class="btn btn-primary btn-sm pull-left">
                            <span class="glyphicon glyphicon-pencil" style="margin-right:10px;"></span>Editar
                        </a>

                        <button type="submit" class="btn btn-danger btn-sm btn-delete"><span class="glyphicon glyphicon-remove" style="margin-right:10px;"></span>Excluir</button>
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

@endsection
