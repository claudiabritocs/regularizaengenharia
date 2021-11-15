@include('painel.common.flash')

<div class="form-group">
    {!! Form::label('frase', 'Frase') !!}
    {!! Form::text('frase', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('texto', 'Texto') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control ckeditor', 'data-editor' => 'padrao']) !!}
</div>

<div class="form-group">
    {!! Form::label('video', 'URL de incorporação do Vídeo (exemplo: https://www.youtube.com/embed/WbAEhGG5SpM)') !!}
    {!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<div class="well form-group">
    {!! Form::label('imagem_sobre_1', 'Imagem Sobre 1') !!}
    @if($registro->imagem_sobre_1)
    <img src="{{ url('assets/img/home/'.$registro->imagem_sobre_1) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
    @endif
    {!! Form::file('imagem_sobre_1', ['class' => 'form-control']) !!}
</div>

<div class="well form-group">
    {!! Form::label('imagem_sobre_2', 'Imagem Sobre 2') !!}
    @if($registro->imagem_sobre_2)
    <img src="{{ url('assets/img/home/'.$registro->imagem_sobre_2) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
    @endif
    {!! Form::file('imagem_sobre_2', ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
