@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>
            Banners
            <a href="{{ route('painel.banners.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Banner</a>
        </h2>
    </legend>


    @if(!count($registros))
    <div class="alert alert-warning" role="alert">Nenhum registro encontrado.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-info table-sortable" data-table="banners">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Imagem</th>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($registros as $registro)
            <tr class="tr-row" id="{{ $registro->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>
                <td><img src="{{ asset('assets/img/banners/'.$registro->imagem) }}" style="width: 100%; max-width:150px;" alt=""></td>
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.banners.destroy', $registro->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.banners.edit', $registro->id ) }}" class="btn btn-primary btn-sm pull-left">
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
