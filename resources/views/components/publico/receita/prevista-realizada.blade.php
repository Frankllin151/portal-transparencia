<div class="">
     <!-- Revenue Growth start -->
      <div class="">
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
    <div class="horizontal-scroll-top-wrapper">
        <div class="horizontal-scroll-top"></div> </div>
    <div class="table-responsive-scrollable"> <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
            <thead>
                <tr>
                    <th class="ps-8"><small>Natureza da Receita</small></th>
                    <th class="ps-8"><small>Valor Orçado</small></th>
                    <th class="ps-8"><small>Valor Lançado Até o Período</small></th>
                    <th class="ps-8"><small>Valor Lançado no Período</small></th>
                    <th class="ps-8"><small>Valor Arrecadado Até o Período</small></th>
                    <th class="ps-8"><small>Valor Arrecadado No Período</small></th>
                    <th class="ps-8"><small>Valor Deduzido Até o Período</small></th>
                    <th class="ps-8"><small>Valor Deduzido No Período</small></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                <tr>
                    <td class="ps-8"><small>{{ $item->naturezaReceitum->descricao ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_orcado_inicial, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_lancado_periodo, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_lancado_mes, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_lancado_periodo ?? 0, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_arrecadado_mes ?? 0, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_deducoes_orcado ?? 0, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R${{ number_format($item->valor_deducoes_mes ?? 0, 2, ',', '.') }}</small></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>