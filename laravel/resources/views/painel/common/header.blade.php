<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            @include('painel.common.nav')

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown @if(Tools::routeIs(['painel.usuarios*', 'painel.configuracoes*'])) active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-cog small" style="margin-right:3px"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li @if(Tools::routeIs('painel.configuracoes*')) class="active" @endif>
                            <a href="{{ route('painel.configuracoes.index') }}">Configurações</a>
                        </li>
                        <li @if(Tools::routeIs('painel.usuarios*')) class="active" @endif>
                            <a href="{{ route('painel.usuarios.index') }}">Usuários</a>
                        </li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
