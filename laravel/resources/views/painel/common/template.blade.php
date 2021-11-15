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
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/themes/cupertino/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.painel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/painel.css') }}">
</head>
<body>
    @include('painel.common.header')

    <div class="container" style="padding-bottom:30px;">
        @yield('content')
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.painel.js') }}"></script>
    <script src="{{ asset('assets/js/painel.js') }}"></script>
</body>
</html>
