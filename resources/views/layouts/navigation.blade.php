
@php
    $user = Auth::user();
    $group = $user && $user->groups->isNotEmpty() ? $user->groups->first() : null;
    $groupPermissions = [];

    if ($group && isset($group->permissions) && $group->permissions->isNotEmpty()) {
        // Suporte para múltiplas permissões por grupo
        foreach ($group->permissions as $permission) {
            $keys = array_map('trim', explode(',', $permission->key));
            $groupPermissions = array_merge($groupPermissions, $keys);
        }
        // Remove duplicados e espaços
        $groupPermissions = array_unique(array_map('trim', $groupPermissions));
    }
 ////dd($groupPermissions);
    // Se tiver 'todas', libera tudo
    $allRoutes = [
        'dashboard', 'receita', 'despesas', 'pagamentos', 'movimentobancario', 'comprasdiretas',
        'servidores', 'processo', 'contratos', 'contratos_item',
        'tipopoder', 'tipoacao', 'tiporecurso', 'tipoempenho', 'tipoconta', 'tipocontrato',
        'categoriaempenho', 'entidade', 'unidade', 'nomeorgao', 'natureza', 'naturezajuridica',
        'nomecredor', 'finalidade', 'formaingresso', 'formajulgamento', 'classificacao',
        'fonterecurso', 'situacaocargo', 'cargos', 'classificacaocargo', 'classificacaoafastamento',
        'vinculoempregaticio', 'lotacao', 'modalidadelicitacao', 'tipomatricula'
    ];
    if (in_array('todas', $groupPermissions)) {
        $groupPermissions = $allRoutes;
    }
@endphp
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
            @if(in_array('dashboard', $groupPermissions))
            <li>
                <a href="{{route('dashboard')}}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Início</span>
                </a>
            </li>
            @endif

            <!-- Financeiro -->
            @if(array_intersect(['receita','despesas','pagamentos','movimentobancario'], $groupPermissions))
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:wallet" class="menu-icon"></iconify-icon>
                    <span>Financeiro</span>
                </a>
                <ul class="sidebar-submenu">
                    @if(in_array('receita', $groupPermissions))
                    <li><a href="{{route('receita')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Receita</a></li>
                    @endif
                    @if(in_array('despesas', $groupPermissions))
                    <li><a href="{{route('despesas')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Despesas</a></li>
                    @endif
                    @if(in_array('pagamentos', $groupPermissions))
                    <li><a href="{{route('pagamentosdespesasreceita')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pagamentos</a></li>
                    @endif
                    @if(in_array('movimentobancario', $groupPermissions))
                    <li><a href="{{route('movimentacao')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Movimentação bancária</a></li>
                    @endif
                    
                @if(in_array('comprasdiretas', $groupPermissions))
<li><a href="{{route('comprasdiretas')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Compras Diretas</a></li>
@endif
                </ul>
            </li>
            @endif

            <!-- Servidores -->
            @if(in_array('servidores', $groupPermissions))
            <li>
                <a href="{{route('servidores')}}">
                    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
                    <span>Servidores</span>
                </a>
            </li>
            @endif

            <!-- Processos LCT -->
            @if(in_array('processo', $groupPermissions))
            <li>
                <a href="{{route('processo')}}">
                    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
                    <span>Processos Licitatórios</span>
                </a>
            </li>
            @endif

            <!-- Contratos -->
            @if(array_intersect(['contratos','contratos_item'], $groupPermissions))
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
                    <span>Contratos</span>
                </a>
                <ul class="sidebar-submenu">
                    @if(in_array('contratos', $groupPermissions))
                    <li><a href="{{route('contratos')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Todos</a></li>
                    @endif
                    @if(in_array('contratos_item', $groupPermissions))
                    <li><a href="{{route('contratos_item')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Contratos Itens</a></li>
                    @endif
                </ul>
            </li>
            @endif

            <!-- Parâmetros -->
          @php
    $parametros = [
        'tipopoder' => 'Tipo Poder',
        'tipoacao' => 'Tipo Ação',
        'tiporecurso' => 'Tipo Recurso',
        'tipoempenho' => 'Tipo Empenho',
        'tipoconta' => 'Tipo de Conta',
        'tipocontrato' => 'Tipo de Contrato',
        'categoriaempenho' => 'Categoria Empenho',
        'entidade' => 'Entidade',
        'unidade' => 'Unidade',
        'nomeorgao' => 'Nome Orgão',
        'natureza' => 'Natureza Receita',
        'naturezajuridica' => 'Natureza Jurídica',
        'nomecredor' => 'Nome Credor',
        'finalidade' => 'Finalidade',
        'formaingresso' => 'Forma Ingresso',
        'formajulgamento' => 'Forma Julgamento',
        'classificacao' => 'Classificação',
        'fonterecurso' => 'Fonte Recurso',
        'situacaocargo' => 'Situação Cargo',
        'cargos' => 'Cargos',
        'classificacaocargo' => 'Classificação do Cargo',
        'classificacaoafastamento' => 'Classificação de Afastamento',
        'vinculoempregaticio' => 'Vínculo Empregatício',
        'lotacao' => 'Lotação',
        'modalidadelicitacao' => 'Modalidade Licitação',
        'tipomatricula' => 'Tipo de Matrícula'
    ];

    // Aceita tanto a chave quanto o label nas permissões
    $parametrosKeysAndLabels = array_merge(array_keys($parametros), array_values($parametros));
 
@endphp

@if(array_intersect($parametrosKeysAndLabels, $groupPermissions))
    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:file-document-outline" class="menu-icon"></iconify-icon>
            <span>Parâmetros</span>
        </a>
        <ul class="sidebar-submenu">
            @foreach($parametros as $route => $label)
                @if(in_array($route, $groupPermissions) || in_array($label, $groupPermissions))
                    <li><a href="{{route($route)}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>{{ $label }}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
@endif

            <!-- Configurações sempre visível -->
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