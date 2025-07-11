<div class="">


    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Receita Orçamentária Diária</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Quantidade de Dados --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$quantidadeDados }}</strong></p>
      </div>
      {{-- Total Valor Orçado Atualizado --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Orçado Atualizado (Soma): R$ {{ number_format((float)$totalValorOrcadoAtualizado, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Total Valor Lançado Período --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Lançado no Período (Soma): R$ {{ number_format((float)$totalValorLancadoPeriodo, 2, ",", ".") }}</strong></p>
      </div>
    </div>

    <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableReceitaDiaria" data-page-length='10'>
            <thead>
                <tr>
                   
                    <th class="ps-8"><small>Natureza da Receita</small></th>
                    <th class="ps-8"><small>Data da Receita</small></th>
                    <th class="ps-8"><small>Valor Orçado Inicial R$</small></th>
                    <th class="ps-8"><small>Valor Orçado Atualizado R$</small></th>
                    <th class="ps-8"><small>Valor Arrecadado da Receita No Período R$</small></th>
                    <th class="ps-8"><small>Valor Arrecadado da Receita Até o Período R$</small></th>
                     <th class="ps-8"><small>Ver mais</small></th>
                   
                  </tr>
            </thead>
            <tbody>
                @forelse ($receitaOrcamentaria as $index => $item)
                    <tr>
                       
                        <td class="ps-8"><small>{{ $item->naturezaReceitum->descricao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_orcado_inicial, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_orcado_atualizado, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_arrecadado_mes, 2, ',', '.') }}</small></td>
                        <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_arrecadado_acumulado, 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small><a href="{{route("receita.prevista.id.realizada", $item->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                      </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center"><small>Nenhum registro de receita diária encontrado.</small></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>