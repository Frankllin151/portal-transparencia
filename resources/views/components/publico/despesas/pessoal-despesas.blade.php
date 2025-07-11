@php
    use Illuminate\Support\Str;
@endphp
<br>
<br>
<div class="">
  <div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Despesas Com   Pessoal por recursos</h6>
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
            <div id="valorEmpenhoDonutChart" class="apexcharts-tooltip-z-none"></div>
          </div>
        </div>
      </div>

    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Despesas Pessoal</h5>
  </div>
  <div class="card-body">
   <div class="row mb-4">
    {{-- Total de Registros --}}
    <div class="col-md-4">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
    </div>
    {{-- Valor Total Empenhado --}}
    <div class="col-md-4">
        <p class="mb-0"><strong>Valor Empenhado (Soma): R$ {{ number_format((float)$ValorEmpenho, 2, ",", ".") }}</strong></p>
    </div>
    {{-- Valor Total Alterado --}}
    <div class="col-md-4">
        <p class="mb-0"><strong>Valor  Anulado (Soma): R$ {{ number_format((float)$ValorAlterado, 2, ",", ".") }}</strong></p>
    </div>
</div>
   <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesasPessoal" data-page-length='10'>
            <thead>
                <tr>
                    <th class="ps-8"><small>S.L</small></th>
                    <th class="ps-8"><small>Data do Empenho</small></th>
                    <th class="ps-8"><small>Número do Empenho</small></th>
                    <th class="ps-8"><small>Descrição do Órgão</small></th>
                    <th class="ps-8"><small>Detalhamento do Elemento</small></th>
                    <th class="ps-8"><small>Histórico do Empenho</small></th>
                    <th class="ps-8"><small>Nome do Credor</small></th>
                    <th class="ps-8"><small>Valor do Empenho R$</small></th>
                    <th class="ps-8"><small>Valor Liquidado R$</small></th>
                    <th class="ps-8"><small>Valor Pago R$</small></th>
                    <th class="ps-8"><small>Ver mais</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                        <td class="ps-8"><small>{{ $index + 1 }}</small></td>
                        <td class="ps-8"><small>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->numero_empenho ?? 'N/A' }}</small></td>
                       <td class="ps-8"><small>{{ Str::before($despesa->orgao ?? 'N/A', ' ') }}</small></td>
<td class="ps-8"><small>{{ Str::before($despesa->descricao_elemento ?? 'N/A', ' ') }}</small></td>
<td class="ps-8"><small>{{ Str::before($despesa->historico_empenho ?? 'N/A', ' ') }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->credor_nome ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_empenho, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_liquidado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</small></td>
                      
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