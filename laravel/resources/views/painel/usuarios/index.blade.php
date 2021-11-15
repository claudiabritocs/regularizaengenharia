@extends('painel.common.template')

@section('content')

    @include('painel.common.flash')

    <legend>
        <h2>
            Usuários
            <a href="{{ route('painel.usuarios.create') }}" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>Adicionar Usuário</a>
        </h2>
    </legend>

    <table class="table table-striped table-bordered table-hover ">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>E-mail</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($usuarios as $usuario)

            <tr class="tr-row">
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td class="crud-actions">
                    {!! Form::open([
                        'route'  => ['painel.usuarios.destroy', $usuario->id],
                        'method' => 'delete'
                    ]) !!}

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('painel.usuarios.edit', $usuario->id ) }}" class="btn btn-primary btn-sm pull-left">
                            <span class="glyphicon glyphicon-pencil" style="margin-right:10px;"></span>Editar
                        </a>

                        @if(Auth::user()->id != $usuario->id)
                            <button type="submit" class="btn btn-danger btn-sm btn-delete"><span class="glyphicon glyphicon-remove" style="margin-right:10px;"></span>Excluir</button>
                        @endif
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
