<ul class="nav navbar-nav">
  <li @if(Tools::routeIs('painel.principal*')) class="active" @endif>
    <a href="{{ route('painel.principal.index') }}">Principal</a>
  </li>
  <li @if(Tools::routeIs('painel.banners*')) class="active" @endif>
    <a href="{{ route('painel.banners.index') }}">Banners</a>
  </li>
  <li @if(Tools::routeIs('painel.servicos*')) class="active" @endif>
    <a href="{{ route('painel.servicos.index') }}">Serviços</a>
  </li>
  <li @if(Tools::routeIs('painel.projetos*')) class="active" @endif>
    <a href="{{ route('painel.projetos.index') }}">Projetos</a>
  </li>
  <li @if(Tools::routeIs('painel.certificados*')) class="active" @endif>
    <a href="{{ route('painel.certificados.index') }}">Certificados</a>
  </li>
  <li @if(Tools::routeIs('painel.contato*')) class="active" @endif>
    <a href="{{ route('painel.contato.index') }}">Contato</a>
  </li>
  <li @if(Tools::routeIs('painel.faq*')) class="active" @endif>
    <a href="{{ route('painel.faq.index') }}">FAQ</a>
  </li>
  <li>
    <a href="{{ url('/') }}">Website</a>
  </li>
</ul>
