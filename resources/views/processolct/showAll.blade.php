<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Processos Licitatorios') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('processo')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Processos Licitatorios') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!--Tabela  processo licitatorios-->
<div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Processos Licitatórios</h5>
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
          <th>Processo</th>
          <th>Modalidade</th>
          <th>Objeto</th>
          <th>Situação</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->numero_processo }}/{{ $item->ano_processo }}</td>
            <td>{{ $item->modalidade }}</td>
            <td>{{ $item->tipo_objeto }}</td>
            <td>{{ $item->situacao }}</td>
            <td>
              <a href="{{route('processo.show', ["id" => $item->id]) }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" title="Visualizar">
                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
              </a>
              <a href="{{route('processo.edit', ['id' => $item->id])}}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
                <iconify-icon icon="lucide:edit"></iconify-icon>
              </a>
              <a href="javascript:void(0)"
                 class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                 onclick="if(confirm('Deseja realmente deletar?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                 title="Excluir">
                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
              </a>
              <form id="delete-form-{{ $item->id }}"
                    action="{{route('processo.delete', $item->id)}}"
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
