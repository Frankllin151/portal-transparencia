<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Processo Novo') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('processo')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Processo Novo') }}
      </a>
    </li>
   
    
  </ul>
</div>
<!---create-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Criar Novo Processo Licitatório</h6>
      <div class="d-flex gap-2">
        <a href="{{ route('processo') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('processo.store') }}" method="POST">
      @csrf
      
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
                  <input type="text" name="entidade" class="form-control" placeholder="Nome da entidade">
                </div>
                <div class="col-6">
                  <label class="form-label">Número Processo</label>
                  <input type="number" name="numero_processo" class="form-control" placeholder="6388">
                </div>
                <div class="col-6">
                  <label class="form-label">Ano Processo</label>
                  <input type="number" name="ano_processo" class="form-control" placeholder="2015">
                </div>
                <div class="col-6">
                  <label class="form-label">Número Licitação</label>
                  <input type="number" name="numero_licitacao" class="form-control" placeholder="6899">
                </div>
                <div class="col-6">
                  <label class="form-label">Ano Licitação</label>
                  <input type="number" name="ano_licitacao" class="form-control" placeholder="2022">
                </div>
                <div class="col-12">
                  <label class="form-label">Data Criação</label>
                  <input type="date" name="data_criacao" class="form-control">
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
                  <select name="modalidade" class="form-select">
                    <option value="">Selecione a Modalidade</option>
                    <option value="Pregão">Pregão</option>
                    <option value="Concorrência">Concorrência</option>
                    <option value="Tomada de Preços">Tomada de Preços</option>
                    <option value="Convite">Convite</option>
                    <option value="Concurso">Concurso</option>
                    <option value="Leilão">Leilão</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Contratação</label>
                  <select name="forma_contratacao" class="form-select">
                    <option value="">Selecione a Forma de Contratação</option>
                    <option value="Pregão">Pregão</option>
                    <option value="Concorrência">Concorrência</option>
                    <option value="Tomada de Preços">Tomada de Preços</option>
                    <option value="Convite">Convite</option>
                    <option value="Dispensa">Dispensa</option>
                    <option value="Inexigibilidade">Inexigibilidade</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Julgamento</label>
                  <select name="forma_julgamento" class="form-select">
                    <option value="">Selecione a Forma de Julgamento</option>
                    <option value="Menor Preço">Menor Preço</option>
                    <option value="Melhor Técnica">Melhor Técnica</option>
                    <option value="Técnica e Preço">Técnica e Preço</option>
                    <option value="Maior Lance">Maior Lance</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Registro de Preços</label>
                  <select name="registro_precos" class="form-select">
                    <option value="">Selecione</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
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
                    <option value="">Selecione a Situação</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Suspenso">Suspenso</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Deserto">Deserto</option>
                    <option value="Fracassado">Fracassado</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo do Objeto</label>
                  <textarea name="tipo_objeto" class="form-control" rows="4" placeholder="Descreva o tipo/objeto da licitação"></textarea>
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
                  <input type="date" name="data_homologacao" class="form-control">
                </div>
                <div class="col-12">
                  <label class="form-label">Data/Hora Abertura Envelopes</label>
                  <input type="datetime-local" name="data_hora_abertura_envelopes" class="form-control">
                </div>
                <div class="col-12">
                  <label class="form-label">Início Recebimento Envelopes</label>
                  <input type="datetime-local" name="inicio_recebimento_envelopes" class="form-control">
                </div>
                <div class="col-12">
                  <label class="form-label">Término Recebimento Envelopes</label>
                  <input type="datetime-local" name="termino_recebimento_envelopes" class="form-control">
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
                  <input type="text" name="cidade_certame" class="form-control" placeholder="West Carlottaland">
                </div>
                <div class="col-12">
                  <label class="form-label">Estado do Certame</label>
                  <select name="estado_certame" class="form-select">
                    <option value="">Selecione o Estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="NC">NC</option>
                    <option value="DC">DC</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Nome do Contato</label>
                  <input type="text" name="nome_contato" class="form-control" placeholder="Cassandre Stehr">
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
                  Criar Processo
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
