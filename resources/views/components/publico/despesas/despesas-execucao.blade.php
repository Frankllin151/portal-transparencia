@php
    use Illuminate\Support\Str;
@endphp

<div  class="">
    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Despesas Execução Detalhada</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de Registros --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
      </div>

      {{-- Valor Empenho (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Empenhado: R$ {{ number_format((float)$ValorEmpenhoTotal, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Liquidado (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Liquidado: R$ {{ number_format((float)$ValorLiquidadoTotal, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Pago (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Pago: R$ {{ number_format((float)$ValorPagoTotal, 2, ",", ".") }}</strong></p>
      </div>
    </div>
<div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesasExecucao" data-page-length='10'>
            <thead>
                <tr>
                  
                    <th class="ps-8"><small>DATA DO EMPENHO</small></th>
                    <th class="ps-8"><small>NÚMERO DO EMPENHO</small></th>
                    <th class="ps-8"><small>DESCRIÇÃO DO ÓRGÃO</small></th>
                    <th class="ps-8"><small>HISTÓRICO DO EMPENHO</small></th>
                    <th class="ps-8"><small>NOME DO CREDOR</small></th>
                    <th class="ps-8"><small>VALOR DO EMPENHO R$</small></th>
                    <th class="ps-8"><small>VALOR LIQUIDADO R$</small></th>
                    <th class="ps-8"><small>VALOR PAGO R$</small></th>
                    <th class="ps-8"><small>SALDO A PAGAR R$</small></th>
                     <th class="ps-8"><small>Ver mais</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                       
                        <td class="ps-8"><small>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->numero_empenho ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->orgao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ Str::before($despesa->historico_empenho ?? 'N/A', ' ') }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->credor_nome ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_empenho, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_liquidado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</small></td>
                        <td class="ps-8">
                            <small>
                                R$ {{ number_format(max(0, (float)$despesa->valor_liquidado - (float)$despesa->valor_pago), 2, ',', '.') }}
                            </small>
                        </td>
                         <td class="ps-8"><small><a href="{{route("publico.despesas.pessoal.id", $despesa->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center"><small>Nenhum registro de execução detalhada de despesa encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>