@include('<?=$namespace?>.common.flash')

<div class="form-group">
    {!! Form::label('titulo', 'Título') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}

<a href="{{ route('<?=$namespace?>.<?=$route?>.tags.index') }}" class="btn btn-default btn-voltar">Voltar</a>
