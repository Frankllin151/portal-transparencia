<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Compras Diretas') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Listagem de Compras Diretas') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                {{-- Link para o cadastro de nova compra direta --}}
                <a href="{{ route('comprasdiretas.create') }}" class="btn btn-primary">Novo</a>
            </li>
        </ul>
    </div>

    <!--- Tabela de Compras Diretas ---->
    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="mb-0">Compras Diretas</h5>
        </div>
        <div class="card-body table-responsive-scrollable">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th>
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">S.L</label>
                            </div>
                        </th>
                        <th>Código</th>
                        <th>Centro de Custos</th>
                        <th>Data da Compra</th>
                        <th>Objeto</th>
                        <th>Fornecedor</th>
                        <th>CNPJ/CPF Fornecedor</th>
                        <th>Fundamentação</th>
                        <th>Tipo</th>
                        <th>Valor (R$)</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->centro_de_custos }}</td>
                            <td>{{ $item->data_da_compra->format('d/m/Y') }}</td> {{-- Formata a data --}}
                            <td>{{ $item->objeto }}</td>
                            <td>{{ $item->fornecedor }}</td>
                            <td>{{ $item->cnpj_cpf_fornecedor }}</td>
                            <td>{{ $item->fundamentacao }}</td>
                            <td>{{ $item->tipo }}</td>
                            <td>{{ number_format($item->valor_rs, 2, ',', '.') }}</td> {{-- Formata o valor monetário --}}
                            <td>
                                <a href="{{ route('comprasdiretas.show', ["id" => $item->id]) }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" title="Visualizar">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="{{ route('comprasdiretas.edit', ['id' => $item->id]) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                   onclick="if(confirm('Deseja realmente deletar esta compra direta?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                                   title="Excluir">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                      action="{{ route('comprasdiretas.destroy', $item->id) }}"
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
