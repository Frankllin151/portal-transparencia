<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Cargo') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("cargos")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Cargo') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!------Edição Cargo----> 
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Editar Cargo</h6>
      <div class="d-flex gap-2">
        <a href="{{ route('cargos.show', $data->id) }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('cargos.update', $data->id) }}" method="POST">
      @csrf {{-- Token CSRF para segurança --}}
      @method('PUT') {{-- Simula o método HTTP PUT para atualização --}}

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações do Cargo</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Descrição do Cargo</label>
                  <input type="text" name="descricao_cargo" class="form-control" value="{{ old('descricao_cargo', $data->descricao_cargo) }}" placeholder="Ex: Analista Financeiro">
                  @error('descricao_cargo')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Situação do Cargo</label>
                  <input type="text" name="situacao_cargo" class="form-control" value="{{ old('situacao_cargo', $data->situacao_cargo) }}" placeholder="Ex: Ativo / Extinto">
                  @error('situacao_cargo')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Classificação do Cargo</label>
                  <input type="text" name="classificacao_cargo" class="form-control" value="{{ old('classificacao_cargo', $data->classificacao_cargo) }}" placeholder="Ex: Comissionado / Efetivo">
                  @error('classificacao_cargo')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Período</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Ano</label>
                  <input type="number" name="ano" class="form-control" value="{{ old('ano', $data->ano) }}" placeholder="Ex: 2024">
                  @error('ano')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Competência </label>
                  <input type="text" name="competencia" class="form-control" value="{{ old('competencia', $data->competencia) }}" placeholder="Ex: Janeiro / November">
                  @error('competencia')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                {{-- Você pode adicionar campos para created_at e updated_at se desejar exibir/editar, mas geralmente são gerados automaticamente --}}
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
                  Salvar Alterações
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
