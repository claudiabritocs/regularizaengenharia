@include('painel.common.flash')


<div class="form-group">
    {!! Form::label('titulo_pt', 'Título') !!}
    {!! Form::text('titulo_pt', null, ['class' => 'form-control']) !!}
    {!! csrf_field() !!}
</div>

<div class="well form-group">
    {!! Form::label('capa', 'Capa') !!}
@if($submitText == 'Alterar')
    <img src="{{ url('assets/img/projetos/'.$projetos->capa) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
@endif
    {!! Form::file('capa', ['class' => 'form-control']) !!}
</div>

<!-- <div class="form-group">
    {!! Form::label('local', 'Local') !!}
    {!! Form::text('local', null, ['class' => 'form-control']) !!}
</div> -->

<div class="form-group">
    {!! Form::label('descritivo_pt', 'Descrição') !!}
    {!! Form::textarea('descritivo_pt', null, ['class' => 'form-control ckeditor', 'data-editor' => 'cleanBr']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
{!! csrf_field() !!}

<a href="{{ route('painel.projetos.index') }}" class="btn btn-default btn-voltar">Voltar</a>
