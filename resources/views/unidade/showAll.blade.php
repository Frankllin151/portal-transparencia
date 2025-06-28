<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Unidade') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
     
    <a href="{{route("unidade.novo")}}" class="btn btn-primary ">Novo</a>
    </li>
   
    
  </ul>
</div>


<div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Entidade</h5> {{-- Título da tabela ajustado --}}
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

          <th>Nome</th>
          <th>Criado Em</th> {{-- Adicionando Created At --}}
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @if ($data->count())
    @foreach ($data as $index => $item)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
        <td>
          <a href="{{route("unidade.edit", $item->id)}}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
            <iconify-icon icon="lucide:edit"></iconify-icon>
          </a>
          <a href="javascript:void(0)"
             class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
             onclick="if(confirm('Deseja realmente deletar?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
             title="Excluir">
            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
          </a>
          <form id="delete-form-{{ $item->id }}"
                action="{{route("unidade.destroy" ,  $item->id)}}" {{-- Rota de delete --}}
                method="POST"
                style="display: none;">
            @csrf
            @method('DELETE')
          </form>
        </td>
      </tr>
    @endforeach
  @else
    <tr>
      <td colspan="4" class="text-center">Nenhum registro encontrado em Unidade.</td>
    </tr>
  @endif
      </tbody>
    </table>
  </div>
</div>
</x-app-layout>
