@extends('frontend.common.template')

@section('content')

<body>
  <section class="inicial">
    <div class="banner">
      <img src="{{ asset('assets/img/layout/Logo_REGULARIZA_png01.png') }}" alt="Logo Regulariza Engenharia">
      <h1>{{ $home->titulo }}</h1>
      <h2>{{ $home->subtitulo }}</h2>
      <a href="#"><div class="mainbutton"><p>Clique Aqui</p></div></a>
    </div>

    <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1">
      <div class="ws_images" style="width: 100%;">
          <ul>
              @foreach ($banners as $item)
              <li><img src="{{ asset('assets/img/banners/')}}/{!! $item->imagem !!}" id="wows1_0"></li>
              @endforeach
          </ul>
      </div>
      <div class="ws_shadow"></div>
    </div>	
    <script type="text/javascript" src="{{ asset('assets/js/wowslider/engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/wowslider/engine1/script.js') }}"></script>
    <!-- End WOWSlider.com BODY section -->
  </section>

  <div class="hidden_call">
    <h1>{{ $home->titulo }}</h1>
    <h2>{{ $home->subtitulo }}</h2>
    <a href="#"><div class="mainbutton"><p>Clique Aqui</p></div></a>
  </div>

  <section class="cards-father">
    @foreach ($servicos as $servico)
    <div class="cards-sons">
      <div class="cardinfo">
        <h3>✔ {{ $servico->titulo }}</h3>
        <p>{{ $servico->paragrafo }}</p>
        <a href="#"><div class="cardbutton"><h4>Contatar Agora<h4></div></a>
      </div>
      <div class="cardimg"><img src="{{ asset('assets/img/servicos/'.$servico->imagem)}}" alt=""></div>
    </div>
    @endforeach
  </section>

  <section class="cert_div">
    <div class="cert_principal">
      <img src="{{ asset('assets/img/layout/6894930.png') }}" alt="CREA-SP">
      <p>Empresa registrada no Conselho Regional de Engenharia e Agronomia do Estado de São Paulo.</p>
    </div>

    <div class="img_cert">
      @foreach($certificados as $c)
        <img src="{{ asset('assets/img/certificados/'.$c->imagem) }}" alt="certificados">
      @endforeach
    </div>
  </section>

  <section class="contatos">
    <h5>Sobre a Empresa</h5>
    <div class="contatoscards">
      <div>
        <h6><ion-icon name="pin"></ion-icon> Endereço</h6>
        <p id="end">{{ str_replace(array("<p>", "</p>"),'', $contato->endereco) }}</p>
      </div>
      <div>
        <h6><ion-icon name="call"></ion-icon> Contato</h6>
        <p>{{ $contato->telefone }}</p>
        <p>{{ $contato->telefone_2 }}</p>
      </div>
      <div>
        <h6><ion-icon name="mail"></ion-icon> E-mail</h6>
        <p>{{ $contato->email }}</p>
      </div>
    </div>

    @if($contato->google_maps)
      <div class="mapgoggle">
          {!! $contato->google_maps !!}
      </div>
    @endif
  </section>

  <section class="FAQ">
    <div class="blocos">
      <h4>Question</h4>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iure deserunt quas facilis unde, hic eveniet placeat quasi reprehenderit sit voluptatem optio? Perspiciatis, odio? Praesentium quos explicabo dignissimos vero eligendi.</p>
    </div>
    <div class="blocos">
      <h4>Question</h4>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iure deserunt quas facilis unde, hic eveniet placeat quasi reprehenderit sit voluptatem optio? Perspiciatis, odio? Praesentium quos explicabo dignissimos vero eligendi.</p>
    </div>
    <div class="blocos">
      <h4>Question</h4>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iure deserunt quas facilis unde, hic eveniet placeat quasi reprehenderit sit voluptatem optio? Perspiciatis, odio? Praesentium quos explicabo dignissimos vero eligendi.</p>
    </div>
    <div class="blocos">
      <h4>Question</h4>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iure deserunt quas facilis unde, hic eveniet placeat quasi reprehenderit sit voluptatem optio? Perspiciatis, odio? Praesentium quos explicabo dignissimos vero eligendi.</p>
    </div>
  </section>

  <section class="lastcall">
    <h5>Texto1</h5>
    <p>Texto2</p>
    <button>BOTÃO</button>
  </section>

</body>


@endsection
