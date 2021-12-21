@extends('frontend.common.template')

@section('content')

<body>
  <section class="inicial">
    <div class="banner">
      <img src="{{ asset('assets/img/layout/Logo_REGULARIZA_png01.png') }}" alt="Logo Regulariza Engenharia">
      <h1>{{ $home->titulo }}</h1>
      <h2>{{ $home->subtitulo }}</h2>
      <div class="btn_link0">
        <div class="mainbutton" id="btn-Whats"><p>Clique Aqui</p></div>
      </div>
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

  <div class="whatsbox" id="whatsbox" style="display: none;">
    
    <div class="thebox">
      <i class="fa fa-times" id="fa-times" aria-hidden="true"></i>
      
      <a href="https://api.whatsapp.com/send?phone=5511998770821&text=Ol%C3%A1!%20Gostaria%20de%20tirar%20uma%20d%C3%BAvida!" target="_blank">
        <div class="each">
          <img src="{{ asset('assets/img/layout/whatsicon.png')}}" alt="ícone whatsappp">
          <p>Nicolas</p>
        </div>
      </a>

      <a href="https://api.whatsapp.com/send?phone=5511997459364&text=Ol%C3%A1!%20Gostaria%20de%20tirar%20uma%20d%C3%BAvida!" target="_blank">
        <div class="each">
          <img src="{{ asset('assets/img/layout/whatsicon.png')}}" alt="ícone whatsappp">
          <p>Bruno</p>
        </div>
      </a>
    </div>
  </div>

  <div class="hidden_call">
    <h1>{{ $home->titulo }}</h1>
    <h2>{{ $home->subtitulo }}</h2>
    <div class="mainbutton" id="btn-Whats2"><p>Clique Aqui</p></div>
  </div>

  <div class="arrow1">
    <i class="fa fa-angle-double-down"  aria-hidden="true"></i>
  </div>
  
  <section class="cards-father">
    @foreach ($servicos as $servico)
    <div class="cards-sons" id="sons">
      <div class="cardinfo">
        <h3>✔ {{ $servico->titulo }}</h3>
        <p>{{ $servico->paragrafo }}</p>
        <div class="btn_ser">
          <a href="https://api.whatsapp.com/send?phone=5511998770821&text=Ol%C3%A1!%20Gostaria%20de%20tirar%20uma%20d%C3%BAvida!" target="_blank">
            <div class="cardbutton"><h4>Contatar Agora<h4></div>
          </a>
        </div>
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
    <div class="faixafaq">
      <h5>F.A.Q.</h5>
    </div>
    <div class="allblocos">
      @foreach ($faq as $f)
        <div class="blocos">
          <h4>{{ $f->titulo }}</h4>
          <hr>
          <p>{{ $f->paragrafo }}</p>
        </div>
      @endforeach
    </div>
  </section>
</body>


@endsection
