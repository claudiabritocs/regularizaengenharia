    <footer>
        <div class="center">
            <div class="footer-contato">
                <div class="footer-redes">
                        @if($contato->telefone)
                            <p class="footer_telefone">{{ $contato->telefone }}</p></a>
                        @endif 
                </div>
                <div class="footer-redes">
                        @if($contato->whatsapp)
                            <a href="https://api.whatsapp.com/send?phone=55{{ $contato->whatsapp }}" class="whatsapp" target="_blank"><p class="footer_whatsapp">+55 {{ $contato->whatsapp }}</p></a>
                        @endif 
                </div>
                <div class="footer-redes">
                    @if($contato->instagram)
                    <a href="https://www.instagram.com/{{ $contato->instagram }}" class="footer-instagram" target="_blank">@ {{ $contato->instagram }}</a>
                    @endif
                </div>
            </div>

            <div>
                <div class="footer-endereco">
                    <img src="{{ url('assets/img/layout/ico-endereco.svg') }}" class="footer-ico-endereco">
                    {!! $contato->endereco !!}
                </div>
                <div class="footer-email">{{ $contato->email }}</div>
            </div>
            <div class="footer-links">
                <div>
                    <a href="{{ route('politica-de-privacidade') }}" class="footer-politica">POLÍTICA DE PRIVACIDADE</a>
                    <a href="https://www.trupe.net">
                        &copy; {{ config('app.name') }} {{ date('Y') }} &middot; Todos os direitos reservados.<BR>
                        Criação de sites: Trupe Agência Criativa
                    </a>
                </div>
            </div>
        </div>
