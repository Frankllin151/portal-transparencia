<div class="">

  <div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Despesas Díarias  de viagem</h6>
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
            <div id="valorPagoDonutChart" class="apexcharts-tooltip-z-none"></div>
          </div>
        </div>
      </div>
    <div class="card basic-data-table">
  <div class="card-header">
  
    
 <div  class="d-flex  align-items-center justify-content-between ">
     <h5 class="mb-0">Despesas Diárias de Viagem</h5>
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

      {{-- Valor pago inicial (Valor Empenhado) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor pago  Inicial(Soma): R$ {{ number_format((float)$ValorEmpenho, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor_alterado --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor  Anulado (Soma): R$ {{ number_format((float)$ValorAlterado, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor pago atual (assumindo que $ValorPagoAtual é o valor total pago) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Pago Atual (Soma): R$ {{ number_format((float)$ValorPagoAtual, 2, ",", ".") }}</strong></p>
      </div>
    </div>
<div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
            <thead>
                <tr>
                    <th scope="col"  class="ps-8"><small>S.L</small></th>
                    <th scope="col"  class="ps-8"><small>ÓRGÃO</small></th>
                    <th scope="col"  class="ps-8"><small>NÚMERO DO EMPENHO</small></th>
                    <th scope="col"  class="ps-8"><small>DATA DO EMPENHO</small></th>
                    <th scope="col"  class="ps-8"><small>CREDOR</small></th>
                    <th scope="col"  class="ps-8"><small>CARGO DO CREDOR</small></th>
                    <th scope="col"  class="ps-8"><small>DESCRIÇÃO DA VIAGEM</small></th>
                    <th scope="col"  class="ps-8"><small>VALOR PAGO INICIAL R$</small></th>
                    <th scope="col"  class="ps-8"><small>VALOR ANULADO R$</small></th>
                    <th scope="col"  class="ps-8"><small>VALOR PAGO ATUAL R$</small></th>
                    <th scope="col"  class="ps-8"><small>Ver mais</small></th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                        <td class="ps-8"><small>{{ $index + 1 }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->orgao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->numero_empenho ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->credor_nome ?? 'N/A' }}</small></td>
                        {{-- Campos que agora têm mapeamento --}}
                        <td class="ps-8"><small>{{ $despesa->credor_natureza_juridica ?? 'N/A' }}</small></td> <td class="ps-8"><small>{{ $despesa->descricao_funcao ?? 'N/A' }}</small></td> {{-- Valor Pago Inicial ainda sem mapeamento direto --}}
                        <td class="ps-8"><small>R$ {{number_format((float) $despesa->valor_liquidado,2, ',', '.')}}</small></td> 
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_atualizado, 2, ',', '.') }}</small></td> <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</small></td>
                       <td class="ps-8"><small><a href="{{route("publico.despesas.pessoal.id", $despesa->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td> 
                      
                      </tr>
                        
                        @empty
                    <tr>
                        <td colspan="10" class="text-center"><small>Nenhum registro de despesa encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>