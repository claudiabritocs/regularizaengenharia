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
    {!! Form::label('telefone_2', 'Telefone 2') !!}
    {!! Form::text('telefone_2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::textarea('endereco', null, ['class' => 'form-control ckeditor', 'data-editor' => 'clean']) !!}
</div>

<div class="form-group">
    {!! Form::label('google_maps', 'Código GoogleMaps') !!}
    {!! Form::text('google_maps', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
