@extends('frontend.common.template')

@section('content')

<main class="projetos-show">

    <div class="center">

        @foreach($imagens as $imagem)
            
            <img src="{{ asset('assets/img/projetos/imagens/'.$imagem->imagem) }}" class="img-projeto" alt="{{ $projeto->{trans('database.titulo')} }}">

        @endforeach

    </div>
    
    <div class="btn">
        <a href="{{ route('projetos') }}"><div class="btn_back"><h4>VOLTAR</h4></div></a>
    </div>

</main>

@endsection