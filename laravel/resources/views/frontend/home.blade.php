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
      <div class="ws_images" style="height: 675px; width: 100%;">
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

  <div class="total">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <section class="cardsbeneficios">
    @foreach ($servicos as $servico)
    <h3>{{ $servico->titulo }}</h3>
    <p>{{ $servico->paragrafo }}</p>
    <img src="{{ asset('assets/img/servicos/'.$servico->imagem)}}" alt="">
    <button>#</button>
    @endforeach
  </section>

  <section class="certificados">
    <span>Empresa registrada no Conselho Regional de Engenharia e Agronomia do Estado de São Paulo.</span>
    <img src="" alt="">
    <img src="" alt="">
    <img src="" alt="">
    <img src="" alt="">
    <img src="" alt="">
  </section>

  <section class="contatos">
    <h5>Sobre</h5>
    <div class="contatoscards">
      <div>
        <h6>Endereço</h6>
        <p>xxxxx</p>
      </div>
      <div>
        <h6>Telefones</h6>
        <p>xxxxx</p>
      </div>
      <div>
        <h6>E-mail</h6>
        <p>xxxxx</p>
      </div>
      <div>
        MAPA??
      </div>
    </div>
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
