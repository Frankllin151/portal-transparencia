<div class="container">
     <!-- Revenue Growth start -->
      <div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Receita Prevista X Realizada</h6>
              
              </div>
              <div class="text-end">
                <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>
                <span class="bg-success-focus ps-12 pe-12 pt-2 pb-2 rounded-2 fw-medium text-success-main text-sm">%{{$percentualValor}}</span>
              </div>
            </div>
            <div id="revenue-chart" class="mt-28"></div>
          </div>
        </div>
      </div>


      <!-- front-end publica Receita X Realizada -->
      <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Orçado Inicial</p>
            <h6 class="mb-0">{{ $totalValorOrcadoInicial }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Orçado Atualizado</p>
            <h6 class="mb-0">{{ $totalValorOrcadoAtualizado }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Total Deduções Orçado</p>
            <h6 class="mb-0">{{ $totalValorDeducoesOrcado }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Arrecadado Mês</p>
            <h6 class="mb-0">{{ $totalValorArrecadadoMes }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Arrecadado Acumulado</p>
            <h6 class="mb-0">{{ $totalValorArrecadadoAcumulado }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Total Deduções Mês</p>
            <h6 class="mb-0">{{ $totalValorDeducoesMes }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Lançado Mês</p>
            <h6 class="mb-0">{{ $totalValorLancadoMes }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Valor Lançado Período</p>
            <h6 class="mb-0">{{ $totalValorLancadoPeriodo }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Percentual Valor</p>
            <h6 class="mb-0">%{{ $percentualValor }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
