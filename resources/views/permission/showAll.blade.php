<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Permissões') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Permissões') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('permissoes.novo') }}" class="btn btn-primary radius-8">Novo</a>
            </li>
             <a href="{{ route('grupos') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    
                    Voltar
                </a>
        </ul>
    </div>

    <br>

    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="mb-0">Lista de Permissões</h5>
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
                        <th>Grupo</th> {{-- Alterado para Grupo --}}
                        <th>Chave (Rota)</th> {{-- Alterado para Chave (Rota) --}}
                        <th>Criado Em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->group->name ?? 'N/A' }}</td> {{-- Acessa o nome do grupo --}}
                                <td>{{ $item->key }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('permissoes.edit', $item->id) }}"
                                       class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                       title="Editar">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                       onclick="if(confirm('Deseja realmente deletar esta permissão?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                                       title="Excluir">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}"
                                          action="{{ route('permissoes.destroy', $item->id) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr data-no-datatable id="noDatatables">
                            <td colspan="5" class="text-center">Nenhum registro de permissão encontrado.</td> {{-- Colspan ajustado para 5 --}}
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>