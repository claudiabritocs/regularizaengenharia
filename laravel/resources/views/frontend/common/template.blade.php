<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ url('/') }}">

    <meta name="author" content="Trupe Agência Criativa">
    <meta name="copyright" content="{{ date('Y') }} Trupe Agência Criativa">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">

    <meta property="og:title" content="{{ $config->title }}">
    <meta property="og:description" content="{{ $config->description }}">
    <meta property="og:site_name" content="{{ $config->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
@if($config->imagem_de_compartilhamento)
    <meta property="og:image" content="{{ asset('assets/img/'.$config->imagem_de_compartilhamento) }}">
@endif

    <title>{{ $config->title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/vendor.main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
</head>
<body>
    @include('frontend.common.header')
    @yield('content')
    @include('frontend.common.footer')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('assets/js/vendor.main.js') }}"></script>
    <script src="{{ asset('assets/vendor/rellax/rellax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-cycle2/build/jquery.cycle2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fancybox/source/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

@if($config->analytics)
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '{{ $config->analytics }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif
</body>
</html>
