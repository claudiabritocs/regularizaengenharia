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

  <section class="the_call">
      <div class="white_box">
        <h2>Você sabe quanto dinheiro está perdendo?</h2>
        <p class="p_par">Imóvel regularizado é sinônimo de tranquilidade e oportunidade de obter lucros significativos.
        </p>
        <p class="p_par">A <strong>REGULARIZA ENGENHARIA</strong> oferece serviços para enquadrar o seu imóvel nos padrões para sair da informalidade e entrar na lista dos queridinhos dos investidores, do governo e dos bancos.
        </p>
        <p class="p_par">O Governo Federal lançou o novo programa de sistema habitacional CASA <span class="verde">VERDE</span> E <span class="amarela">AMARELA</span> que tem como objetivo alcançar cerca de 1,6 milhões de famílias com a menor taxa de juros de financiamento habitacional da história do Brasil.
        </p>
        <p class="p_par">Esteja pronto para as oportunidades que o mercado imobiliário oferece, com um imóvel regularizado você <strong>valoriza em 30%</strong> o valor de venda e locação.
        </p>
        <p class="p_par">Obtenha linhas de crédito para construir, reformar e até mesmo para outros investimentos colocando a propriedade em garantia.
        </p>
        <a href="#"><div class="btn_regularizacao"><p class="p_btn">Falar Comigo</p></div></a>
        <div class="imgtablet">
          <img src="{{ asset('assets/img/layout/ipad.png')}}" alt="Tablet mostrando uma foto de uma casa">
        </div>
      </div>
  </section>

  <section class="beneficios">
    <h1>Alguns Benefícios</h1>
    <div class="box_father">
      <div class="box1">
        <div class="box_sons">
          <img class="icon" src="{{ asset('assets/img/layout/casa.png')}}" alt="Ícone Casa">
          <h2>Valor</h2>
          <p>O imóvel regularizado vale muito mais no mercado.</p>
          <br>  
          <p>Além do comprador se sentir seguro e pagar o quanto você pedir, o banco aceitará financiar o imóvel e pagará o valor diretamente para você.</p>
          <br>  
          <p>Tem como ficar melhor?</p>
        </div>
        <div class="box_sons">
          <img class="icon" src="{{ asset('assets/img/layout/papiro.png')}}" alt="Ícone Pergaminho aberto">
          <h2>Tranquilidade</h2>
          <p>Nada como uma noite de sono tranquila!</p> 
          <br>  
          <p>Todas as pessoas têm o direito de morar sem o medo de sofrer remoção, ameaças inesperadas.</p>
          <br>  
          <p>Com o Imóvel regular, ninguém vai poder questionar a sua propriedade.</p>
        </div>
      </div>

      <div class="box2">
        <div class="box_sons">
          <img class="icon" src="{{ asset('assets/img/layout/grupo.png')}}" alt="Ícone grupo de 3 pessoas">
          <h2>Herança</h2>
          <p>Não se preocupe com o futuro</p>
          <br>
          <p>Tenha certeza que seus filhos irão receber sua herança quando você se for.</p>
          <br>
          <p>O título de propriedade é garantia de um inventário seguro, rápido e barato.</p>
        </div>
        <div class="box_sons">
          <img class="icon" src="{{ asset('assets/img/layout/moeda.png')}}" alt="Ícone moeda caindo na mão">
          <h2>Empréstimos</h2>
          <p>Fica muito mais fácil conseguir um empréstimo no banco oferecendo o seu imóvel regularizado em garantia.</p>
          <br>  
          <p>Sem contar a vantagem das taxas e juros mais baixas do mercado, prazo de pagamento facilitado, inclusive para quem está com o "nome sujo".</p>
        </div>
      </div>
      <a href="#"><div class="btn_regularizacao"><p class="p_btn">CLIQUE AQUI</p></div></a>
    </div>
  </section>

  <section class="chamada-bottom">
    <div class="imgcall">
      <div class="call_h2">Está precisando tirar uma Dúvida?</div>
      <div class="call_h3">Fale com a gente Agora!</div>
      <a href="#"><div class="btn_call"><p>CLIQUE AQUI</p></div></a>
      <img src="{{ asset('assets/img/layout/build.jpg')}}" alt="predios altos ao fundo">
    </div>
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
