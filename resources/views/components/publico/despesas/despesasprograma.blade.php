<div class="">
   <div class="">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Execução de despesas por órgão da administração</h6>
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
            <div id="despesasProgramacaoAcaoChart" class="apexcharts-tooltip-z-none"></div>
          </div>
        </div>
      </div>
    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Despesas por Programação e Ação</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de resultados --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
      </div>

      {{-- Valor Atualizado (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor  Atualizado da Despesa (Soma): R$ 
          {{ number_format((float)$ValorAtualizadoTotal, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Empenho (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Empenho Atualizado da Despesa (Soma): R$  {{ number_format(max(0, $valorEmpenhoAtualizado), 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Liquidado (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor  Liquidado da despesa: R$ {{ number_format((float)$ValorLiquidadoTotal, 2, ",", ".") }}</strong></p>
      </div>
    </div>

    <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesasPrograma" data-page-length='10'>
            <thead>
                <tr>
                  
                    <th class="ps-8"><small>PROGRAMA</small></th>
                    <th class="ps-8"><small>FUNÇÃO</small></th>
                    <th class="ps-8"><small>AÇÃO</small></th>
                    <th class="ps-8"><small>CÓDIGO DA DESPESA</small></th>
                    <th class="ps-8"><small>VALOR ORÇADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR ATUALIZADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>EMPENHADO ATUALIZADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>LIQUIDADO ATUALIZADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR PAGO ATUALIZADO DA DESPESA R$</small></th>
                     <td class="ps-8"><small>Ver mais</small></td>
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                       
                        <td class="ps-8"><small>{{ $despesa->descricao_programa ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->descricao_funcao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->descricao_acao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->mascara_natureza ?? $despesa->natureza_despesa ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_orcado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_atualizado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_empenho, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_liquidado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</small></td>
                     <td class="ps-8"><small><a href="{{route("publico.despesas.pessoal.id", $despesa->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                      </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center"><small>Nenhum registro de despesa por programação e ação encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>