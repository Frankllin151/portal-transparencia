<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Contrato') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("contratos")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Contrato') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!----Tabela Contrato   --->   
<div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Lista de Contratos</h5>
  </div>
  <div class="card-body">
    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Contratado</th>
          <th>Tipo de Contrato</th>
          <th>Situação</th>
          <th>Valor Inicial</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->contratado }}</td>
            <td>{{ $item->tipo_contrato }}</td>
            <td>
              <span class="badge 
                @if($item->situacao == 'Ativo') bg-success 
                @elseif($item->situacao == 'Encerrado') bg-danger 
                @elseif($item->situacao == 'Pendente') bg-warning 
                @else bg-secondary @endif
                "><small>{{ $item->situacao }}</small></span>
            </td>
            <td>R$ {{ number_format($item->valor_inicial, 2, ',', '.') }}</td>
            <td>
              {{-- Botão Visualizar --}}
              <a href="{{ route('contratos.show', ["id" => $item->id]) }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" title="Visualizar">
                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
              </a>
              {{-- Botão Editar --}}
              <a href="{{ route('contratos.edit', ['id' => $item->id])}}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
                <iconify-icon icon="lucide:edit"></iconify-icon>
              </a>
              {{-- Botão Excluir --}}
              <a href="javascript:void(0)"
                 class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                 onclick="if(confirm('Deseja realmente deletar este contrato?')){ document.getElementById('delete-contrato-form-{{ $item->id }}').submit(); }"
                 title="Excluir">
                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
              </a>
              {{-- Formulário de exclusão (oculto) --}}
              <form id="delete-contrato-form-{{ $item->id }}"
                    action="{{ route('contratos.destroy', $item->id) }}"
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