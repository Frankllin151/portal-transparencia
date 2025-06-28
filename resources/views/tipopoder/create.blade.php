
<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Tipo Poder') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
          <a href="{{route("tipopoder.novo")}}" class="btn btn-primary ">Novo</a>
    </li>
   
    
  </ul>
</div>


<div class="row gy-4">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Cadastro de Tipo de Poder</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('tipopoder.store') }}" method="POST" class="row gy-3 needs-validation" novalidate>
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

          <div class="col-md-6">
  <label class="form-label d-block">Ativo</label>
  <div class="form-check form-switch">
    <!-- valor enviado quando desmarcado -->
    <input type="hidden" name="ativo" value="0">

    <!-- valor enviado quando marcado (sobrescreve o hidden) -->
    <input class="form-check-input" type="checkbox" id="ativoSwitch" name="ativo" value="1" checked>

   
     <!--- <label class="form-check-label" for="ativoSwitch">
      Ativar ou desativar conforme preferência
    </label>--->
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
