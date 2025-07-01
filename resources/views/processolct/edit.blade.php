<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Processos Licitatorios') }}: {{$processo->numero_processo}}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('processo')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Processos Licitatorios') }}
      </a>
    </li>
   
    
  </ul>
</div>
<!--edit processo LCT-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Editar Processo Licitatório</h6>
      <div class="d-flex gap-2">
        <a href="{{ route('processo.show', $processo->id) }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{route('processo.update', $processo->id)}}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="row gy-4">
        <!-- Informações Básicas -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações Básicas</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Entidade</label>
                   <select name="entidade" class="form-select" required>
    @foreach ($dataEntidade as $item)
      <option value="{{ $item->nome }}" {{ $processo->entidade == $item->nome? 'selected' : '' }}>
        {{ $item->nome }}
      </option>
    @endforeach
  </select>
                </div>
                <div class="col-6">
                  <label class="form-label">Número Processo</label>
                  <input type="number" name="numero_processo" class="form-control" value="{{ $processo->numero_processo }}" placeholder="6388">
                </div>
                <div class="col-6">
                  <label class="form-label">Ano Processo</label>
                  <input type="number" name="ano_processo" class="form-control" value="{{ $processo->ano_processo }}" placeholder="2015">
                </div>
                <div class="col-6">
                  <label class="form-label">Número Licitação</label>
                  <input type="number" name="numero_licitacao" class="form-control" value="{{ $processo->numero_licitacao }}" placeholder="6899">
                </div>
                <div class="col-6">
                  <label class="form-label">Ano Licitação</label>
                  <input type="number" name="ano_licitacao" class="form-control" value="{{ $processo->ano_licitacao }}" placeholder="2022">
                </div>
                <div class="col-12">
                  <label class="form-label">Data Criação</label>
                  <input type="date" name="data_criacao" class="form-control" 
                  value="{{ $processo->data_criacao ? \Carbon\Carbon::parse($processo->data_criacao)->format('Y-m-d') : '' }}">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modalidade e Contratação -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Modalidade e Contratação</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Modalidade</label>
                  <select name="modalidade" class="form-select" required>
    @foreach ($dataEntidade as $item)
      <option value="{{ $item->nome }}" {{ $processo->modalidade == $item->nome? 'selected' : '' }}>
        {{ $item->nome }}
      </option>
    @endforeach
  </select>
                 
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Contratação</label>
                   <select name="forma_contratacao" class="form-select" required>
    @foreach ($dataSituacao as $item)
      <option value="{{ $item->nome }}" {{  $processo->forma_contratacao == $item->nome? 'selected' : '' }}>
        {{ $item->nome }}
      </option>
    @endforeach
  </select>
                 
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Julgamento</label>
                  <select name="forma_julgamento" class="form-select">
                    <option value="Menor Preço" {{ $processo->forma_julgamento == 'Menor Preço' ? 'selected' : '' }}>Menor Preço</option>
                    <option value="Melhor Técnica" {{ $processo->forma_julgamento == 'Melhor Técnica' ? 'selected' : '' }}>Melhor Técnica</option>
                    <option value="Técnica e Preço" {{ $processo->forma_julgamento == 'Técnica e Preço' ? 'selected' : '' }}>Técnica e Preço</option>
                    <option value="Maior Lance" {{ $processo->forma_julgamento == 'Maior Lance' ? 'selected' : '' }}>Maior Lance</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Registro de Preços</label>
                  <select name="registro_precos" class="form-select">
                    <option value="Sim" {{ $processo->registro_precos == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ $processo->registro_precos == 'Não' ? 'selected' : '' }}>Não</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Situação e Objeto -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Situação e Objeto</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Situação</label>
                  <select name="situacao" class="form-select">
                    <option value="Em andamento" {{ $processo->situacao == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option value="Concluído" {{ $processo->situacao == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                    <option value="Suspenso" {{ $processo->situacao == 'Suspenso' ? 'selected' : '' }}>Suspenso</option>
                    <option value="Cancelado" {{ $processo->situacao == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="Deserto" {{ $processo->situacao == 'Deserto' ? 'selected' : '' }}>Deserto</option>
                    <option value="Fracassado" {{ $processo->situacao == 'Fracassado' ? 'selected' : '' }}>Fracassado</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo do Objeto</label>
                  <textarea name="tipo_objeto" class="form-control" rows="4" placeholder="Descreva o tipo/objeto da licitação">{{ $processo->tipo_objeto }}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Datas do Processo -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Datas do Processo</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Data Homologação</label>
                  <input type="date" name="data_homologacao" class="form-control"
                  value="{{ $processo->data_homologacao ? \Carbon\Carbon::parse($processo->data_homologacao)->format('Y-m-d') : '' }}">
                </div>
                <div class="col-12">
                  <label class="form-label">Data/Hora Abertura Envelopes</label>
                  <input type="datetime-local" name="data_hora_abertura_envelopes" class="form-control"
                  value="{{ $processo->data_hora_abertura_envelopes ? \Carbon\Carbon::parse($processo->data_hora_abertura_envelopes)->format('Y-m-d\TH:i') : '' }}">
                </div>
                <div class="col-12">
                  <label class="form-label">Início Recebimento Envelopes</label>
                  <input type="datetime-local" name="inicio_recebimento_envelopes" class="form-control"
                  value="{{ $processo->inicio_recebimento_envelopes ? \Carbon\Carbon::parse($processo->inicio_recebimento_envelopes)->format('Y-m-d\TH:i') : '' }}">
                </div>
                <div class="col-12">
                  <label class="form-label">Término Recebimento Envelopes</label>
                  <input type="datetime-local" name="termino_recebimento_envelopes" class="form-control"
                  value="{{ $processo->termino_recebimento_envelopes ? \Carbon\Carbon::parse($processo->termino_recebimento_envelopes)->format('Y-m-d\TH:i') : '' }}">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Local do Certame -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Local do Certame</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Cidade do Certame</label>
                  <input type="text" name="cidade_certame" class="form-control" value="{{ $processo->cidade_certame }}" placeholder="West Carlottaland">
                </div>
                <div class="col-12">
                  <label class="form-label">Estado do Certame</label>
                  <select name="estado_certame" class="form-select">
                    <option value="">Selecione o Estado</option>
                    <option value="AC" {{ $processo->estado_certame == 'AC' ? 'selected' : '' }}>Acre</option>
                    <option value="AL" {{ $processo->estado_certame == 'AL' ? 'selected' : '' }}>Alagoas</option>
                    <option value="AP" {{ $processo->estado_certame == 'AP' ? 'selected' : '' }}>Amapá</option>
                    <option value="AM" {{ $processo->estado_certame == 'AM' ? 'selected' : '' }}>Amazonas</option>
                    <option value="BA" {{ $processo->estado_certame == 'BA' ? 'selected' : '' }}>Bahia</option>
                    <option value="CE" {{ $processo->estado_certame == 'CE' ? 'selected' : '' }}>Ceará</option>
                    <option value="DF" {{ $processo->estado_certame == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                    <option value="ES" {{ $processo->estado_certame == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                    <option value="GO" {{ $processo->estado_certame == 'GO' ? 'selected' : '' }}>Goiás</option>
                    <option value="MA" {{ $processo->estado_certame == 'MA' ? 'selected' : '' }}>Maranhão</option>
                    <option value="MT" {{ $processo->estado_certame == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                    <option value="MS" {{ $processo->estado_certame == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                    <option value="MG" {{ $processo->estado_certame == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                    <option value="PA" {{ $processo->estado_certame == 'PA' ? 'selected' : '' }}>Pará</option>
                    <option value="PB" {{ $processo->estado_certame == 'PB' ? 'selected' : '' }}>Paraíba</option>
                    <option value="PR" {{ $processo->estado_certame == 'PR' ? 'selected' : '' }}>Paraná</option>
                    <option value="PE" {{ $processo->estado_certame == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                    <option value="PI" {{ $processo->estado_certame == 'PI' ? 'selected' : '' }}>Piauí</option>
                    <option value="RJ" {{ $processo->estado_certame == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                    <option value="RN" {{ $processo->estado_certame == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                    <option value="RS" {{ $processo->estado_certame == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                    <option value="RO" {{ $processo->estado_certame == 'RO' ? 'selected' : '' }}>Rondônia</option>
                    <option value="RR" {{ $processo->estado_certame == 'RR' ? 'selected' : '' }}>Roraima</option>
                    <option value="SC" {{ $processo->estado_certame == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                    <option value="SP" {{ $processo->estado_certame == 'SP' ? 'selected' : '' }}>São Paulo</option>
                    <option value="SE" {{ $processo->estado_certame == 'SE' ? 'selected' : '' }}>Sergipe</option>
                    <option value="TO" {{ $processo->estado_certame == 'TO' ? 'selected' : '' }}>Tocantins</option>
                    <option value="NC" {{ $processo->estado_certame == 'NC' ? 'selected' : '' }}>NC</option>
                    <option value="DC" {{ $processo->estado_certame == 'DC' ? 'selected' : '' }}>DC</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Nome do Contato</label>
                  <input type="text" name="nome_contato" class="form-control" value="{{ $processo->nome_contato }}" placeholder="Cassandre Stehr">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Observações Adicionais -->
       

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