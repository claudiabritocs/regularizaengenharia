@include('painel.common.flash')

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Título') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control' ]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('paragrafo', 'Descrição') !!}
            {!! Form::text('paragrafo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="well form-group">
    {!! Form::label('imagem', 'Imagem') !!}
        @if($submitText == 'Alterar')
            <img src="{{ asset('assets/img/servicos/'.$registro->imagem) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
        @endif
    {!! Form::file('imagem', ['class' => 'form-control']) !!}
    </div>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
