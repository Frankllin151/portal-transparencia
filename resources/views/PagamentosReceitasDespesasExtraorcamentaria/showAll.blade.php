<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Pagamentos Receita Despesas') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('pagamentosdespesasreceita')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __(' Pagamentos Receita Despesas') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!--Tabela  Pagamentos Receita Depesas extra orçamentaria -->
<div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Pagamentos de Receitas e Despesas Extraorçamentárias</h5>
  </div>
  <div class="card-body">
    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
      <thead>
        <tr>
          <th>
            <div class="form-check style-check d-flex align-items-center">
              <input class="form-check-input" type="checkbox">
              <label class="form-check-label">S.L</label>
            </div>
          </th>
          <th>CPF/CNPJ Beneficiário</th>
          <th>Número do Pagamento</th>
          <th>Valor</th>
          <th>Data do Pagamento</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        {{-- Itera sobre os dados passados do controlador --}}
        @foreach ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            {{-- Exibe o CPF/CNPJ do beneficiário --}}
            <td>{{ $item->cpf_cnpj_beneficiario }}</td>
            {{-- Exibe o número do pagamento --}}
            <td>{{ $item->numero_pagamento }}</td>
            {{-- Exibe o valor formatado como moeda brasileira --}}
            <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
            {{-- Exibe a data do pagamento formatada como dd/mm/aaaa --}}
            <td>{{ \Carbon\Carbon::parse($item->data_pagamento)->format('d/m/Y') }}</td>
            <td>
              {{-- Links de ação para Visualizar, Editar e Excluir --}}
              <a href="{{route("pagamentosdespesasreceita.show", $item->id)}}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" title="Visualizar">
                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
              </a>
              <a href="{{route("pagamentosdespesasreceita.edit", $item->id)}}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
                <iconify-icon icon="lucide:edit"></iconify-icon>
              </a>
              <a href="javascript:void(0)"
                 class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                 onclick="if(confirm('Deseja realmente deletar?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                 title="Excluir">
                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
              </a>
              <form id="delete-form-{{ $item->id }}"
                    action="{{route('pagamentosdespesasreceita.destroy', $item->id)}}"
                    method="POST"
                    style="display: none;">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</x-app-layout>
