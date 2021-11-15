@extends('<?=$namespace?>.common.template')

@section('content')

    @include('<?=$namespace?>.common.flash')

    <legend>
        <h2>
            <?=$gen->resourceName?>

<?php if($gen->tags): ?>
            <div class="btn-group pull-right">
                <a href="{{ route('<?=$namespace?>.<?=$route?>.tags.index') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-tag" style="margin-right:10px;"></span>Editar Tags</a>
                <a href="{{ route('<?=$namespace?>.<?=$route?>.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar <?=$gen->unitName?></a>
            </div>
<?php else: ?>
            <a href="{{ route('<?=$namespace?>.<?=$route?>.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar <?=$gen->unitName?></a>
<?php endif; ?>
        </h2>
    </legend>

<?php if($gen->categories): ?>
    <div class="row" style="margin-bottom:20px">
        <div class="form-group col-sm-4">
            {!! Form::select('filtro', $categorias, Request::get('filtro'), ['class' => 'form-control', 'id' => 'filtro-select', 'placeholder' => 'Todas as Categorias', 'data-route' => '<?=$namespace?>/<?=$route?>']) !!}
        </div>
        <div class="col-sm-4" style="padding-left:0">
        <a href="{{ route('<?=$namespace?>.<?=$route?>.categorias.index') }}" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-edit" style="margin-right:10px;"></span><small>Editar Categorias</small></a>
        </div>
<?php if($gen->sortable): ?>
        @if(!$filtro)
        <div class="col-sm-4">
            <p class="alert alert-info small" style="margin-bottom: 15px; height:45px; padding: 12px 15px;">
                <span class="glyphicon glyphicon-info-sign" style="margin-right:10px;"></span>
                Selecione uma categoria para ordenar os registros.
            </p>
        </div>
        @endif
<?php endif; ?>
    </div>
<?php endif; ?>

    @if(!count($registros))
    <div class="alert alert-warning" role="alert">Nenhum registro encontrado.</div>
    @else
<?php if($gen->sortable): ?>
    <table class="table table-striped table-bordered table-hover table-info table-sortable" data-table="<?=$gen->table?>">
<?php else: ?>
    <table class="table table-striped table-bordered table-hover table-info">
<?php endif; ?>
        <thead>
            <tr>
<?php if($gen->categories): ?>
<?php if($gen->sortable): ?>
                @if($filtro)<th>Ordenar</th>@endif
<?php endif; ?>
                @if(!$filtro)<th>Categoria</th>@endif
<?php else: ?>
<?php if($gen->sortable): ?>
                <th>Ordenar</th>
<?php endif; ?>
<?php endif; ?>
<?php foreach($gen->fields as $field): ?>
                <th><?=$field['alias']?></th>
<?php endforeach; ?>
<?php if($gen->gallery): ?>
                <th>Imagens</th>
<?php endif; ?>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($registros as $registro)
            <tr class="tr-row" id="{{ $registro->id }}">
<?php if($gen->sortable): ?>
<?php if($gen->categories): ?>
                @if($filtro)
<?php endif; ?>
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>
<?php if($gen->categories): ?>
                @endif
<?php endif; ?>
<?php endif; ?>
<?php if($gen->categories): ?>
                @if(!$filtro)
                <td>
                    @if($registro->categoria)
                    {{ $registro->categoria->titulo }}
                    @else
                    <span class="label label-warning">sem categoria</span>
                    @endif
                </td>
                @endif
<?php endif; ?>
<?php foreach($gen->fields as $field): ?>
<?php if(strpos($field['validation'], 'image') !== false): ?>
                <td><img src="{{ asset('assets/img/<?=$route?>/'.$registro-><?=$field['name']?>) }}" style="width: 100%; max-width:150px;" alt=""></td>
<?php else: ?>
                <td>{{ $registro-><?=$field['name']?> }}</td>
<?php endif; ?>
<?php endforeach; ?>
<?php if($gen->gallery): ?>
                <td><a href="{{ route('<?=$namespace?>.<?=$route?>.imagens.index', $registro->id) }}" class="btn btn-info btn-sm">
                    <span class="glyphicon glyphicon-picture" style="margin-right:10px;"></span>Gerenciar
                </a></td>
<?php endif; ?>
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['<?=$namespace?>.<?=$route?>.destroy', $registro->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('<?=$namespace?>.<?=$route?>.edit', $registro->id ) }}" class="btn btn-primary btn-sm pull-left">
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
<?php if($gen->paginate): ?>

    {{ $registros->appends($_GET)->render() }}
<?php endif; ?>
    @endif

@endsection
