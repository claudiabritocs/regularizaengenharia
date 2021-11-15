@extends('frontend.common.template')

@section('content')

    <div class="home">
        <div class="home-line"></div>
        <div class="banners">
            @foreach($banners as $b)
                @if($b->link)
                <a href="{{ Tools::parseLink($b->link) }}" class="slide" style="background-image:url({{ asset('assets/img/banners/'.$b->imagem) }})">
                    @if($b->projeto)
                    <span class="projeto">{{ $b->projeto }}</span>
                    @endif
                </a>
                @else
                <div class="slide" style="background-image:url({{ asset('assets/img/banners/'.$b->imagem) }})">
                    @if($b->projeto)
                    <span class="projeto">{{ $b->projeto }}</span>
                    @endif
                </div>
                @endif
            @endforeach

            <img src="{{ asset('assets/img/layout/marca-andreaparreira.svg') }}" class="banners-logo" alt="">
            <a href="#" class="cycle-prev"></a>
            <a href="#" class="cycle-next"></a>
            <!-- <a href="#" class="scroll-down">SCROLL DOWN</a> -->
        </div>

        @if($home->frase || $home->texto)
        <div class="texto">
            <div class="center">
                <div>
                    <h2>
                        <span>{{ $home->frase }}</span>
                    </h2>

                    {!! $home->texto !!}
                </div>
            </div>
        </div>
        @endif

        @if($home->video || count($imagens))
        <div class="conteudo center-full @if(!count($imagens)) video-only @endif">
            @if($home->video)
            <div class="video">
                <iframe src="{{ $home->video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endif

            @if(count($imagens))
            <div class="imagens">
                @foreach($imagens as $i)
                    @if($i->link)
                    <a href="{{ Tools::parseLink($i->link) }}">
                        <img src="{{ asset('assets/img/imagens/'.$i->imagem) }}" alt="">
                    </a>
                    @else
                    <img src="{{ asset('assets/img/imagens/'.$i->imagem) }}" alt="">
                    @endif
                @endforeach
                @if(count($imagens) % 2)
                <div class="filler"></div>
                @endif
            </div>
            @endif
        </div>
        @endif
    </div>

@endsection
