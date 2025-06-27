<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Receita') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('receita')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __(' Receita') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!---nova receita --->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Editar Receita #{{ $receita->id }}</h6>
      <div class="d-flex gap-2">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    {{-- Form action points to the update route with the receita ID --}}
    <form action="{{ route('receita.update', $receita->id) }}" method="POST">
      @csrf
      @method('PUT') {{-- This tells Laravel to treat the request as a PUT for updates --}}

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Dados Essenciais</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="data">Data</label>
                  <input type="date" name="data" id="data" class="form-control @error('data') is-invalid @enderror"
                         value="{{ old('data', $receita->data ? \Carbon\Carbon::parse($receita->data)->format('Y-m-d') : '') }}" required>
                  @error('data')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="natureza_id">Natureza da Receita</label>
                  <select name="natureza_id" id="natureza_id" class="form-control @error('natureza_id') is-invalid @enderror" required>
                    <option value="">Selecione uma Natureza</option>
                    @foreach($dataNatureza as $natureza)
                      <option value="{{ $natureza->id }}" {{ old('natureza_id', $receita->natureza_id) == $natureza->id ? 'selected' : '' }}>
                        {{ $natureza->descricao }} ({{ $natureza->codigo }})
                      </option>
                    @endforeach
                  </select>
                  @error('natureza_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="finalidade">Finalidade</label>
                
                   <select name="finalidade" id="finalidade" class="form-control" required>
                  
                    @foreach($dataFinalidade as $item)
                      <option value="{{ $item->nome }}" {{ $receita->finalidade== $item->nome? 'selected' : '' }}>
                        {{ $item->nome}}
                      </option>
                    @endforeach
                  </select>
                 
                </div>
                <div class="col-12">
                  <label class="form-label" for="forma_ingresso">Forma de Ingresso</label>
                 
                  <select name="forma_ingresso" id="forma_ingresso" class="form-control" required>
                  
                    @foreach($dataFormaIngresso as $item)
                      <option value="{{ $item->nome }}" {{ $receita->forma_ingresso== $item->nome? 'selected' : '' }}>
                        {{ $item->nome}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="receita_corrente_liquida" id="receita_corrente_liquida" value="1"
                           {{ old('receita_corrente_liquida', $receita->receita_corrente_liquida) ? 'checked' : '' }}>
                    <label class="form-check-label" for="receita_corrente_liquida">
                      Receita Corrente Líquida
                    </label>
                  </div>
                  @error('receita_corrente_liquida')
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
              <h6 class="card-title mb-0">Valores Financeiros</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="valor_orcado_inicial">Valor Orçado Inicial</label>
                  <input type="number" step="0.01" name="valor_orcado_inicial" id="valor_orcado_inicial" class="form-control @error('valor_orcado_inicial') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_orcado_inicial', $receita->valor_orcado_inicial) }}">
                  @error('valor_orcado_inicial')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_orcado_atualizado">Valor Orçado Atualizado</label>
                  <input type="number" step="0.01" name="valor_orcado_atualizado" id="valor_orcado_atualizado" class="form-control @error('valor_orcado_atualizado') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_orcado_atualizado', $receita->valor_orcado_atualizado) }}">
                  @error('valor_orcado_atualizado')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_deducoes_orcado">Valor Deduções Orçado</label>
                  <input type="number" step="0.01" name="valor_deducoes_orcado" id="valor_deducoes_orcado" class="form-control @error('valor_deducoes_orcado') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_deducoes_orcado', $receita->valor_deducoes_orcado) }}">
                  @error('valor_deducoes_orcado')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_arrecadado_mes">Valor Arrecadado Mês</label>
                  <input type="number" step="0.01" name="valor_arrecadado_mes" id="valor_arrecadado_mes" class="form-control @error('valor_arrecadado_mes') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_arrecadado_mes', $receita->valor_arrecadado_mes) }}">
                  @error('valor_arrecadado_mes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_arrecadado_acumulado">Valor Arrecadado Acumulado</label>
                  <input type="number" step="0.01" name="valor_arrecadado_acumulado" id="valor_arrecadado_acumulado" class="form-control @error('valor_arrecadado_acumulado') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_arrecadado_acumulado', $receita->valor_arrecadado_acumulado) }}">
                  @error('valor_arrecadado_acumulado')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_deducoes_mes">Valor Deduções Mês</label>
                  <input type="number" step="0.01" name="valor_deducoes_mes" id="valor_deducoes_mes" class="form-control @error('valor_deducoes_mes') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_deducoes_mes', $receita->valor_deducoes_mes) }}">
                  @error('valor_deducoes_mes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_lancado_mes">Valor Lançado Mês</label>
                  <input type="number" step="0.01" name="valor_lancado_mes" id="valor_lancado_mes" class="form-control @error('valor_lancado_mes') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_lancado_mes', $receita->valor_lancado_mes) }}">
                  @error('valor_lancado_mes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_lancado_periodo">Valor Lançado Período</label>
                  <input type="number" step="0.01" name="valor_lancado_periodo" id="valor_lancado_periodo" class="form-control @error('valor_lancado_periodo') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('valor_lancado_periodo', $receita->valor_lancado_periodo) }}">
                  @error('valor_lancado_periodo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="realizado_percentual">Realizado Percentual</label>
                  <input type="number" step="0.01" name="realizado_percentual" id="realizado_percentual" class="form-control @error('realizado_percentual') is-invalid @enderror"
                         placeholder="0.00" value="{{ old('realizado_percentual', $receita->realizado_percentual) }}">
                  @error('realizado_percentual')
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
                  Atualizar Receita
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