<div class="">
<br>
<div class="">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Receita Orçamentárias</h6>
              
              </div>
              <div class="text-end">
                <h6 class="mb-2 fw-bold text-lg">R${{ number_format((float)$valorOrcadoAtualizado, 2, ",", ".") }}</h6>
              
              </div>
            </div>
         <div id="receitaOrcamentariaChart"></div>
          </div>
        </div>
      </div>

  <div class="card basic-data-table">
  <div class="card-header">
  

 <div  class="d-flex  align-items-center justify-content-between ">
    <h5 class="mb-0">Receitas Orçamentárias</h5>
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
      {{-- Total de Registros --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$totalRegistro }}</strong></p>
      </div>
      {{-- Valor Orçado Atualizado Total --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Orçado Atualizado (Soma):R$ {{ number_format((float)$valorOrcadoAtualizado, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Valor Arrecadado Mês Total --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Arrecadado Mês (Soma):R$ {{ number_format((float)$valorArrecadomes, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Você pode adicionar mais totais aqui se precisar de um quarto, ou deixar 3 --}}
    </div>

    <div class="table-responsive-scrollable">
       <table class="table bordered-table mb-0" id="dataTableReceitaDiaria" data-page-length='10'>
    <thead>
        <tr>
            <th class="ps-8"><small>Natureza da Receita</small></th>
            <th class="ps-8"><small>Data da Receita</small></th>
            <th class="ps-8"><small>Valor Orçado Inicial R$</small></th>
            <th class="ps-8"><small>Valor Orçado Atualizado R$</small></th>
            {{-- Nova coluna adicionada para Valor Lançado Mês --}}
            <th class="ps-8"><small>Valor Lançado Mês R$</small></th>
            <th class="ps-8"><small>Valor Arrecadado da Receita No Período R$</small></th>
            <th class="ps-8"><small>Valor Arrecadado da Receita Até o Período R$</small></th>
            <th class="ps-8"><small>Ver mais</small></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $index => $item)
            <tr>
                <td class="ps-8"><small>{{ $item->naturezaReceitum->descricao ?? 'N/A' }}</small></td>
                <td class="ps-8"><small>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</small></td>
                <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_orcado_inicial, 2, ',', '.') }}</small></td>
                <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_orcado_inicial, 2, ',', '.') }}</small></td>
                {{-- Dados para a nova coluna Valor Lançado Mês --}}
                <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_lancado_mes, 2, ',', '.') }}</small></td>
                <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_arrecadado_mes, 2, ',', '.') }}</small></td>
                <td class="ps-8"><small>R$ {{ number_format((float)$item->valor_arrecadado_acumulado, 2, ',', '.') }}</small></td>
                <td class="ps-8"><small><a href="{{route("receita.prevista.id.realizada", $item->id)}}">
                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                </a></small></td>
            </tr>
        @empty
            <tr>
                {{-- Colspan ajustado para 8 colunas (7 originais + 1 nova) --}}
                <td colspan="8" class="text-center"><small>Nenhum registro de receita diária encontrado.</small></td>
            </tr>
        @endforelse
    </tbody>
</table>
    </div>
  </div>
</div>
</div>