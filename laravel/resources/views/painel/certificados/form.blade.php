@include('painel.common.flash')

<div class="well form-group">
    {!! Form::label('imagem', 'Imagem') !!}
@if($submitText == 'Alterar')
    <img src="{{ url('assets/img/certificados/'.$certificados->imagem) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
@endif
    {!! Form::file('imagem', ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}

<a href="{{ route('painel.certificados.index') }}" class="btn btn-default btn-voltar">Voltar</a>
