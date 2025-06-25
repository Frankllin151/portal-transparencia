
<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Despesas') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{ route('despesas') }}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Despesas') }}
      </a>
    </li>
   
    
  </ul>
 


  
</div>
<!--table despesa-->
 <div class="card basic-data-table">
      <div class="card-header">
      
      </div>
      <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
          <thead>
            <tr>
              <th scope="col">
                <div class="form-check style-check d-flex align-items-center">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">
                    S.L
                  </label>
                </div>
              </th>
             
           
            
              <th scope="col">TIPO PODER</th>
              <th scope="col">CPF/CNPJ</th>
              <th scope="col">Valor pago</th>
              <th scope="col">DATA PAGAMENTO</th>
              <th scope="col">AÇÃO</th>
            </tr>
          </thead>
           <tbody>
        @foreach ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->tipo_poder }}</td>
            <td>{{ $item->credor_cnpj_cpf }}</td>
            <td>{{ number_format($item->valor_pago, 2, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->data_pagamento)->format('d/m/Y') }}</td>
            <td>
              <a href="{{ route('despesas.show', $item->id) }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
              </a>
              <a href="{{ route('despesas.editar', $item->id) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                <iconify-icon icon="lucide:edit"></iconify-icon>
              </a>
              <a href="javascript:void(0)"
   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
   onclick="if(confirm('Deseja realmente deletar?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }">
    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
</a>


            <form id="delete-form-{{ $item->id }}"
      action="{{ route('despesas.destroy', $item->id) }}"
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
