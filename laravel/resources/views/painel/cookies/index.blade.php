@extends('painel.common.template')

@section('content')

@include('painel.common.flash')

<legend>
    <h2>Relatório de Aceite de Cookies</h2>
</legend>

@if(!count($registros))
<div class="alert alert-warning" role="alert">Nenhum registro encontrado.</div>
@else
<table class="table table-striped table-bordered table-hover data-table">
    <thead>
        <tr>
            <th>Data</th>
            <th>IP</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registros as $registro)
        <tr class="tr-row">
            <td data-order="{{ $registro->created_at_order }}">{{ strftime("%d/%m/%Y %H:%M:%S", strtotime($registro->created_at)) }}</td>
            <td>{{ $registro->ip }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@stop