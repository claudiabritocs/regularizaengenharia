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
                <a href="#"><li>Contato</li></a>
                <a href="#" id="termos"><li>Termos ▼</li></a>
                <div class="dropdown-content" id="dropdown-content">
                    <a href="#">Política de Privacidade</a>
                    <a href="#">Termos de Uso</a>
                </div>
            </ul>
        </nav>

        <div class="menuburger" id="menuburger">
            ☰
        </div>

        <div class="menuburgerlist0" id="menuburgerlist">
            <ul>
                <a href="{{ route('home') }}"><li>Home</li></a>
                <a href="#"><li>Regularização</li></a>
                <a href="#"><li>Serviços</li></a>
                <a href="#"><li>Contato</li></a>
                <a href="#"><li>Termos</li></a>
            </ul>
        </div>
    </div>
</header>
