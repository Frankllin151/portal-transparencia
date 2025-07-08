<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="{{route("dashboard")}}" class="sidebar-logo">
      <img src="{{ asset('assets/images/logo.jpeg') }}" alt="site logo" class="light-logo">
      <img src="{{ asset('assets/images/logo.jpeg') }}" alt="site logo" class="dark-logo">
      <img src="{{ asset('assets/images/logo.jpeg') }}" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <!-- Início -->
      <li>
        <a href="{{route('dashboard')}}">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>Inicio</span>
        </a>
      </li>

    <!----Financeiro--->
   <li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:wallet" class="menu-icon"></iconify-icon>
    <span>Financeiro</span>
  </a>
  <ul class="sidebar-submenu">
    <li>
      <a href="{{route('receita')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Receita
      </a>
    </li>
    <li>
      <a href="{{route('despesas')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Despesas
      </a>
    </li>
    <li>
      <a href="{{route('pagamentosdespesasreceita')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pagamentos
      </a>
    </li>
    <li>
      <a href="{{route('movimentacao')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Movimentação bancária
      </a>
    </li>
  </ul>
</li>

<!-- Servidores -->
<li>
  <a href="{{route('servidores')}}">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Servidores</span>
  </a>
</li>

<!-- Processos LCT -->
<li>
  <a href="{{route('processo')}}">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Processos LCT</span>
  </a>
</li>


<!-- Contratos -->
<!-- Contratos -->
<li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Contratos</span>
  </a>
  <ul class="sidebar-submenu">
    <li>
      <a href="{{route('contratos')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Todos
      </a>
    </li>
    <li>
      <a href="{{route('contratos_item')}}">
        <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Contratos Itens
      </a>
    </li>
  </ul>
</li>

      <!-- Parâmetros -->
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
          <span>Parâmetros</span>
        </a>
        <ul class="sidebar-submenu">
          <!-- ...mantenha aqui todos os links de parâmetros como já estão... -->
          <li><a href="{{route('tipopoder')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Poder</a></li>
          <li><a href="{{route('tipoacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Ação</a></li>
          <li><a href="{{route('tiporecurso')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Recurso</a></li>
          <li><a href="{{route('tipoempenho')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Empenho</a></li>
          <li><a href="{{route('tipoconta')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo de Conta</a></li>
          <li><a href="{{route('tipocontrato')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo de Contrato</a></li>
          <li><a href="{{route('categoriaempenho')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Categoria Empenho</a></li>
          <li><a href="{{route('entidade')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Entidade</a></li>
          <li><a href="{{route('unidade')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Unidade</a></li>
          <li><a href="{{route('nomeorgao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Nome Orgão</a></li>
          <li><a href="{{route('natureza')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Natureza Receita</a></li>
          <li><a href="{{route('naturezajuridica')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Natureza Juridica</a></li>
          <li><a href="{{route('nomecredor')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Nome Credor</a></li>
          <li><a href="{{route('finalidade')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Finalidade</a></li>
          <li><a href="{{route('formaingresso')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Forma Ingresso</a></li>
          <li><a href="{{route('formajulgamento')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Forma Julgamento</a></li>
          <li><a href="{{route('classificacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Classificação</a></li>
          <li><a href="{{route('fonterecurso')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Fonte Recurso</a></li>
          <li><a href="{{route('situacaocargo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Situação Cargo</a></li>
           <li><a href="{{route('cargos')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Cargos</a></li>
          <li><a href="{{route('classificacaocargo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Classificação do Cargo</a></li>
          <li><a href="{{route('classificacaoafastamento')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Classificação de Afastamento</a></li>
          <li><a href="{{route('vinculoempregaticio')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Vinculo Empregaticio</a></li>
          <li><a href="{{route('lotacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Lotação</a></li>
          <li><a href="{{route('modalidadelicitacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Modalidade Licitacão</a></li>
        </ul>
      </li>

      <!-- Configurações -->
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
          <span>Configurações</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ route('profile.edit') }}">
              <i class="ri-user-3-fill text-primary-600 w-auto"></i> Perfil
            </a>
          </li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="ri-logout-box-r-line text-primary-600 w-auto"></i> Sair
              </a>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>