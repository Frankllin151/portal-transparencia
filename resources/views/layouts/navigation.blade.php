
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
      
       <li>
      <a href="{{route('dashboard')}}">
         <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
         <span>Inicio</span>
      </a>
     </li>
      <!---Despesas-->
    <li class="dropdown">
 <a href="javascript:void(0)">
    <iconify-icon icon="mdi:wallet" class="menu-icon"></iconify-icon>
    <span>Despesas</span> 
  </a>
  <ul class="sidebar-submenu">
    <li><a href="{{route('despesas')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
    <li> <a href="{{route('despesas.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
   
  </ul>
    </li>
     <!---Despesas end-->

       <!---Processo-->
     <li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Processsos LCT</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('processo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
    <li> <a href="{{route('processo.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
  </ul>
  
</li>
  <!---Processo  end-->

 <!--- Receita-->
 <li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Receita</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('receita')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
<li><a href="{{route('receita.novo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>

   
  </ul>
  
</li>
 <!--- Receita end-->

<!--ReceitasDespesasExtraorcamentaria--->

 <li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Orçamentaria Despesas</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('despreceitaex')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
<li><a href="{{route('despreceitaex.novo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>

   
  </ul>
  
</li>
<!--ReceitasDespesasExtraorcamentaria end--->

<!---Pagamento Receitas Depesas Extra Orçamentaria--->
<li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Pagamentos Receita Depesas Orçamentaria</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('pagamentosdespesasreceita')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
<li>
  <a href="{{route("pagamentosdespesasreceita.create")}}">
    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
    Novo
  </a>
</li>
  </ul>
  
</li>
<!---Pagamento Receitas Depesas Extra Orçamentaria end--->

<!---MovimentacaoBancaria end--->

<li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Movimentacao Bancaria</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('movimentacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>

<li><a href="{{route('movimentacaobancaria.novo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
  </ul>
 
  
</li>
<!---MovimentacaoBancaria end--->

<!---Cargos --->

<li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Cargos</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('cargos')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
<li><a href="{{route('cargos.novo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>

  </ul>
</li>
<!---Cargos end--->

<!----Servidores ---->
<li class="dropdown">
 <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Servidores</span> 
  </a>
  <ul class="sidebar-submenu">
    <li><a href="{{route('servidores')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
    <li> <a href="{{route('servidores.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
   
  </ul>
    </li>
<!----Servidores  End ---->

<!--Contrato--->

<li class="dropdown">
 <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Contrato</span> 
  </a>
  <ul class="sidebar-submenu">
    <li><a href="{{route('contratos')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
    <li> <a href="{{route('contratos.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
   
  </ul>
    </li>
<!--Contrato end--->



<!--Contrato Item--->

<li class="dropdown">
 <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Contrato  Items</span> 
  </a>
  <ul class="sidebar-submenu">
    <li><a href="{{route('contratos_item')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>
    <li> <a href="{{route('contratos_item.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
   
  </ul>
    </li>
<!--Contrato Item end--->


<!---Parâmentro --->

<li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Parâmentros</span> 
  </a>
  <ul class="sidebar-submenu">
     <li> <a href="{{route('tipopoder')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Poder</a></li>
         <li><a href="{{route('tipoacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Ação</a></li>
          <li><a href="{{route('tiporecurso')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Recurso</a></li>
    <li> <a href="{{route('tipoempenho')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo Empenho</a></li>
    <li><a href="{{route('tipoconta')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo de Conta</a></li>
<li><a href="{{route('tipocontrato')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Tipo de Contrato</a></li>
    <li><a href="{{route('categoriaempenho')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Categoria Empenho</a></li>
     <li> <a href="{{route('entidade')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Entidade</a></li>
      <li> <a href="{{route('unidade')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Unidade</a></li>
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
  <li><a href="{{route('classificacaocargo')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Classificação do Cargo</a></li>
  <li><a href="{{route('classificacaoafastamento')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Classificação de Afastamento</a></li> 
  <li><a href="{{route('vinculoempregaticio')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Vinculo Empregaticio</a></li>
<li><a href="{{route('lotacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Lotação</a></li>
<li><a href="{{route('modalidadelicitacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Modalidade Licitacão</a></li>  

</ul>
</li>
<!---Parâmentro end--->

  <!---Settings-->
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
          <span>Settings</span> 
        </a>
        <ul class="sidebar-submenu">
  <!-- Profile -->
  <li>
    <a href="{{ route('profile.edit') }}">
      <i class="ri-user-3-fill text-primary-600 w-auto"></i> Profile
    </a>
  </li>

  <!-- Logout -->
  <li>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
        <i class="ri-logout-box-r-line text-primary-600 w-auto"></i> Logout
      </a>
    </form>
  </li>
         
        </ul>
      </li>
        <!---Settings end-->
    </ul>
  </div>
</aside>