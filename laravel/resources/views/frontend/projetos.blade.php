@extends('frontend.common.template')

@section('content')

<main class="projetos">

    <div class="center">

        <!-- <div class="loading">
            <img src="{{ asset('assets/img/layout/load.gif') }}" alt="">
        </div> -->

        @foreach($projetos as $projeto)
        
        <div class="box_card">
            <a href="{{ route('projetos.show', $projeto->slug_pt) }}">
                <div class="card_img">
                    <img src="{{ asset('assets/img/projetos/'.$projeto->capa) }}" alt="">
                </div>
                <div class="card_text">
                    <h1>{{$projeto->titulo_pt}}</h1>
                    <p>{{$projeto->descritivo_pt}}</p>
                </div>
            </a>
        </div>
        
        @endforeach

    </div>

</main>

@endsection