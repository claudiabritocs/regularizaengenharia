@extends('<?=$namespace?>.common.template')

@section('content')

    @include('<?=$namespace?>.common.flash')

    <a href="{{ route('painel.<?=$route?>.index') }}" title="Voltar para <?=$gen->resourceName?>" class="btn btn-sm btn-default">
        &larr; Voltar para <?=$gen->resourceName?>
    </a>

    <legend>
        <h2>
            <small><?=$gen->resourceName?> /</small> Categorias

            <a href="{{ route('<?=$namespace?>.<?=$route?>.categorias.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Categoria</a>
        </h2>
    </legend>

    @if(!count($categorias))
    <div class="alert alert-warning" role="alert">Nenhuma categoria cadastrada.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-sortable" data-table="<?=$route?>_categorias">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Título</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($categorias as $categoria)
            <tr class="tr-row" id="{{ $categoria->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>
                <td>{{ $categoria->titulo }}</td>
                <td class="crud-actions">
                    {!! Form::open(array('route' => array('painel.<?=$route?>.categorias.destroy', $categoria->id), 'method' => 'delete')) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.<?=$route?>.categorias.edit', $categoria->id ) }}" class="btn btn-primary btn-sm pull-left">
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
