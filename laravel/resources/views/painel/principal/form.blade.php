@include('painel.common.flash')

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Chamada Principal') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control' ]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('subtitulo', 'Frase de efeito') !!}
            {!! Form::text('subtitulo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
