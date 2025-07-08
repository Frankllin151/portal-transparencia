<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-16">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Antes de excluir sua conta, faça o download de quaisquer dados ou informações que deseja manter.') }}
        </p>
    </header>

    {{-- Botão para abrir o modal de exclusão --}}
    <button
        type="button"
        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirmar-exclusao-usuario')"
    >
        {{ __('Excluir Conta') }}
    </button>

    {{-- Modal de Confirmação de Exclusão --}}
    <x-modal name="confirmar-exclusao-usuario" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem certeza que deseja excluir sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Por favor, digite sua senha para confirmar que deseja excluir permanentemente sua conta.') }}
            </p>

            <div class="mt-6 mb-20">
                {{-- Input para a senha --}}
                <label for="password" value="{{ __('Senha') }}" class="sr-only"></label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control radius-8 w-3/4"
                    placeholder="{{ __('Senha') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                {{-- Botão de Cancelar --}}
                <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8" x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </button>

                {{-- Botão de Excluir Conta (Confirmação) --}}
                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8 ms-3">
                    {{ __('Excluir Conta') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>