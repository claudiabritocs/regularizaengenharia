@extends('frontend.common.template')

@section('content')

<main class="projetos-show">

    <div class="center">

        @foreach($imagens as $imagem)
            
            <img src="{{ asset('assets/img/projetos/imagens/'.$imagem->imagem) }}" class="img-projeto" alt="{{ $projeto->{trans('database.titulo')} }}">

        @endforeach

    </div>

    <a href="{{ route('projetos') }}" class="btn_back">Voltar</a>
    
</main>

@endsection