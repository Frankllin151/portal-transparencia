<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-16">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Atualize as informações do perfil e o endereço de e-mail da sua conta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-20">
            <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Nome Completo') }} <span class="text-danger-600">*</span></label>
            <input id="name" name="name" type="text" class="form-control radius-8" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder="Enter Full Name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-20">
            <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">{{ __('Email') }} <span class="text-danger-600">*</span></label>
            <input id="email" name="email" type="email" class="form-control radius-8" value="{{ old('email', $user->email) }}" required autocomplete="username" placeholder="Enter email address" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center justify-content-center gap-3">
          
            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                {{ __('Salva') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>