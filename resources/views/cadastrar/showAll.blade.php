<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Usuários') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Usuários Cadastrados') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                {{-- Link para o cadastro de novo usuário --}}
                <a href="{{route("admin.usuario.registrer")}}" class="btn btn-primary">Novo Usuário</a>
            </li>
        </ul>
    </div>

    <br>

    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="mb-0">Lista de Usuários</h5>
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
                        <th>CPF</th>
                        <th>WhatsApp</th>
                        <th>Email</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">{{ $index + 1 }}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        {{-- Exibe a foto do usuário ou uma imagem placeholder --}}
                                        <img src="{{ $item->foto ? asset($item->foto) : 'https://placehold.co/40x40/cccccc/000000?text=User' }}"
                                             alt="{{ $item->name }}"
                                             class="flex-shrink-0 me-12 radius-8 w-40-px h-40-px object-fit-cover rounded-circle">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">{{ $item->name }}</h6>
                                    </div>
                                </td>
                               <td id="cpf-{{ $item->id }}">{{ $item->cpf ?? 'N/A' }}</td>
<td id="whatsapp-{{ $item->id }}">{{ $item->whatsapp ?? 'N/A' }}</td>
<td id="email-{{$item->id}}">{{ $item->email ?? 'N/A' }}</td>
                                <td>

                                    {{-- Botão de Visualizar (exemplo, ajuste a rota se tiver uma) --}}
                                    <a href="{{route("user.showid", $item->id)}}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" title="Visualizar">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a>
                                    {{-- Botão de Editar --}}
                                    <a href="{{route("users.edit", $item->id)}}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" title="Editar">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    {{-- Botão de Excluir --}}
                                   <a href="javascript:void(0)" {{-- Mudei o href para evitar requisição GET --}}
   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
   onclick="if(confirm('Deseja realmente deletar o usuário {{ $item->name }}?')){ document.getElementById('delete-form-{{ $item->id }}').submit(); }"
   title="Excluir">
    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
</a>
<form id="delete-form-{{ $item->id }}"
      action="{{route("users.destroy.users", $item->id)}}"
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
                            <td colspan="6" class="text-center">Nenhum usuário encontrado.</td> {{-- Colspan ajustado para 6 --}}
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    if (cpf.length === 11) {
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }
    return cpf;
}

function formatarWhatsapp(numero) {
    numero = numero.replace(/\D/g, '');
    if (numero.length === 11) {
        return numero.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (numero.length === 10) {
        return numero.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }
    return numero;
}

$(document).ready(function () {
    // Formatar todos os CPFs
    $('[id^="cpf-"]').each(function () {
        let texto = $(this).text().trim();
        if (texto !== 'N/A') {
            $(this).text(formatarCPF(texto));
        }
    });

    // Formatar todos os WhatsApps
    $('[id^="whatsapp-"]').each(function () {
        let texto = $(this).text().trim();
        if (texto !== 'N/A') {
            $(this).text(formatarWhatsapp(texto));
        }
    });
});
</script>
</x-app-layout>
