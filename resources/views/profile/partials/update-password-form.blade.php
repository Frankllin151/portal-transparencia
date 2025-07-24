<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-16">
            {{ __('Atualizar Senha') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Garanta que sua conta esteja usando uma senha longa e aleatória para maior segurança.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-20">
            <label for="update_password_current_password" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Senha Atual') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control radius-8" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-20">
            <label for="update_password_password" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Nova Senha') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control radius-8" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-20">
            <label for="update_password_password_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Confirmar Nova Senha') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control radius-8" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center justify-content-center gap-3">
            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">{{ __('Salvar') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>