@include('painel.common.flash')

<div class="row">
    <div class="form-group">
        {!! Form::label('titulo', 'Dúvida Frequente') !!}
        {!! Form::text('titulo', null, ['class' => 'form-control' ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('paragrafo', 'Explicação / Resposta') !!}
        {!! Form::text('paragrafo', null, ['class' => 'form-control']) !!}
    </div>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
