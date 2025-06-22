
<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="index.html" class="sidebar-logo">
      <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
<img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
<img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
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

     <!---Natureza Receita-->
 <li class="dropdown">
  <a href="javascript:void(0)">
    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
    <span>Natureza Receita</span> 
  </a>
  <ul class="sidebar-submenu">
<li><a href="{{route('natureza')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Todos</a></li>

<li><a href="{{route('natureza.create')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Novo</a></li>
   
  </ul>
  
</li>
 <!---Natureza Receita end-->

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