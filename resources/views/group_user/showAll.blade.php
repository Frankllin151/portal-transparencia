<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Associações Usuário-Grupo') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Associações Usuário-Grupo') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('group_users.novo') }}" class="btn btn-primary">Nova Associação</a>
            </li>
        </ul>
    </div>

    <br>

    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="mb-0">Lista de Associações</h5>
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
                        <th>Usuário</th>
                        <th>Grupo</th>
                       
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->name ?? 'Usuário Desconhecido' }} ({{ $item->user->email ?? 'N/A' }})</td>
                                <td>{{ $item->group->name ?? 'Grupo Desconhecido' }}</td>
                              
                                <td>
                                    {{-- Não há botão de edição para associações pivô diretas --}}
                                    <a href="javascript:void(0)"
                                       class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                       onclick="if(confirm('Deseja realmente desassociar este usuário deste grupo?')){ document.getElementById('delete-form-{{ $item->user_id }}-{{ $item->group_id }}').submit(); }"
                                       title="Excluir">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </a>
                                    <form id="delete-form-{{ $item->user_id }}-{{ $item->group_id }}"
                                          action="{{ route('group_users.destroy', ['user_id' => $item->user_id, 'group_id' => $item->group_id]) }}"
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
                            <td colspan="5" class="text-center">Nenhuma associação de usuário-grupo encontrada.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
