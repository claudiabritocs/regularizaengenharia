<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Painel Administrativo</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootswatch-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/painel.css') }}">
</head>
<body class="painel-login">
    <div class="col-md-4 col-sm-6 col-xs-10 login">
    {!! Form::open(['route' => 'auth']) !!}
        <h3>
            {{ config('app.name') }}
            <small>Painel Administrativo</small>
        </h3>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                {!! Form::text('login', null, [
                    'class'       => 'form-control',
                    'placeholder' => 'usuário ou e-mail',
                    'autofocus'   => true,
                    'required'    => true
                ]) !!}
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                </span>
                {!! Form::password('password', [
                    'class'       => 'form-control',
                    'placeholder' => 'senha',
                    'required'    => true
                ]) !!}
            </div>
        </div>

        <div class="checkbox">
            <label>
                {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!}
                <small>Lembrar de mim</small>
            </label>
        </div>

        {!! Form::submit('Login', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px;']) !!}
    {!! Form::close() !!}
    </div>
</body>
</html>
