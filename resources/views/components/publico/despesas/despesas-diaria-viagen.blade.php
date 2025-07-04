<div class="container">
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

    <table class="table bordered-table mb-0" id="dataTableDespesasDiarias" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Data do Empenho</th>
          <th>Órgão</th>
          <th>Número do Empenho</th>
          <th>Descrição do Programa</th>
          <th>Valor Pago Atual</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($TodosRegistroLoop as $index => $despesa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</td>
            <td>{{ $despesa->orgao }}</td>
            <td>{{ $despesa->numero_empenho }}</td>
            <td>{{ $despesa->descricao_programa }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="10" class="text-center">Nenhum registro de despesa de viagem encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>