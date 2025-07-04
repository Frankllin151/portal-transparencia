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
              
              </div>
            </div>
            <div id="barChart" class="barChart"></div>
          </div>
        </div>
      </div>


      <!-- front-end publica Receita X Realizada -->
      <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Detalhes da Receita</h5>
  </div>
  <div class="card-body">
    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Natureza da Receita</th>
          <th>Valor Orçado (Inicial)</th>
          <th>Valor Lançado Até o Período</th>
          <th>Valor Lançado no Período</th>
       
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->naturezaReceitum->descricao ?? 'N/A' }}</td> {{-- Acessando a descrição da natureza --}}
            <td>{{ number_format($item->valor_orcado_inicial, 2, ',', '.') }}</td>
            <td>{{ number_format($item->valor_lancado_periodo, 2, ',', '.') }}</td> {{-- Assumindo que este campo representa 'Valor Lançado Até o Período' --}}
            <td>{{ number_format($item->valor_lancado_mes, 2, ',', '.') }}</td> {{-- 'Valor Lançado no Período' --}}
       
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>