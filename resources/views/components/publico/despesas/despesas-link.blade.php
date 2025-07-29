<div class="container">
  <div  class="d-flex  align-items-center justify-content-end ">
   
    <div>

       <a href="javascript:void(0);" onclick="history.back();"  class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
    Voltar 
</a>

    </div>
   </div>
  <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4 py-3">
    
    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light mb-1">Despesas com Pessoal</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:account-cash" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('publico.despesas.pessoal')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light mb-1">Despesas de Diárias e Viagens</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:airplane-clock" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('publico.despesas.diario.viagens')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light mb-1">Despesas Orçamentárias</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:finance" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('publico.despesas.orcamentaria')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light mb-1">Despesas por Credor</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:account-search" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('despesas.credor')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light ">Despesas por Programas  <br> e Ações</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:chart-bar-stacked" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('publico.despesas.acoes')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-none border bg-gradient-start-1 h-100 card-custom-hover">
        <div class="card-body p-20">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
              <p class="fw-bold text-primary-light mb-1">Execução Detalhada de  <br> Despesas</p>
              <h6 class="mb-0"></h6>
            </div>
            <div class="w-50-px h-50-px btn-warning-600 rounded-circle d-flex justify-content-center align-items-center">
              <iconify-icon icon="mdi:file-document-multiple" class="text-white text-2xl mb-0"></iconify-icon>
            </div>
          </div>
          <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
            <a href="{{route('publico.despesas.execucao.detalhada')}}" class="text-primary-main">Ver Detalhes</a>
          </p>
        </div>
      </div>
    </div>

  </div>
</div>
