<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Movimentação Bancaria') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('movimentacao')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Movimentação Bancaria') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!--Adicionar Movimento bancario-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Nova Movimentação Bancária</h6>
      <div class="d-flex gap-2">
        <!-- Rota para a lista de Movimentações Bancárias (index) -->
        <a href="{{ route('movimentacao') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar para a Lista
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <!-- O action do formulário aponta para a rota de store (criação) -->
    <form action="{{ route('movimentacaobancaria.store') }}" method="POST">
      @csrf
      {{-- Não usamos @method('PUT') para criação, pois é um método POST --}}

      <div class="row gy-4">
        <!-- Informações da Entidade e Conta -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações da Entidade e Conta</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Nome da Entidade</label>
                  <input type="text" name="nome_entidade" class="form-control" value="{{ old('nome_entidade') }}" placeholder="Ex: Rutherford-Botsford">
                  @error('nome_entidade') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Código da Conta</label>
                  <input type="text" name="codigo_conta" class="form-control" value="{{ old('codigo_conta') }}" placeholder="Ex: 672340">
                  @error('codigo_conta') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo da Conta</label>
                  <!-- Você pode usar um select para 'tipo_conta' se tiver opções fixas -->
                  <input type="text" name="tipo_conta" class="form-control" value="{{ old('tipo_conta') }}" placeholder="Ex: salario, corrente, poupanca">
                  @error('tipo_conta') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informações do Banco e Agência -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações do Banco e Agência</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Código do Banco</label>
                  <input type="text" name="codigo_banco" class="form-control" value="{{ old('codigo_banco') }}" placeholder="Ex: 399">
                  @error('codigo_banco') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Nome do Banco</label>
                  <input type="text" name="nome_banco" class="form-control" value="{{ old('nome_banco') }}" placeholder="Ex: Banco HSBC S.A.">
                  @error('nome_banco') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Número da Agência</label>
                  <input type="text" name="numero_agencia" class="form-control" value="{{ old('numero_agencia') }}" placeholder="Ex: 1605">
                  @error('numero_agencia') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição da Agência</label>
                  <input type="text" name="descricao_agencia" class="form-control" value="{{ old('descricao_agencia') }}" placeholder="Ex: Agência Katelinstad">
                  @error('descricao_agencia') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Número da Conta</label>
                  <input type="text" name="numero_conta" class="form-control" value="{{ old('numero_conta') }}" placeholder="Ex: 44809006-3">
                  @error('numero_conta') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Botões de Ação -->
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
                  Salvar Nova Movimentação
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
