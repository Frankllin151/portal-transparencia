<div  class="container">
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

    <table class="table bordered-table mb-0" id="dataTableDespesasExecucao" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Data do Empenho</th>
          <th>Valor Empenhado</th>
          <th>Valor Liquidado</th>
          <th>Valor Pago</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($TodosRegistroLoop as $index => $despesa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</td>
           
            <td>R$ {{ number_format((float)$despesa->valor_empenho, 2, ',', '.') }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_liquidado, 2, ',', '.') }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">Nenhum registro de execução detalhada de despesa encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>