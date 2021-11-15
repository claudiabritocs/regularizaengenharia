@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>Contatos Recebidos</h2>
    </legend>

    @if(!count($contatosrecebidos))
    <div class="alert alert-warning" role="alert">Nenhuma mensagem recebida.</div>
    @else
    <table class="table table-striped table-bordered table-hover data-table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="no-filter"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($contatosrecebidos as $contato)

            <tr class="tr-row @if(!$contato->lido) warning @endif">
                <td data-order="{{ $contato->created_at_order }}">{{ $contato->created_at }}</td>
                <td>{{ $contato->nome }}</td>
                <td>
                    <button class="btn btn-info btn-sm clipboard" data-clipboard-text="{{ $contato->email }}" style="margin-right:5px;border:0;transition:background .3s">
                        <span class="glyphicon glyphicon-copy"></span>
                    </button>
                    {{ $contato->email }}
                </td>
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.contato.recebidos.destroy', $contato->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.contato.recebidos.show', $contato->id ) }}" class="btn btn-primary btn-sm pull-left">
                            <span class="glyphicon glyphicon-align-left" style="margin-right:10px;"></span>Ler mensagem
                        </a>

                        <button type="submit" class="btn btn-danger btn-sm btn-delete"><span class="glyphicon glyphicon-remove" style="margin-right:10px;"></span>Excluir</button>

                        <a href="{{ route('painel.contato.recebidos.toggle', $contato->id) }}" class="btn btn-sm pull-left {{ ($contato->lido ? 'btn-warning' : 'btn-success') }}">
                            <span class="glyphicon small {{ ($contato->lido ? 'glyphicon-repeat' : 'glyphicon-ok') }}"></span>
                        </a>
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endif

@stop
