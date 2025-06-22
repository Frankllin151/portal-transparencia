<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Receita Orçamentaria') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('despreceitaex')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Receita Orçamentaria') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!-- Adicionar Orçamentaria Receita Despesas-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Pagamento Extra Orçamentário</h6>
      <div class="d-flex gap-2">
        {{-- Botão de Voltar para uma lista, por exemplo --}}
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    {{-- O action do formulário aponta para a rota de store (criação) --}}
    <form action="{{ route('pagamentosdespesasreceita.store') }}" method="POST">
      @csrf {{-- Necessário para proteção CSRF --}}
      {{-- @method('PUT') NÃO USAR para criação, apenas para atualização --}}

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Dados do Pagamento</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="cpf_cnpj_beneficiario">CPF/CNPJ Beneficiário</label>
                  <input type="text" name="cpf_cnpj_beneficiario" id="cpf_cnpj_beneficiario" class="form-control @error('cpf_cnpj_beneficiario') is-invalid @enderror"
                         placeholder="Ex: 926.559.730-89" value="{{ old('cpf_cnpj_beneficiario') }}" required>
                  @error('cpf_cnpj_beneficiario')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="data_pagamento">Data do Pagamento</label>
                  <input type="date" name="data_pagamento" id="data_pagamento" class="form-control @error('data_pagamento') is-invalid @enderror"
                         value="{{ old('data_pagamento') }}" required>
                  @error('data_pagamento')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="historico">Histórico</label>
                  <input type="text" name="historico" id="historico" class="form-control @error('historico') is-invalid @enderror"
                         placeholder="Ex: Magni eos non at." value="{{ old('historico') }}" required>
                  @error('historico')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="nome_beneficiario">Nome do Beneficiário</label>
                  <input type="text" name="nome_beneficiario" id="nome_beneficiario" class="form-control @error('nome_beneficiario') is-invalid @enderror"
                         placeholder="Ex: Orin Watsica" value="{{ old('nome_beneficiario') }}" required>
                  @error('nome_beneficiario')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="numero_pagamento">Número do Pagamento</label>
                  <input type="text" name="numero_pagamento" id="numero_pagamento" class="form-control @error('numero_pagamento') is-invalid @enderror"
                         placeholder="Ex: 28587" value="{{ old('numero_pagamento') }}" required>
                  @error('numero_pagamento')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor">Valor</label>
                  <input type="number" step="0.01" name="valor" id="valor" class="form-control @error('valor') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor') }}" required>
                  @error('valor')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="receita_depesa_extraorcamentaria_id">Classificação Extra Orçamentária</label>
                  <select name="receita_depesa_extraorcamentaria_id" id="receita_depesa_extraorcamentaria_id" class="form-control @error('receita_depesa_extraorcamentaria_id') is-invalid @enderror" required>
                    <option value="">Selecione uma Classificação</option>
                    @foreach($receitasDespesasExtraOrcamentarias as $item)
                      <option value="{{ $item->id }}" {{ old('receita_depesa_extraorcamentaria_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->classificacao }} - {{ $item->descricao_classificacao }}
                      </option>
                    @endforeach
                  </select>
                  @error('receita_depesa_extraorcamentaria_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

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
                  Salvar Pagamento
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

</x-app-layout>
