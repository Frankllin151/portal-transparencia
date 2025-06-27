<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Cargos') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('cargos')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Cargos') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!--Adicionar Cargos-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Novo Cargo</h6>
      <div class="d-flex gap-2">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('cargos.store') }}" method="POST">
      @csrf

      <div class="row gy-4">
        {{-- Card: Informações do Cargo --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações do Cargo</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="descricao_cargo">Descrição do Cargo</label>
                  <input type="text" name="descricao_cargo" id="descricao_cargo" class="form-control @error('descricao_cargo') is-invalid @enderror"
                         value="{{ old('descricao_cargo') }}" placeholder="Ex: Analista Financeiro" required>
                  @error('descricao_cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="situacao_cargo">Situação do Cargo</label>
                  <select name="situacao_cargo" id="situacao_cargo" class="form-control @error('situacao_cargo') is-invalid @enderror" required>
                    <option value="">Selecione uma Situação</option>
                    @foreach($dataSituacao as $situacao)
                      <option value="{{ $situacao->nome }}" {{ old('situacao_cargo') == $situacao->nome ? 'selected' : '' }}>
                        {{ $situacao->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('situacao_cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="classificacao_cargo">Classificação do Cargo</label>
                  <select name="classificacao_cargo" id="classificacao_cargo" class="form-control @error('classificacao_cargo') is-invalid @enderror" required>
                    <option value="">Selecione uma Classificação</option>
                    @foreach($dataClassificacao as $classificacao) {{-- Usando dataClassificacao para consistência --}}
                      <option value="{{ $classificacao->nome }}" {{ old('classificacao_cargo') == $classificacao->nome ? 'selected' : '' }}>
                        {{ $classificacao->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('classificacao_cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Card: Período --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Período</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="ano">Ano</label>
                  <input type="text" name="ano" id="ano" class="form-control @error('ano') is-invalid @enderror"
                         value="{{ old('ano') }}" placeholder="Ex: 2024" required>
                  @error('ano')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="competencia">Competência</label>
                  <input type="text" name="competencia" id="competencia" class="form-control @error('competencia') is-invalid @enderror"
                         value="{{ old('competencia') }}" placeholder="Ex: Janeiro / Novembro" required>
                  @error('competencia')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Botões de Ação --}}
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
                  Adicionar Cargo
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
