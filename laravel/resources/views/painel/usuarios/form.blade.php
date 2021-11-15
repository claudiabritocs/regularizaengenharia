@include('painel.common.flash')

<div class="form-group">
    {!! Form::label('name', 'Usuário') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Senha') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirmação de Senha') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}

<a href="{{ route('painel.usuarios.index') }}" class="btn btn-default btn-voltar">Voltar</a>
