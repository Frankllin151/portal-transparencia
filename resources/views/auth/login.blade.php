<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="auth bg-base d-flex flex-wrap">  
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('assets/images/auth/auth-img.png') }}" alt="Auth Image">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ route('dashboard') }}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    </a>
                    <h4 class="mb-12">Faça login na sua conta</h4>
                    <p class="mb-32 text-secondary-light text-lg">Bem-vindo de volta! Por favor, insira seus dados</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
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
                               value="{{ old('email') }}"
                               required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Password --}}
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span> 
                            <input type="password" 
                                   name="password"
                                   id="password"
                                   class="form-control h-56-px bg-neutral-50 radius-12 @error('password') is-invalid @enderror " 
                                   placeholder="Senha"
                                   required>
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#password"></span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Remember me and Forgot Password --}}
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-neutral-300" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary-600 fw-medium">Esqueceu a senha?</a>
                            @endif
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Entrar
                    </button>

                    {{-- Social Login Divider --}}
                    <div class="mt-32 center-border-horizontal text-center">
                        <span class="bg-base z-1 px-4">Ou faça login com</span>
                    </div>
                    
                    
                    
                    {{-- Sign Up Link --}}
                    <div class="mt-32 text-center text-sm">
                        @if (Route::has('register'))
                            <p class="mb-0">Não tem uma conta? <a href="{{ route('register') }}" class="text-primary-600 fw-semibold">Cadastre-se</a></p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>