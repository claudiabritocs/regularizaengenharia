@extends('painel.common.template')

@section('content')

    <legend>
        <h2>Contatos Recebidos</h2>
    </legend>

    <div class="form-group">
        <label>Data</label>
        <div class="well">{{ $contato->created_at }}</div>
    </div>

    <div class="form-group">
        <label>Nome</label>
        <div class="well">{{ $contato->nome }}</div>
    </div>

    <div class="form-group">
        <label>E-mail</label>
        <div class="well">
            <button class="btn btn-info btn-sm clipboard" data-clipboard-text="{{ $contato->email }}" style="margin-right:5px;border:0;transition:background .3s">
                <span class="glyphicon glyphicon-copy"></span>
            </button>
            {{ $contato->email }}
        </div>
    </div>

@if($contato->telefone)
    <div class="form-group">
        <label>Telefone</label>
        <div class="well">{{ $contato->telefone }}</div>
    </div>
@endif

    <div class="form-group">
        <label>Mensagem</label>
        <div class="well">{{ $contato->mensagem }}</div>
    </div>

    <a href="{{ route('painel.contato.recebidos.index') }}" class="btn btn-default btn-voltar">Voltar</a>

@stop
