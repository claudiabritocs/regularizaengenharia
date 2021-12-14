<header class="headermain">
    <div class="mainheader">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/img/layout/Logo_REGULARIZA_png03.png') }}" alt="Logo Regulariza Engenharia">
        </a>

        <nav class="menulongo">
            <ul>
                <a href="{{ route('home') }}"><li>Home</li></a>
                <a href="{{ route('regularizacao') }}"><li>Regularização</li></a>
                <a href="#"><li>Serviços</li></a>
                <a href="{{ route('contato') }}"><li>Contato</li></a>
                <div id="termos"><li>Termos ▼</li></div>
                <div class="dropdown-content" id="dropdown-content">
                    <a href="{{ route('termos') }}">Política de Privacidade</a>
                    <a href="{{ route('termos') }}#termosdeuso">Termos de Uso</a>
                </div>
            </ul>
        </nav>

        <div class="menuburger" id="menuburger">
            ☰
        </div>

        <div class="menuburgerlist0" id="menuburgerlist">
            <ul>
                <a href="{{ route('home') }}"><li>Home</li></a>
                <a href="{{ route('regularizacao') }}"><li>Regularização</li></a>
                <a href="#"><li>Serviços</li></a>
                <a href="{{ route('contato') }}"><li>Contato</li></a>
                <a href="{{ route('termos') }}"><li>Termos</li></a>
            </ul>
        </div>
    </div>
</header>
