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

<!-- Edita Orçamentaria Receita Despesas-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Edição de Receita/Despesa Extra Orçamentária</h6>
      <div class="d-flex gap-2">
        {{-- Botão de Voltar para a visualização detalhada --}}
        <a href="{{ route('despreceitaex.show', $data->id) }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('despreceitaex.update', $data->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="row gy-4">
        <div class="col-md-12"> {{-- Coluna única para os campos --}}
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Dados do Registro</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md-6">
                  <label class="form-label">Classificação</label>
                  <input type="text" name="classificacao" class="form-control" value="{{ old('classificacao', $data->classificacao) }}" placeholder="Ex: Receita Extra">
                  @error('classificacao')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">Número</label>
                  <input type="text" name="numero" class="form-control" value="{{ old('numero', $data->numero) }}" placeholder="Ex: 12345">
                  @error('numero')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição da Classificação</label>
                  <input type="text" name="descricao_classificacao" class="form-control" value="{{ old('descricao_classificacao', $data->descricao_classificacao) }}" placeholder="Ex: Detalhes da classificação">
                  @error('descricao_classificacao')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">Fonte de Recursos</label>
                  <input type="text" name="fonte_recursos" class="form-control" value="{{ old('fonte_recursos', $data->fonte_recursos) }}" placeholder="Ex: Doações">
                  @error('fonte_recursos')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">Máscara</label>
                  <input type="text" name="mascara" class="form-control" value="{{ old('mascara', $data->mascara) }}" placeholder="Ex: 9.9.9.99.99">
                  @error('mascara')
                    <div class="text-danger mt-1">{{ $message }}</div>
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
