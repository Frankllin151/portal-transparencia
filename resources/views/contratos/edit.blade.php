<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Contrato') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("contratos")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Contrato') }}
      </a>
    </li>
   
    
  </ul>
</div>
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Editar Contrato: {{ $data->numero_contrato ?? 'N/A' }}</h6>
      <div class="d-flex gap-2">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('contratos.update', $data->id) }}" method="POST">
      @csrf {{-- Token CSRF para segurança --}}
      @method('PUT') {{-- Simula o método HTTP PUT para atualização --}}

      <div class="row gy-4">
        {{-- Informações Principais do Contrato --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Dados Principais do Contrato</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="entidade">Entidade</label>
                  <select name="entidade" id="entidade" class="form-select @error('entidade') is-invalid @enderror" required>
                    <option value="">Selecione a Entidade</option>
                    @foreach ($Entidade as $item)
                      <option value="{{ $item->nome }}" {{ old('entidade', $data->entidade) == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('entidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="numero_contrato">Número do Contrato</label>
                  <input type="text" name="numero_contrato" id="numero_contrato" class="form-control @error('numero_contrato') is-invalid @enderror"
                         value="{{ old('numero_contrato', $data->numero_contrato) }}" placeholder="Ex: CTR20657" required>
                  @error('numero_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="numero_processo">Número do Processo</label>
                  <input type="number" name="numero_processo" id="numero_processo" class="form-control @error('numero_processo') is-invalid @enderror"
                         value="{{ old('numero_processo', $data->numero_processo) }}" placeholder="Ex: 24902" required>
                  @error('numero_processo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="ano">Ano</label>
                  <input type="number" name="ano" id="ano" class="form-control @error('ano') is-invalid @enderror"
                         value="{{ old('ano', $data->ano) }}" placeholder="Ex: 1974" required>
                  @error('ano')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="contratado">Contratado</label>
                  <input type="text" name="contratado" id="contratado" class="form-control @error('contratado') is-invalid @enderror"
                         value="{{ old('contratado', $data->contratado) }}" placeholder="Nome do Contratado" required>
                  @error('contratado')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="situacao">Situação</label>
                  <select name="situacao" id="situacao" class="form-select @error('situacao') is-invalid @enderror" required>
                    <option value="">Selecione a Situação</option>
                    {{-- Assumindo que SituacaoCargo tem um campo 'nome' e representa as opções de situação para o contrato --}}
                    @foreach ($SituacaoCargo as $item)
                      <option value="{{ $item->nome }}" {{ old('situacao', $data->situacao) == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('situacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Detalhes da Licitação e Tipo de Contrato --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Classificações e Processos</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="modalidade_licitacao">Modalidade de Licitação</label>
                  <select name="modalidade_licitacao" id="modalidade_licitacao" class="form-select @error('modalidade_licitacao') is-invalid @enderror" required>
                    <option value="">Selecione a Modalidade</option>
                    @foreach ($ModalidadeLicitacao as $item)
                      <option value="{{ $item->nome }}" {{ old('modalidade_licitacao', $data->modalidade_licitacao) == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('modalidade_licitacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="tipo_contrato">Tipo de Contrato</label>
                  <select name="tipo_contrato" id="tipo_contrato" class="form-select @error('tipo_contrato') is-invalid @enderror" required>
                    <option value="">Selecione o Tipo</option>
                    @foreach ($TipoContrato as $item)
                      <option value="{{ $item->nome }}" {{ old('tipo_contrato', $data->tipo_contrato) == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('tipo_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="instrumento_contrato">Instrumento do Contrato</label>
                  <input type="text" name="instrumento_contrato" id="instrumento_contrato" class="form-control @error('instrumento_contrato') is-invalid @enderror"
                         value="{{ old('instrumento_contrato', $data->instrumento_contrato) }}" placeholder="Ex: Termo de Referência" required>
                  @error('instrumento_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="codigo_fornecedor">Código do Fornecedor</label>
                  <input type="text" name="codigo_fornecedor" id="codigo_fornecedor" class="form-control @error('codigo_fornecedor') is-invalid @enderror"
                         value="{{ old('codigo_fornecedor', $data->codigo_fornecedor) }}" placeholder="Ex: FORN840" required>
                  @error('codigo_fornecedor')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="codigo_processo">Código do Processo</label>
                  <input type="text" name="codigo_processo" id="codigo_processo" class="form-control @error('codigo_processo') is-invalid @enderror"
                         value="{{ old('codigo_processo', $data->codigo_processo) }}" placeholder="Ex: PROC642" required>
                  @error('codigo_processo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="numero_licitacao">Número da Licitação</label>
                  <input type="number" name="numero_licitacao" id="numero_licitacao" class="form-control @error('numero_licitacao') is-invalid @enderror"
                         value="{{ old('numero_licitacao', $data->numero_licitacao) }}" placeholder="Ex: 32803" required>
                  @error('numero_licitacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Datas de Vigência e Valores --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Prazos e Valores Financeiros</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="data_assinatura">Data de Assinatura</label>
                  <input type="date" name="data_assinatura" id="data_assinatura" class="form-control @error('data_assinatura') is-invalid @enderror"
                         value="{{ old('data_assinatura', $data->data_assinatura ? \Carbon\Carbon::parse($data->data_assinatura)->format('Y-m-d') : '') }}" required>
                  @error('data_assinatura')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="data_vigencia_inicial">Data de Vigência Inicial</label>
                  <input type="date" name="data_vigencia_inicial" id="data_vigencia_inicial" class="form-control @error('data_vigencia_inicial') is-invalid @enderror"
                         value="{{ old('data_vigencia_inicial', $data->data_vigencia_inicial ? \Carbon\Carbon::parse($data->data_vigencia_inicial)->format('Y-m-d') : '') }}" required>
                  @error('data_vigencia_inicial')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="data_vigencia_final">Data de Vigência Final</label>
                  <input type="date" name="data_vigencia_final" id="data_vigencia_final" class="form-control @error('data_vigencia_final') is-invalid @enderror"
                         value="{{ old('data_vigencia_final', $data->data_vigencia_final ? \Carbon\Carbon::parse($data->data_vigencia_final)->format('Y-m-d') : '') }}" required>
                  @error('data_vigencia_final')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_inicial">Valor Inicial</label>
                  <input type="number" step="0.01" name="valor_inicial" id="valor_inicial" class="form-control @error('valor_inicial') is-invalid @enderror"
                         value="{{ old('valor_inicial', $data->valor_inicial) }}" placeholder="0.00" required>
                  @error('valor_inicial')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="valor_final">Valor Final</label>
                  <input type="number" step="0.01" name="valor_final" id="valor_final" class="form-control @error('valor_final') is-invalid @enderror"
                         value="{{ old('valor_final', $data->valor_final) }}" placeholder="0.00" required>
                  @error('valor_final')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="competencia">Competência</label>
                  <input type="text" name="competencia" id="competencia" class="form-control @error('competencia') is-invalid @enderror"
                         value="{{ old('competencia', $data->competencia) }}" placeholder="Ex: November" required>
                  @error('competencia')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="subcontratacao">Subcontratação</label>
                  <select name="subcontratacao" id="subcontratacao" class="form-select @error('subcontratacao') is-invalid @enderror" required>
                    <option value="">Selecione</option>
                    <option value="Sim" {{ old('subcontratacao', $data->subcontratacao) == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ old('subcontratacao', $data->subcontratacao) == 'Não' ? 'selected' : '' }}>Não</option>
                  </select>
                  @error('subcontratacao')
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