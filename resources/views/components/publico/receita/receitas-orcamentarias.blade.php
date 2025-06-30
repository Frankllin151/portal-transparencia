<div class="container">
   <div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Receitas Orçamentária</h6>
              
              </div>
              <div class="text-end">
                <h6 class="mb-2 fw-bold text-lg">valor</h6>
                <span class="bg-success-focus ps-12 pe-12 pt-2 pb-2 rounded-2 fw-medium text-success-main text-sm">%valor</span>
              </div>
            </div>
            <div id="revenue-chart" class="mt-28"></div>
          </div>
        </div>
      </div>
<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
      @foreach ($receitaOrcamentaria as $receita)
    
        <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
           <div  class="border border-secondary p-3 rounded">
            <p>Natureza</p>
              <small>Código:{{$receita->naturezaReceitum->codigo}}</small> <br>
             <small>Descrição:{{$receita->naturezaReceitum->descricao}}</small>
           </div>
            <p class="fw-medium text-primary-light mb-1">Valor Orçado Inicial</p>
            <h6 class="mb-0">{{number_format($receita->valor_orcado_inicial, 2, ",",  ".")}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endforeach
</div>

</div>