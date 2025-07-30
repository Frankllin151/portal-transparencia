<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Permissão') }}
        </h2>
    </x-slot>

    {{-- Adicione o CSS do Select2 aqui --}}
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        {{-- Adicione estilos adicionais se o Select2 estiver a aparecer muito pequeno ou com problemas de layout --}}
        <style>
            .select2-container--default .select2-selection--multiple {
                border: 1px solid #ced4da; /* Cor da borda padrão do Bootstrap/Tailwind */
                border-radius: 0.25rem; /* Arredondamento da borda */
                min-height: 38px; /* Altura mínima para corresponder aos inputs padrão */
                padding: 0.375rem 0.75rem; /* Padding para corresponder aos inputs padrão */
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                /* Cor de fundo dos itens selecionados */
                color: #000;
            }

            .select2-container .select2-search--inline .select2-search__field{
             box-sizing: border-box;
    border: none;
    font-size: 100%;
   
    padding: 0;
    max-width: 100%;
    resize: none;
    height:23px !important;
    vertical-align: bottom;
    font-family: sans-serif;
    overflow: hidden;
    word-break: keep-all;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                color: #000;
            }
            .select2-results__option {
                color: #000;
            }
        </style>
    @endpush

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Permissões') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('permissoes') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
                    Voltar
                </a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <h6 class="card-title mb-0">Editar Permissão</h6>
            </div>
        </div>
        <div class="card-body">
            {{-- O método do formulário será POST, mas Laravel usará PUT/PATCH com @method('PUT') --}}
            <form action="{{ route('permissoes.update', $data->id) }}" method="POST">
                @csrf {{-- Token CSRF para segurança --}}
                @method('PUT') {{-- Indica que esta é uma requisição PUT para atualização --}}

                <div class="row gy-4">
                    {{-- Informações da Permissão --}}
                    <div class="col-md-8 mx-auto"> {{-- Centraliza o card e o torna um pouco maior --}}
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Detalhes da Permissão</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label" for="group_id">Grupo</label>
                                        <select name="group_id" id="group_id" class="form-control @error('group_id') is-invalid @enderror" required>
                                            <option value="">Selecione um Grupo</option>
                                            @foreach($groups as $group)
                                                {{-- Pré-seleciona o grupo da permissão existente --}}
                                                <option value="{{ $group->id }}" data-group-name="{{ $group->name }}" {{ (old('group_id', $data->group_id) == $group->id) ? 'selected' : '' }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('group_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label" for="key">Chave da Permissão (Rota)</label>
                                        {{-- Adicionamos o atributo 'multiple' e mudamos o nome para 'key[]' --}}
                                        <select name="key[]" id="key" class="form-control @error('key') is-invalid @enderror" multiple="multiple" required>
                                            {{-- IMPORTANTE: Certifique-se de que $keysRoutes esteja disponível nesta view.
                                                 Se não estiver, você precisará passá-lo do seu controlador 'edit'.
                                                 Assumimos que $data->key é um array de chaves selecionadas ou pode ser convertido. --}}
                                            @foreach($keysRoutes as $category => $keys)
                                                @if(is_array($keys))
                                                    <optgroup label="{{ ucfirst($category) }}">
                                                        @foreach($keys as $key_route)
                                                            {{-- Pré-seleciona as chaves da permissão existente --}}
                                                            <option value="{{ $key_route }}" {{ in_array($key_route, old('key', json_decode($data->key) ?? [])) ? 'selected' : '' }}>
                                                                {{ ucfirst(str_replace('_', ' ', $key_route)) }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    {{-- Caso haja chaves fora de categorias (diretamente no array $keysRoutes) --}}
                                                    <option value="{{ $keys }}" {{ in_array($keys, old('key', json_decode($data->key) ?? [])) ? 'selected' : '' }}>
                                                        {{ ucfirst(str_replace('_', ' ', $keys)) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Botões de Ação --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-end gap-3">
                                    <button type="button" class="btn btn-secondary" onclick="history.back()">
                                        <iconify-icon icon="mynaui:arrow-left" class="me-1"></iconify-icon>
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <iconify-icon icon="material-symbols:save" class="me-1"></iconify-icon>
                                        Atualizar Permissão
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Adicione o jQuery e o JS do Select2 aqui --}}
    @push('scripts')
        {{-- Carregue jQuery primeiro --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- Depois carregue Select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inicializa o Select2 para o campo de chaves
                $('#key').select2({
                    placeholder: 'Selecione chaves', // Alterado aqui!
                    allowClear: true // Permite limpar a seleção
                });

                // Lógica para selecionar todas as rotas se o grupo "Administrador" for selecionado
                $('#group_id').on('change', function() {
                    const selectedOption = $(this).find('option:selected');
                    const groupName = selectedOption.data('group-name'); // Obtém o nome do grupo do atributo data-

                    if (groupName && groupName.toLowerCase() === 'administrador') {
                        // Seleciona todas as opções no Select2
                        const allKeys = $('#key option').map(function() {
                            return $(this).val();
                        }).get();
                        $('#key').val(allKeys).trigger('change'); // Define os valores e dispara o evento 'change' do Select2
                    } else {
                        // Limpa a seleção se outro grupo for escolhido
                        $('#key').val(null).trigger('change');
                    }
                });

                // Dispara o evento 'change' no carregamento da página caso já haja um grupo selecionado (para old('group_id'))
                // Isso garante que a lógica de "Administrador" seja aplicada se o grupo já estiver selecionado ao carregar a página.
                $('#group_id').trigger('change');
            });
        </script>
    @endpush
</x-app-layout>
