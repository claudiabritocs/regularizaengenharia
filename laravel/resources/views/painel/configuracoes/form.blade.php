@include('painel.common.flash')

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('keywords', 'Keywords') !!}
            {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('analytics', 'Código Analytics') !!}
            {!! Form::text('analytics', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="well form-group">
    {!! Form::label('imagem_de_compartilhamento', 'Imagem de compartilhamento') !!}
@if($registro->imagem_de_compartilhamento)
    <img src="{{ url('assets/img/'.$registro->imagem_de_compartilhamento) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
@endif
    {!! Form::file('imagem_de_compartilhamento', ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}
