<div class="container">


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
        <p class="mb-0"><strong>Valor Orçado Atualizado Total: R$ {{ number_format((float)$totalValorOrcadoAtualizado, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Total Valor Lançado Período --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Lançado no Período Total: R$ {{ number_format((float)$totalValorLancadoPeriodo, 2, ",", ".") }}</strong></p>
      </div>
    </div>

    <table class="table bordered-table mb-0" id="dataTableReceitaDiaria" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Natureza da Receita</th>
          <th>Data Receita</th>
          <th>Valor Orçado</th>
          <th>Valor Atualizado</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($receitaOrcamentaria as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->naturezaReceitum->descricao ?? 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
            <td>R$ {{ number_format((float)$item->valor_orcado_inicial, 2, ',', '.') }}</td>
            <td>R$ {{ number_format((float)$item->valor_orcado_atualizado, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">Nenhum registro de receita diária encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>