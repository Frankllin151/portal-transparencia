<div class="container">
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

    <table class="table bordered-table mb-0" id="dataTableDespesasCredor" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Ano Exercício</th>
          <th>Entidade</th>
          <th>Nome Credor</th>
          <th>CPF/CNPJ Credor</th>
          <th>Valor Pago</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($TodosRegistroLoop as $index => $despesa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $despesa->ano_exercicio }}</td>
            <td>{{ $despesa->entidade }}</td>
            <td>{{ $despesa->credor_nome }}</td>
            <td>{{ $despesa->credor_cnpj_cpf }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">Nenhum registro de despesa por credor encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>