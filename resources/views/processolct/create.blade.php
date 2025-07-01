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
                  <select name="entidade" id="entidade" required  class="form-select">
                  @foreach($dataEntidade as $item)
                      <option value="{{$item->nome}}">{{$item->nome}}</option>
                  @endforeach
                 </select>
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
                    @foreach($dataModalidade as $item)
                    <option value="{{$item->nome}}">{{$item->nome}}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Contratação</label>
                   <select name="forma_contratacao" class="form-select">
                  @foreach($dataModalidade as $item)
                       <option value="{{$item->nome}}">{{$item->nome}}</option>
                  @endforeach
                  </select>
                   
                </div>
                <div class="col-12">
                  <label class="form-label">Forma Julgamento</label>
                   <select name="forma_julgamento" class="form-select">
                  @foreach($dataFormaJulgamento as $item)
                       <option value="{{$item->nome}}">{{$item->nome}}</option>
                  @endforeach
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
                  <select name="situacao" class="form-select" required>
                    @foreach($dataSituacao as $item)
                    <option value="{{$item->nome}}">{{$item->nome}}</option>
                    @endforeach
                   
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
                   <input type="text" name="estado_certame" class="form-control" placeholder="Estado certame">
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
