<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ url('/') }}">

    <title>{{ config('app.name') }} - Painel Administrativo</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootswatch-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.painel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/painel.css') }}">
    <style>
        input {
            font-family: monospace !important;
            font-size: 14px !important;
        }
    </style>
</head>
<body>
    <div class="container" style="padding-bottom:30px;">
        <legend>
            <h2>
                Generator
                <small style="margin-left:10px;font-size:.5em"><a href="{{ route('painel') }}">&larr; voltar</a></small>
            </h2>
        </legend>

        @include('painel.common.flash')

        @if(session('output'))
        <pre style="padding:20px">{!! session('output') !!}</pre><hr>
        @endif

        {!! Form::open(['route' => 'generator.submit']) !!}

            <div class="form-group">
                {!! Form::label('type', 'Type') !!}
                {!! Form::select('type', ['default' => 'Default', 'simple' => 'Simple'], null, ['class' => 'form-control']) !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('resourceName', 'Resource Name') !!}
                        {!! Form::text('resourceName', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('unitName', 'Unit Name') !!}
                        {!! Form::text('unitName', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('fields', 'Fields') !!}
                {!! Form::text('fields', null, ['class' => 'form-control']) !!}
            </div>

            <div class="fields-wrapper">
                <div class="row">
                    <div class="form-group col-md-12" style="margin-bottom: 0;">
                        <div class="panel panel-default">
                            <div class="panel-heading">Fields (Separados)</div>
                            <div class="panel-body">
                                @if(Request::old('campos_nome'))
                                    @foreach(Request::old('campos_nome') as $key => $campo)
                                    <div class="row" @if($key != 0) style="padding: 10px 0 0" @endif>
                                        <div class="col-md-4 col-nome">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" name="campos_nome[]" value="{{ $campo }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Tipo</label>
                                            <input class="form-control" type="text" name="campos_tipo[]" value="{{ Request::old('campos_tipo')[$key] }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Validation</label>
                                            <input class="form-control" type="text" name="campos_validation[]" value="{{ Request::old('campos_validation')[$key] }}">
                                        </div>
                                        @if($key != 0)
                                            <div class="col-md-1">
                                                <a href="#" style="margin-top:26px;" class="btn btn-block btn-danger btn-remove-field"><span class="glyphicon glyphicon-remove"></span></a>
                                            </div>
                                        @endif
                                    </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" name="campos_nome[]" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Tipo</label>
                                            <input class="form-control" type="text" name="campos_tipo[]" value="">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Validation</label>
                                            <input class="form-control" type="text" name="campos_validation[]" value="">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-info btn-create-field">
                <span class="glyphicon glyphicon-plus" style="margin-right:10px"></span>
                Adicionar Campo</a>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('paginate', 'Paginate') !!}
                        {!! Form::text('paginate', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label class="checkbox-inline">
                    {!! Form::checkbox('sortable', 1, null) !!}
                    Sortable
                </label>
                <label class="checkbox-inline">
                    {!! Form::checkbox('gallery', 1, null) !!}
                    Gallery
                </label>
                <label class="checkbox-inline">
                    {!! Form::checkbox('categories', 1, null) !!}
                    Categories
                </label>
                <label class="checkbox-inline">
                    {!! Form::checkbox('tags', 1, null) !!}
                    Tags
                </label>
            </div>

            <hr>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('force', 1, null) !!}
                    Confirm?
                </label>
            </div>

            <hr>

            {!! Form::submit('Send', ['class' => 'btn btn-success']) !!}
            <a href="{{ route('generator.index') }}" class="btn btn-default">Clear</a>

        {!! Form::close() !!}
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.painel.js') }}"></script>
    <script src="{{ asset('assets/js/painel.js') }}"></script>
</body>
</html>
