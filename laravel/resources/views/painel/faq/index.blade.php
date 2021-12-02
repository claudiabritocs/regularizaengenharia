@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>
            FAQ
            <a href="{{ route('painel.faq.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Pergunta/Dúvida frequente</a>
        </h2>
    </legend>


    @if(!count($faqs))
    <div class="alert alert-warning" role="alert">Nenhum dado informado.</div>
    @else
    <table class="table table-striped table-bordered table-hover table-info table-sortable" data-table="faq">
        <thead>
            <tr>
                <th>Ordenar</th>
                <th>Titulo</th>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($faqs as $faq)
            <tr class="tr-row" id="{{ $faq->id }}">
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-move">
                        <span class="glyphicon glyphicon-move"></span>
                    </a>
                </td>

                <td>
                    <p>{{ $faq->titulo }}</p>
                </td>
                
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.faq.destroy', $faq->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.faq.edit', $faq->id ) }}" class="btn btn-primary btn-sm pull-left">
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
