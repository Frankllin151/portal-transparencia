<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Nova Forma de Ingresso') }} {{-- Título do cabeçalho ajustado --}}
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Forma Ingresso') }}</h6> {{-- Título da seção ajustado --}}
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("formaingresso")}}" class="d-flex align-items-center gap-1 hover-text-primary"> {{-- Rota do link ajustada --}}
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Forma Ingresso') }} {{-- Texto do link ajustado --}}
      </a>
    </li>
  </ul>
</div>

<div class="row gy-4">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Cadastro de Forma Ingresso</h5> {{-- Título do card ajustado --}}
      </div>
      <div class="card-body">
        <form action="{{ route('formaingresso.store') }}" method="POST" class="row gy-3 needs-validation" novalidate> {{-- Rota do formulário ajustada --}}
          @csrf

          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <div class="icon-field has-validation">
              <input type="text" name="nome" class="form-control" placeholder="Digite o nome" required>
              <div class="invalid-feedback">
                Por favor, preencha o nome.
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <button class="btn btn-primary-600" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
