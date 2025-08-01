{{-- filepath: /home/frankllin/docker/portal-transparencia/resources/views/auth/reset-password.blade.php --}}
<x-guest-layout>
    <section class="auth bg-base d-flex flex-wrap">  
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('assets/images/auth/auth-img.jpg') }}" alt="Auth Image">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ route('dashboard') }}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo">
                    </a>
                    <h4 class="mb-12">Redefinir senha</h4>
                    <p class="mb-32 text-secondary-light text-lg">
                        Digite sua nova senha abaixo para redefinir o acesso à sua conta.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Token de redefinição -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control h-56-px bg-neutral-50 radius-12 @error('email') is-invalid @enderror"
                               placeholder="Email"
                               value="{{ old('email', $request->email) }}"
                               required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nova senha --}}
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control h-56-px bg-neutral-50 radius-12 @error('password') is-invalid @enderror"
                                   placeholder="Nova senha"
                                   required autocomplete="new-password">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#password"></span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmar nova senha --}}
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="form-control h-56-px bg-neutral-50 radius-12 @error('password_confirmation') is-invalid @enderror"
                                   placeholder="Confirme a nova senha"
                                   required autocomplete="new-password">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#password_confirmation"></span>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botão de redefinir --}}
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Redefinir Senha
                    </button>

                    {{-- Link para login --}}
                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Lembrou da senha? <a href="{{ route('login') }}" class="text-primary-600 fw-semibold">Faça login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-password').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                const input = document.querySelector(this.getAttribute('data-toggle'));
                if (input) {
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('ri-eye-line');
                        this.classList.add('ri-eye-off-line');
                    } else {
                        input.type = 'password';
                        this.classList.remove('ri-eye-off-line');
                        this.classList.add('ri-eye-line');
                    }
                }
            });
        });
    });
    </script>
</x-guest-layout>