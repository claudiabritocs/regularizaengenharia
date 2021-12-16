@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>
            Projetos
            <a href="{{ route('painel.projetos.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Projeto</a>
        </h2>
    </legend>

    @if(!count($projetos))
    <div class="alert alert-warning" role="alert">Nenhum projeto encontrado.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-info table-sortable" data-table="projetos">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Título</th>
                <th>Capa</th>
                <th>Imagens</th>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($projetos as $projeto)
            <tr class="tr-row" id="{{ $projeto->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>

                <td>{{ $projeto->titulo_pt }}</td>
                <td><img src="{{ asset('assets/img/projetos/'.$projeto->capa) }}" style="width: 100%; max-width:80px;" alt=""></td>
                <td><a href="{{ route('painel.projetos.imagens.index', $projeto->id) }}" class="btn btn-info btn-sm">
                    <span class="glyphicon glyphicon-picture" style="margin-right:10px;"></span>Gerenciar
                </a></td>
                
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.projetos.destroy', $projeto->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.projetos.edit', $projeto->id ) }}" class="btn btn-primary btn-sm pull-left">
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
