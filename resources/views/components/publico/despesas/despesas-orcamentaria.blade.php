<div class="">

  <div class="">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Despesas Orçamentária</h6>
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
            <div id="despesasChart" class="apexcharts-tooltip-z-none"></div>
          </div>
        </div>
      </div>
    <div class="card basic-data-table">
  <div class="card-header">
   
    
 <div  class="d-flex  align-items-center justify-content-between ">
   <h5 class="mb-0">Despesas Orçamentárias</h5>  
    <div>

       <a href="javascript:void(0);" onclick="history.back();"  class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
    Voltar 
</a>
 <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
    </div>
   </div>
   

  </div>
  <div class="card-body">
   <div class="row mb-4">
  {{-- Total de resultados --}}
  <div class="col-md-3">
    <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
  </div>
  {{-- Valor Total Orçado --}}
   <div class="col-md-3">
    <p class="mb-0"><strong>Valor  Empenhado da Despesa (Soma): R$ {{ number_format((float)$ValorEmpenhoTotal, 2, ",", ".") }}</strong></p>
  </div>
  
 
 
  {{-- Valor Total Liquidado --}}
  <div class="col-md-3 mt-2">
    <p class="mb-0"><strong>Valor  Liquidado da Despesa (Soma): R$ {{ number_format((float)$ValorLiquidadoTotal, 2, ",", ".") }}</strong></p>
  </div>
  {{-- Valor Total Pago --}}
  <div class="col-md-3 mt-2">
    <p class="mb-0"><strong>Valor Pago da Despesa (Soma): R$ {{ number_format((float)$ValorPagoTotal, 2, ",", ".") }}</strong></p>
  </div>
</div>
<div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesas" data-page-length='10'>
            <thead>
                <tr>
                    
                    <th class="ps-8"><small>NÚMERO</small></th>
                    <th class="ps-8"><small>DESCRIÇÃO DA DESPESA</small></th>
                    <th class="ps-8"><small>VALOR ORÇADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR ATUALIZADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR EMPENHADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR LIQUIDADO DA DESPESA R$</small></th>
                    <th class="ps-8"><small>VALOR PAGO DA DESPESA R$</small></th>
                      <th class="ps-8"><small>Ver mais</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                     
                        <td class="ps-8"><small>{{ $despesa->codigo_acao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->descricao_programa ?? 'N/A' }}</small></td>
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
                        <td colspan="8" class="text-center"><small>Nenhum registro de despesa orçamentária encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>