<br>
<br>
<div class="container">
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
        <p class="mb-0"><strong>Valor Total Empenhado: R$ {{ number_format((float)$ValorEmpenho, 2, ",", ".") }}</strong></p>
    </div>
    {{-- Valor Total Alterado --}}
    <div class="col-md-4">
        <p class="mb-0"><strong>Valor Total Alterado: R$ {{ number_format((float)$ValorAlterado, 2, ",", ".") }}</strong></p>
    </div>
</div>
    <table class="table bordered-table mb-0" id="dataTableDespesasPessoal" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Data do Empenho</th>
          <th>Número do Empenho</th>
          <th>Código do Elemento</th>
         
          <th>Valor Liquidado</th>
          <th>Valor Pago</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($TodosRegistroLoop as $index => $despesa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</td>
            <td>{{ $despesa->numero_empenho }}</td>
            <td>{{ $despesa->codigo_elemento }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_liquidado, 2, ',', '.') }}</td>
            <td>R$ {{ number_format((float)$despesa->valor_pago, 2, ',', '.') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">Nenhum registro de despesa encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>