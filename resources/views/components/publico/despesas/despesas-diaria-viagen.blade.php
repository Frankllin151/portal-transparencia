<div class="">
    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Despesas Diárias de Viagem</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de resultados --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
      </div>

      {{-- Valor pago inicial (Valor Empenhado) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Empenhado (Inicial): R$ {{ number_format((float)$ValorEmpenho, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor_alterado --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Alterado: R$ {{ number_format((float)$ValorAlterado, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor pago atual (assumindo que $ValorPagoAtual é o valor total pago) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Pago Atual: R$ {{ number_format((float)$ValorPagoAtual, 2, ",", ".") }}</strong></p>
      </div>
    </div>
<div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesasDiarias" data-page-length='10'>
            <thead>
                <tr>
                    <th class="ps-8"><small>S.L</small></th>
                    <th class="ps-8"><small>ÓRGÃO</small></th>
                    <th class="ps-8"><small>NÚMERO DO EMPENHO</small></th>
                    <th class="ps-8"><small>DATA DO EMPENHO</small></th>
                    <th class="ps-8"><small>CREDOR</small></th>
                    <th class="ps-8"><small>CARGO DO CREDOR</small></th>
                    <th class="ps-8"><small>DESCRIÇÃO DA VIAGEM</small></th>
                    <th class="ps-8"><small>VALOR PAGO INICIAL R$</small></th>
                    <th class="ps-8"><small>VALOR ANULADO R$</small></th>
                    <th class="ps-8"><small>VALOR PAGO ATUAL R$</small></th>
                    <th class="ps-8"><small>Ver mais</small></th>
                    
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