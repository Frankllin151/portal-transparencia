<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Usuários') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('user.lista') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
                    Voltar
                </a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <h6 class="card-title mb-0">Formulário de Edição de Usuário</h6>
            </div>
        </div>
        <div class="card-body">
            {{-- Adicionado enctype="multipart/form-data" para upload de arquivos --}}
            <form action="{{route("users.adminUpdate", $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Importante para o método PUT --}}

                <div class="row gy-4">
                    {{-- Informações Pessoais --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Dados Pessoais</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label" for="name">Nome Completo</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $user->name) }}" placeholder="Ex: João da Silva" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <input type="text" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror"
                                               value="{{ old('cpf', $user->cpf) }}" placeholder="Ex: 123.456.789-00">
                                        @error('cpf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="whatsapp">WhatsApp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control phone_with_ddd @error('whatsapp') is-invalid @enderror"
                                               value="{{ old('whatsapp', $user->whatsapp) }}" placeholder="Ex: (XX) XXXXX-XXXX">
                                        @error('whatsapp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="foto">Foto de Perfil</label>
                                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        {{-- Pré-visualização da imagem atual/nova --}}
                                        <div class="mt-3">
                                            <img id="foto-preview" src="{{ $user->foto ? asset($user->foto) : 'https://placehold.co/100x100/cccccc/000000?text=Foto' }}"
                                                 alt="Pré-visualização da Foto" class="w-100-px h-100-px object-fit-cover rounded-circle border">
                                        </div>
                                        {{-- Opção para remover a foto existente --}}
                                        @if($user->foto)
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="clear_foto" id="clear_foto" value="1">
                                                <label class="form-check-label" for="clear_foto">
                                                    Remover foto existente
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Informações de Acesso e Grupo --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Dados de Acesso e Grupo</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email', $user->email) }}" placeholder="Ex: email@exemplo.com" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="password">Nova Senha (deixe em branco para não alterar)</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                               value="" placeholder="Deixe em branco para não alterar">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="group_id">Grupo</label>
                                        <select name="group_id" id="group_id" class="form-control @error('group_id') is-invalid @enderror">
                                            <option value="">Nenhum Grupo</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}"
                                                        {{ (old('group_id', $currentUserGroupId) == $group->id) ? 'selected' : '' }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('group_id')
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
                                        Atualizar Usuário
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        {{-- Carrega jQuery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- Carrega jQuery Mask Plugin --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                // Máscara para CPF
                $('#cpf').mask('000.000.000-00', {reverse: true});

                // Máscara para WhatsApp (com adaptação para 8 ou 9 dígitos)
                var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
                $('#whatsapp').mask(SPMaskBehavior, spOptions);

                // Pré-visualização da imagem
                $('#foto').change(function() {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#foto-preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    } else {
                        // Se nenhum arquivo for selecionado, volta para a foto atual do usuário ou placeholder
                        $('#foto-preview').attr('src', '{{ $user->foto ? asset($user->foto) : 'https://placehold.co/100x100/cccccc/000000?text=Foto' }}');
                    }
                });

                // Lógica para o checkbox "Remover foto existente"
                $('#clear_foto').change(function() {
                    if ($(this).is(':checked')) {
                        $('#foto-preview').attr('src', 'https://placehold.co/100x100/cccccc/000000?text=Foto');
                        $('#foto').val(''); // Limpa o input de arquivo
                    } else {
                        // Restaura a pré-visualização da foto atual se desmarcado
                        $('#foto-preview').attr('src', '{{ $user->foto ? asset($user->foto) : 'https://placehold.co/100x100/cccccc/000000?text=Foto' }}');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
