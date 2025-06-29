<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Contrato Item') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("contratos_item")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Contrato Item') }}
      </a>
    </li>
   
    
  </ul>
</div>

<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Novo Item de Contrato</h6>
      <div class="d-flex gap-2">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('contratos_item.store') }}" method="POST">
      @csrf {{-- Token CSRF para segurança --}}

      <div class="row gy-4">
        {{-- Detalhes do Item --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações do Item</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="contrato_id">Contrato Vinculado</label>
                  <select name="contrato_id" id="contrato_id" class="form-control @error('contrato_id') is-invalid @enderror" required>
                    <option value="">Selecione um Contrato</option>
                    @foreach($contratos as $contrato)
                      <option value="{{ $contrato->id }}" {{ old('contrato_id') == $contrato->id ? 'selected' : '' }}>
                        {{ $contrato->contratado }} (Contrato: {{ $contrato->numero_contrato }} / {{ $contrato->ano }})
                      </option>
                    @endforeach
                  </select>
                  @error('contrato_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="codigo_item_contrato">Código do Item</label>
                  <input type="number" name="codigo_item_contrato" id="codigo_item_contrato" class="form-control @error('codigo_item_contrato') is-invalid @enderror"
                         value="{{ old('codigo_item_contrato') }}" placeholder="Ex: 4554" required>
                  @error('codigo_item_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="descricao_item_contrato">Descrição do Item</label>
                  <input type="text" name="descricao_item_contrato" id="descricao_item_contrato" class="form-control @error('descricao_item_contrato') is-invalid @enderror"
                         value="{{ old('descricao_item_contrato') }}" placeholder="Ex: Laboriosam expedita qui." required>
                  @error('descricao_item_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="unidade_medida">Unidade de Medida</label>
                         <select name="unidade_medida" class="form-select" required>
    
    @foreach($Unidade as $item)
      <option value="{{ $item->nome}}">{{ $item->nome }}</option>
    @endforeach
  </select>
                  @error('unidade_medida')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Valores do Item --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Valores e Quantidade</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="quantidade">Quantidade</label>
                  <input type="number" name="quantidade" id="quantidade" class="form-control @error('quantidade') is-invalid @enderror"
                         value="{{ old('quantidade') }}" placeholder="Ex: 26" required>
                  @error('quantidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_unitario">Valor Unitário</label>
                  <input type="number" step="0.01" name="valor_unitario" id="valor_unitario" class="form-control @error('valor_unitario') is-invalid @enderror"
                         value="{{ old('valor_unitario') }}" placeholder="0.00" required>
                  @error('valor_unitario')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_total">Valor Total</label>
                  <input type="number" step="0.01" name="valor_total" id="valor_total" class="form-control @error('valor_total') is-invalid @enderror"
                         value="{{ old('valor_total') }}" placeholder="0.00" required>
                  @error('valor_total')
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
                  Adicionar Item de Contrato
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