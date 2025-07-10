<div class="">
    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Despesas por Credor</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de resultados --}}
      <div class="col-md-4">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
      </div>

      {{-- Valor Pago (Total) --}}
      <div class="col-md-4">
        <p class="mb-0"><strong>Valor Pago (Total): R$ {{ number_format((float)$ValorPagoTotal, 2, ",", ".") }}</strong></p>
      </div>
    </div>
 <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableDespesasCredor" data-page-length='10'>
            <thead>
                <tr>
                    <th class="ps-8"><small>S.L</small></th>
                    <th class="ps-8"><small>ANO</small></th>
                    <th class="ps-8"><small>ENTIDADE</small></th>
                    <th class="ps-8"><small>NOME DO CREDOR</small></th>
                    <th class="ps-8"><small>CPF/CNPJ CREDOR</small></th>
                    <th class="ps-8"><small>VALOR PAGO R$</small></th>
                    <th class="ps-8"><small>Ver mais</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($TodosRegistroLoop as $index => $despesa)
                    <tr>
                        <td class="ps-8"><small>{{ $index + 1 }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->ano_exercicio ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->entidade ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->credor_nome ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $despesa->credor_cnpj_cpf ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</small></td>
                   <td class="ps-8"><small><a href="{{route("publico.despesas.pessoal.id", $despesa->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                      </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"><small>Nenhum registro de despesa por credor encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>