<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-16">
            {{ __('Informações do perfil') }}
        </h2>
      
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="card h-100 p-0 radius-12">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    <div class="col-xxl-12"> {{-- Ajustado a largura para melhor visualização --}}
                        <div class="card border">
                            <div class="card-body">
                                <h6 class="text-md text-primary-light mb-16">Imagem de Perfil</h6>

                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                            <input type='file' id="imageUpload" name="foto" accept=".png, .jpg, .jpeg" hidden>
                                            <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('{{ $user->foto ? asset($user->foto) : asset('assets/images/user.png') }}');"> </div> {{-- Adicionado exibição da foto atual --}}
                                        </div>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                                </div>
                                <div class="mb-20">
                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Nome Completo') }} <span class="text-danger-600">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control radius-8" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder="Digite o Nome Completo" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div class="mb-20">
                                    <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Email') }} <span class="text-danger-600">*</span></label>
                                    <input id="email" name="email" type="email" class="form-control radius-8" value="{{ old('email', $user->email) }}" required autocomplete="username" placeholder="Digite o endereço de e-mail" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800">
                                                {{ __('Seu endereço de e-mail não foi verificado.') }}

                                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                    {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-20">
                                    <label for="cpf" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('CPF') }}</label>
                                    <input id="cpf" name="cpf" type="text" class="form-control radius-8" value="{{ old('cpf', $user->cpf) }}" placeholder="Digite o CPF" maxlength="14" /> {{-- Máscara de CPF pode ser adicionada com JS --}}
                                    <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                                </div>

                                <div class="mb-20">
                                    <label for="whatsapp" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('WhatsApp') }}</label>
                                    <input id="whatsapp" name="whatsapp" type="text" class="form-control radius-8" value="{{ old('whatsapp', $user->whatsapp) }}" placeholder="Digite o número do WhatsApp" maxlength="20" /> {{-- Máscara de telefone pode ser adicionada com JS --}}
                                    <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
                                </div>

                                {{-- Removidos os campos 'Department', 'Designation' e 'Description' conforme sua necessidade --}}

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        {{ __('Salvar') }}
                                    </button>

                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600"
                                        >{{ __('Salvo.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
{{-- Script para pré-visualização da imagem --}}
<script>
    document.getElementById('imageUpload').onchange = function(evt) {
        const [file] = evt.target.files;
        if (file) {
            document.getElementById('imagePreview').style.backgroundImage = 'url(' + URL.createObjectURL(file) + ')';
        }
    }

   
    // Funções de Formatação (as mesmas que você já tinha)
function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove tudo que não é dígito
    if (cpf.length === 11) {
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }
    return cpf; // Retorna sem formatação se não tiver 11 dígitos
}

function formatarWhatsapp(numero) {
    numero = numero.replace(/\D/g, ''); // Remove tudo que não é dígito
    if (numero.length > 11) { // Limita para no máximo 11 dígitos
        numero = numero.substring(0, 11);
    }

    if (numero.length === 11) {
        return numero.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (numero.length === 10) {
        return numero.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }
    return numero; // Retorna sem formatação se não tiver 10 ou 11 dígitos
}

// ------------------------------------------------------------------
// Funções de Máscara para INPUTs
// ------------------------------------------------------------------

function applyCpfMask(event) {
    const input = event.target;
    let value = input.value;

    // Salva a posição atual do cursor
    const originalSelectionStart = input.selectionStart;
    const originalSelectionEnd = input.selectionEnd;

    // Remove tudo que não é número antes de formatar
    const cleanedValue = value.replace(/\D/g, '');
    const formattedValue = formatarCPF(cleanedValue);

    input.value = formattedValue;

    // Ajusta a posição do cursor
    // Isso é um pouco mais complexo para máscaras dinâmicas, mas para CPF fixo é mais simples.
    // Para CPF, como a máscara é fixa (exceto se menos de 11), a posição tende a se manter.
    let newSelectionStart = originalSelectionStart + (formattedValue.length - value.length);
    let newSelectionEnd = originalSelectionEnd + (formattedValue.length - value.length);

    // Garante que o cursor não vá além do final da string
    if (newSelectionStart > formattedValue.length) newSelectionStart = formattedValue.length;
    if (newSelectionEnd > formattedValue.length) newSelectionEnd = formattedValue.length;

    // Impede que o cursor vá para trás ao deletar, ou pule para frente de caracteres de máscara adicionados
    if (originalSelectionStart === value.length && event.inputType === 'insertText') {
        // Se o cursor estava no final e algo foi inserido, coloque no novo final
        input.setSelectionRange(formattedValue.length, formattedValue.length);
    } else if (originalSelectionStart === originalSelectionEnd) {
        // Para seleções de ponto único (digitando ou navegando)
        // Move o cursor para o mesmo ponto relativo na string formatada
        input.setSelectionRange(newSelectionStart, newSelectionEnd);
    }
    // Caso contrário, (seleções de múltiplos caracteres ou deletes),
    // o navegador geralmente já lida com o cursor razoavelmente bem.
}

function applyWhatsappMask(event) {
    const input = event.target;
    let value = input.value;

    // Remove tudo que não é número antes de formatar
    const cleanedValue = value.replace(/\D/g, '');
    const formattedValue = formatarWhatsapp(cleanedValue);

    // Salva a posição do cursor antes de atualizar o valor
    const originalSelectionStart = input.selectionStart;
    const originalSelectionEnd = input.selectionEnd;

    input.value = formattedValue;

    // Ajusta a posição do cursor
    // Esta é a parte mais chata do JS Vanilla para máscaras dinâmicas.
    // O ideal seria calcular o deslocamento exato com base nos caracteres de máscara adicionados/removidos.
    // Para simplificar, vamos tentar manter o cursor em uma posição razoável.
    let cursorPosition = originalSelectionStart;

    if (event.inputType === 'deleteContentBackward' || event.inputType === 'deleteContentForward') {
        // Ao deletar, tente manter o cursor onde estava antes da formatação
        input.setSelectionRange(cursorPosition, cursorPosition);
    } else {
        // Ao digitar, posicione o cursor no final, ou perto do caractere digitado
        // A lógica do jQuery Mask é bem mais avançada aqui.
        // Para JS Vanilla, para uma experiência mais simples, muitas vezes
        // colocamos o cursor no final após a formatação.
        input.setSelectionRange(formattedValue.length, formattedValue.length);
    }
    // Uma solução mais robusta para o cursor exigiria mais código e rastreamento dos caracteres de máscara.
    // Para máscaras dinâmicas como telefone, o `setSelectionRange(formattedValue.length, formattedValue.length)`
    // é uma solução comum para manter o cursor no final.
}

// ------------------------------------------------------------------
// Inicialização ao carregar o DOM
// ------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const cpfInput = document.getElementById('cpf');
    const whatsappInput = document.getElementById('whatsapp');

    if (cpfInput) {
        // Aplica a máscara no carregamento inicial do valor
        cpfInput.value = formatarCPF(cpfInput.value);
        // Adiciona um listener para o evento 'input' (disparado ao digitar)
        cpfInput.addEventListener('input', applyCpfMask);
    }

    if (whatsappInput) {
        // Aplica a máscara no carregamento inicial do valor
        whatsappInput.value = formatarWhatsapp(whatsappInput.value);
        // Adiciona um listener para o evento 'input' (disparado ao digitar)
        whatsappInput.addEventListener('input', applyWhatsappMask);
    }
});

</script>