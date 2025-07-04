<div class="container">

<div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
                <h6 class="mb-2 fw-bold text-lg">Receita Prevista X Arrecada</h6>
              
              </div>
              <div class="text-end">
                <h6 class="mb-2 fw-bold text-lg">00</h6>
              
              </div>
            </div>
         <div id="receitaOrcamentariaChart"></div>
          </div>
        </div>
      </div>

  <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Receitas Orçamentárias</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de Registros --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$totalRegistro }}</strong></p>
      </div>
      {{-- Valor Orçado Atualizado Total --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Orçado Atualizado Total:R$ {{ number_format((float)$valorOrcadoAtualizado, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Valor Arrecadado Mês Total --}}
      <div class="col-md-3">
        <p class="mb-0"><strong>Valor Arrecadado Mês Total:R$ {{ number_format((float)$valorArrecadomes, 2, ",", ".") }}</strong></p>
      </div>
      {{-- Você pode adicionar mais totais aqui se precisar de um quarto, ou deixar 3 --}}
    </div>

    <table class="table bordered-table mb-0" id="dataTableReceitas" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Natureza da Receita</th>
          <th>Descricao Receita</th>
          <th>Valor Orçado</th>
         <th>Valor Atualizado</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->naturezaReceitum->codigo ?? 'N/A' }}</td>
             <td>{{$item->naturezaReceitum->descricao}}</td>
            <td>R$ {{ number_format($item->valor_orcado_inicial, 2, ',', '.') }}</td>
            <td>{{ number_format($item->valor_orcado_atualizado, 2, ',', '.') }}</td>
           
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">Nenhum registro de receita encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>