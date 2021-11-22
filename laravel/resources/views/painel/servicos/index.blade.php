@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>
            Serviços
            <a href="{{ route('painel.servicos.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Serviços</a>
        </h2>
    </legend>


    @if(!count($registro))
    <div class="alert alert-warning" role="alert">Nenhum serviço registrado.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-info table-sortable" data-table="servicos">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Imagem</th>
                <th>Título</th>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($registro as $reg)
            <tr class="tr-row" id="{{ $reg->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>
                <td><img src="{{ asset('assets/img/servicos/'.$reg->imagem) }}" style="width: 100%; max-width:150px;" alt=""></td>

                <td>
                    <p>{{ $reg->titulo }}</p>
                </td>

                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.servicos.destroy', $reg->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.servicos.edit', $reg->id ) }}" class="btn btn-primary btn-sm pull-left">
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
