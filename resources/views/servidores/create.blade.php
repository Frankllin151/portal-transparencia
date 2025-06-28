<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Servidores') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("servidores")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Servidores') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!-----Adicionar Servidor---->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Novo Servidor</h6>
      <div class="d-flex gap-2">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('servidores.store') }}" method="POST">
      @csrf {{-- Token CSRF para segurança --}}

      <div class="row gy-4">
        {{-- Informações Básicas --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Dados Pessoais e Administrativos</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="nome_servidor">Nome do Servidor</label>
                  <input type="text" name="nome_servidor" id="nome_servidor" class="form-control @error('nome_servidor') is-invalid @enderror"
                         value="{{ old('nome_servidor') }}" placeholder="Nome Completo do Servidor">
                  @error('nome_servidor')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="entidade">Entidade</label>
                  <select name="entidade" id="entidade" class="form-select @error('entidade') is-invalid @enderror" required>
                    <option value="">Selecione a Entidade</option>
                    @foreach ($Entidade as $item)
                      <option value="{{ $item->nome }}" {{ old('entidade') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('entidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="matricula">Matrícula</label>
                  <input type="text" name="matricula" id="matricula" class="form-control @error('matricula') is-invalid @enderror"
                         value="{{ old('matricula') }}" placeholder="Número de Matrícula" required>
                  @error('matricula')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="lotacao">Lotação</label>
                  <select name="lotacao" id="lotacao" class="form-select @error('lotacao') is-invalid @enderror" required>
                    <option value="">Selecione a Lotação</option>
                    @foreach ($lotacao as $item)
                      <option value="{{ $item->nome }}" {{ old('lotacao') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('lotacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="orgao">Órgão</label>
                  <select name="orgao" id="orgao" class="form-select @error('orgao') is-invalid @enderror" required>
                    <option value="">Selecione o Órgão</option>
                    @foreach ($Orgao as $item)
                      <option value="{{ $item->nome }}" {{ old('orgao') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('orgao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="data_admissao">Data de Admissão</label>
                  <input type="date" name="data_admissao" id="data_admissao" class="form-control @error('data_admissao') is-invalid @enderror"
                         value="{{ old('data_admissao') }}" required>
                  @error('data_admissao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Vínculo, Situação e Classificações --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Vínculo e Classificações</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="vinculo_empregaticio">Vínculo Empregatício</label>
                  <select name="vinculo_empregaticio" id="vinculo_empregaticio" class="form-control @error('vinculo_empregaticio') is-invalid @enderror">
                    <option value="">Selecione o Vínculo</option>
                    @foreach($vinculoEmpregaticio as $item)
                      <option value="{{ $item->nome }}" {{ old('vinculo_empregaticio') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('vinculo_empregaticio')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="situacao">Situação do Servidor</label>
                  <select name="situacao" id="situacao" class="form-control @error('situacao') is-invalid @enderror" required>
                    <option value="">Selecione a Situação</option>
                    @foreach($situacaoCargo as $item)
                      <option value="{{ $item->nome }}" {{ old('situacao') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('situacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="classificacao_cargo">Classificação do Cargo (no Servidor)</label>
                  <input type="text" name="classificacao_cargo" id="classificacao_cargo" class="form-control @error('classificacao_cargo') is-invalid @enderror"
                         value="{{ old('classificacao_cargo') }}" placeholder="Ex: Efetivo, Comissionado" required>
                  @error('classificacao_cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="classificacao_afastamento">Classificação de Afastamento</label>
                  <select name="classificacao_afastamento" id="classificacao_afastamento" class="form-control @error('classificacao_afastamento') is-invalid @enderror">
                    <option value="">Selecione a Classificação</option>
                    @foreach($classificacaoAfastamento as $item)
                      <option value="{{ $item->nome }}" {{ old('classificacao_afastamento') == $item->nome ? 'selected' : '' }}>
                        {{ $item->nome }}
                      </option>
                    @endforeach
                  </select>
                  @error('classificacao_afastamento')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="efetivo_em_cargo_comissionado">Efetivo em Cargo Comissionado?</label>
                  <select name="efetivo_em_cargo_comissionado" id="efetivo_em_cargo_comissionado" class="form-control @error('efetivo_em_cargo_comissionado') is-invalid @enderror">
                    <option value="">Selecione</option>
                    <option value="1" {{ old('efetivo_em_cargo_comissionado') == '1' ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('efetivo_em_cargo_comissionado') == '0' ? 'selected' : '' }}>Não</option>
                  </select>
                  @error('efetivo_em_cargo_comissionado')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Informações do Cargo Relacionado (via cargo_id) --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Cargo Vinculado</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="cargo_id">Cargo</label>
                  <select name="cargo_id" id="cargo_id" class="form-control @error('cargo_id') is-invalid @enderror" required>
                    <option value="">Selecione um Cargo</option>
                    @foreach($cargos as $cargo)
                      <option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>
                        {{ $cargo->descricao_cargo }} ({{ $cargo->ano }}/{{ $cargo->competencia }})
                      </option>
                    @endforeach
                  </select>
                  @error('cargo_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Valores Financeiros e Carga Horária --}}
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Remuneração e Carga Horária</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label" for="remuneracao_contratual">Remuneração Contratual</label>
                  <input type="number" step="0.01" name="remuneracao_contratual" id="remuneracao_contratual" class="form-control @error('remuneracao_contratual') is-invalid @enderror"
                         value="{{ old('remuneracao_contratual') }}" placeholder="0.00" required>
                  @error('remuneracao_contratual')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="contribuicao_empregado_rgps">Contrib. Empregado (RGPS)</label>
                  <input type="number" step="0.01" name="contribuicao_empregado_rgps" id="contribuicao_empregado_rgps" class="form-control @error('contribuicao_empregado_rgps') is-invalid @enderror"
                         value="{{ old('contribuicao_empregado_rgps') }}" placeholder="0.00">
                  @error('contribuicao_empregado_rgps')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="contribuicao_empregado_rat_fat">Contrib. Empregado (RAT/FAT)</label>
                  <input type="number" step="0.01" name="contribuicao_empregado_rat_fat" id="contribuicao_empregado_rat_fat" class="form-control @error('contribuicao_empregado_rat_fat') is-invalid @enderror"
                         value="{{ old('contribuicao_empregado_rat_fat') }}" placeholder="0.00">
                  @error('contribuicao_empregado_rat_fat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="contribuicao_patronal_rgps">Contrib. Patronal (RGPS)</label>
                  <input type="number" step="0.01" name="contribuicao_patronal_rgps" id="contribuicao_patronal_rgps" class="form-control @error('contribuicao_patronal_rgps') is-invalid @enderror"
                         value="{{ old('contribuicao_patronal_rgps') }}" placeholder="0.00">
                  @error('contribuicao_patronal_rgps')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="carga_horaria_semanal">Carga Horária Semanal</label>
                  <input type="number" step="0.01" name="carga_horaria_semanal" id="carga_horaria_semanal" class="form-control @error('carga_horaria_semanal') is-invalid @enderror"
                         value="{{ old('carga_horaria_semanal') }}" placeholder="0.00" required>
                  @error('carga_horaria_semanal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="carga_horaria_mensal">Carga Horária Mensal</label>
                  <input type="number" step="0.01" name="carga_horaria_mensal" id="carga_horaria_mensal" class="form-control @error('carga_horaria_mensal') is-invalid @enderror"
                         value="{{ old('carga_horaria_mensal') }}" placeholder="0.00">
                  @error('carga_horaria_mensal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label" for="organograma">Organograma</label>
                  <input type="text" name="organograma" id="organograma" class="form-control @error('organograma') is-invalid @enderror"
                         value="{{ old('organograma') }}" placeholder="Estrutura Organizacional">
                  @error('organograma')
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
                  Adicionar Servidor
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