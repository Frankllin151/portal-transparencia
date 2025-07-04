<div class="container">
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
        <p class="mb-0"><strong>Valor Total Atualizado: R$ {{ number_format((float)$ValorAtualizadoTotal, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Empenho (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Empenhado: R$ {{ number_format((float)$ValorEmpenhoTotal, 2, ",", ".") }}</strong></p>
      </div>

      {{-- Valor Liquidado (Total) --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Total Liquidado: R$ {{ number_format((float)$ValorLiquidadoTotal, 2, ",", ".") }}</strong></p>
      </div>
    </div>

    <table class="table bordered-table mb-0" id="dataTableDespesasPrograma" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Programa (Objetivo)</th>
          <th>Descrição Função</th>
          <th>Tipo de Ação</th>
          <th>Valor Pago</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($TodosRegistroLoop as $index => $despesa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $despesa->objetivo_programa }}</td>
            <td>{{ $despesa->descricao_funcao ?? 'Não informado' }}</td>
            <td>{{ $despesa->tipo_acao_programa }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="9" class="text-center">Nenhum registro de despesa por programação e ação encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>