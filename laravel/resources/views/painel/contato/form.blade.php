@include('painel.common.flash')

<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::textarea('endereco', null, ['class' => 'form-control ckeditor', 'data-editor' => 'cleanBr']) !!}
</div>

<div class="form-group">
    {!! Form::label('google_maps', 'Código GoogleMaps') !!}
    {!! Form::text('google_maps', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('instagram', 'Instagram - Usar nome que vem após https://instagram.com/') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
</div>

<!-- <div class="form-group">
    {!! Form::label('facebook', 'Facebook') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div> -->

<div class="form-group">
    {!! Form::label('whatsapp', 'Whatsapp (DDD + Número sem espaços)') !!}
    {!! Form::text('whatsapp', null, ['class' => 'form-control']) !!}
</div>


<div class="well form-group">
    {!! Form::label('imagem', 'Imagem') !!}
@if($contato->imagem)
    <img src="{{ url('assets/img/contato/'.$contato->imagem) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
@endif
    {!! Form::file('imagem', ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
