<ul class="nav navbar-nav">
   
    <li class="dropdown @if(Tools::routeIs('painel.contato*')) active @endif">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Contato
            @if($contatosNaoLidos >= 1)
            <span class="label label-success" style="margin-left:3px;">{{ $contatosNaoLidos }}</span>
            @endif
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li @if(Tools::routeIs('painel.contato.index')) class="active" @endif>
                <a href="{{ route('painel.contato.index') }}">Informações de Contato</a>
            </li>
            <li @if(Tools::routeIs('painel.contato.recebidos*')) class="active" @endif>
                <a href="{{ route('painel.contato.recebidos.index') }}">
                    Contatos Recebidos
                    @if($contatosNaoLidos >= 1)
                    <span class="label label-success" style="margin-left:3px;">{{ $contatosNaoLidos }}</span>
                    @endif
                </a>
            </li>
        </ul>
    </li>
</ul>
