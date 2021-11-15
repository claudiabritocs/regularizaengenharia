    <header @if(Tools::routeIs('home')) class="header-home" @endif>
        <div class="center-header">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets/img/layout/marca-andreaparreira.svg') }}" alt="">
            </a>
            <nav id="nav-desktop">
                <!-- <a href="{{ route('home') }}" @if(Tools::routeIs('home')) class="active" @endif>
                    HOME
                </a> -->
                <a href="{{ route('perfil') }}" @if(Tools::routeIs('perfil')) class="active" @endif>
                    perfil
                </a>
                <a href="{{ route('servicos') }}" @if(Tools::routeIs('servicos')) class="active" @endif>
                    serviços
                </a>
                <a href="{{ route('projetos') }}" @if(Tools::routeIs('projetos*')) class="active" @endif>
                    portfólio
                </a>
                <!-- <a href="{{ route('midia') }}" @if(Tools::routeIs('midia')) class="active" @endif>
                    MÍDIA
                </a> -->
                <a href="{{ route('contato') }}" @if(Tools::routeIs('contato')) class="active" @endif>
                    contato
                </a>

                @if($contato->instagram)
                    <a href="https://www.instagram.com/{{ $contato->instagram }}" class="instagram" target="_blank">instagram</a>
                @endif
                <!-- @if($contato->facebook)
                    <a href="{{ $contato->facebook }}" class="facebook" target="_blank"></a>
                @endif
                @if($contato->whatsapp)
                    <a href="https://api.whatsapp.com/send?phone=55{{ $contato->whatsapp }}" class="whatsapp" target="_blank"></a>
                @endif -->
            </nav>
            <button id="mobile-toggle" type="button" role="button">
                <span class="lines"></span>
            </button>
        </div>
    </header>

    <nav id="nav-mobile">
        <div class="center-header">
            <!-- <a href="{{ route('home') }}" @if(Tools::routeIs('home')) class="active" @endif>
                HOME
            </a> -->
            <a href="{{ route('perfil') }}" @if(Tools::routeIs('perfil')) class="active" @endif>
                perfil
            </a>
            <a href="{{ route('servicos') }}" @if(Tools::routeIs('servicos')) class="active" @endif>
                serviços
            </a>
            <a href="{{ route('projetos') }}" @if(Tools::routeIs('projetos*')) class="active" @endif>
                portfólio
            </a>
            <!-- <a href="{{ route('midia') }}" @if(Tools::routeIs('midia')) class="active" @endif>
                MÍDIA
            </a> -->
            <a href="{{ route('contato') }}" @if(Tools::routeIs('contato')) class="active" @endif>
                contatos
            </a>

            @if($contato->instagram)
                <a href="https://www.instagram.com/{{ $contato->instagram }}" class="instagram" target="_blank">instagram</a>
            @endif
            <!-- @if($contato->facebook)
                <a href="{{ $contato->facebook }}" class="facebook" target="_blank"></a>
            @endif
            @if($contato->whatsapp)
                <a href="{{ $contato->whatsapp }}" class="whatsapp" target="_blank"></a>
            @endif -->
        </div>
    </nav>
