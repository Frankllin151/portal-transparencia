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
                    <h4 class="mb-12">Esqueceu sua senha?</h4>
                    <p class="mb-32 text-secondary-light text-lg">Sem problemas! Informe seu e-mail e enviaremos um link para você redefinir sua senha.</p>
                </div>
                
                <form method="POST" action="{{ route('password.email') }}">
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
                     <x-auth-session-status class="mb-4" :status="session('status')" />
                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Enviar Link de Redefinição de Senha
                    </button>
                    
                    {{-- Back to login link (Optional but recommended) --}}
                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Lembrou da senha? <a href="{{ route('login') }}" class="text-primary-600 fw-semibold">Faça login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>