<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0">  {{ __('Nova Despesa') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Nova Despesa') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!--Create-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Adicionar Nova Despesa</h6>
      <div class="d-flex gap-2">
        <a href="{{ route('despesas') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar para Despesas
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('despesas.store') }}" method="POST">
      @csrf

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações Básicas</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Ano Exercício</label>
                  <input type="number" name="ano_exercicio" class="form-control" placeholder="2024" required>
                </div>
                <div class="col-12">
                  <label class="form-label">Número Empenho</label>
                  <input type="text" name="numero_empenho" class="form-control" placeholder="Digite o número do empenho" required>
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Empenho</label>
                  <select name="tipo_empenho" class="form-select" required>
                    <option value="">Selecione o Tipo</option>
                    <option value="Ordinário">Ordinário</option>
                    <option value="Estimativo">Estimativo</option>
                    <option value="Global">Global</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Categoria Empenho</label>
                  <input type="text" name="categoria_empenho" class="form-control" placeholder="Categoria do empenho">
                </div>
                <div class="col-12">
                  <label class="form-label">Histórico Empenho</label>
                  <textarea name="historico_empenho" class="form-control" rows="4" placeholder="Descreva o histórico do empenho"></textarea>
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
                  <label class="form-label">Valor Empenho</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_empenho" class="form-control" step="0.01" placeholder="0,00" required>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Liquidado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_liquidado" class="form-control" step="0.01" placeholder="0,00">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Pago</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_pago" class="form-control" step="0.01" placeholder="0,00">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Orçado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_orcado" class="form-control" step="0.01" placeholder="0,00">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Atualizado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_atualizado" class="form-control" step="0.01" placeholder="0,00">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Alterado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="number" name="valor_alterado" class="form-control" step="0.01" placeholder="0,00">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Percentuais</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">% Empenhado sobre Orçado</label>
                  <div class="input-group">
                    <input type="number" name="porcentagem_empenhado_sobre_orcado" class="form-control" step="0.01" placeholder="0,00">
                    <span class="input-group-text bg-base">%</span>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">% Liquidado sobre Orçado</label>
                  <div class="input-group">
                    <input type="number" name="porcentagem_liquidado_sobre_orcado" class="form-control" step="0.01" placeholder="0,00">
                    <span class="input-group-text bg-base">%</span>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">% Pago sobre Orçado</label>
                  <div class="input-group">
                    <input type="number" name="porcentagem_pago_sobre_orcado" class="form-control" step="0.01" placeholder="0,00">
                    <span class="input-group-text bg-base">%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Datas</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Data Empenho</label>
                  <input type="date" name="data_empenho" class="form-control" required>
                </div>
                <div class="col-12">
                  <label class="form-label">Data Liquidação</label>
                  <input type="date" name="data_liquidacao" class="form-control">
                </div>
                <div class="col-12">
                  <label class="form-label">Data Pagamento</label>
                  <input type="date" name="data_pagamento" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Programa</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Finalidade Programa</label>
                  <textarea name="finalidade_programa" class="form-control" rows="3" placeholder="Descreva a finalidade do programa"></textarea>
                </div>
                <div class="col-12">
                  <label class="form-label">Objetivo Programa</label>
                  <textarea name="objetivo_programa" class="form-control" rows="3" placeholder="Descreva o objetivo do programa"></textarea>
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Ação Programa</label>
                  <input type="text" name="tipo_acao_programa" class="form-control" placeholder="Tipo de ação">
                </div>
                <div class="col-12">
                  <label class="form-label">Código Programa</label>
                  <input type="text" name="codigo_programa" class="form-control" placeholder="Código do programa">
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Programa</label>
                  <input type="text" name="descricao_programa" class="form-control" placeholder="Descrição do programa">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Órgão e Unidade</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Entidade</label>
                  <input type="text" name="entidade" class="form-control" placeholder="Nome da entidade">
                </div>
                <div class="col-12">
                  <label class="form-label">Órgão</label>
                  <input type="text" name="orgao" class="form-control" placeholder="Nome do órgão">
                </div>
                <div class="col-12">
                  <label class="form-label">Código Órgão</label>
                  <input type="text" name="codigo_orgao" class="form-control" placeholder="Código do órgão">
                </div>
                <div class="col-12">
                  <label class="form-label">Unidade</label>
                  <input type="text" name="unidade" class="form-control" placeholder="Nome da unidade">
                </div>
                <div class="col-12">
                  <label class="form-label">Código Unidade</label>
                  <input type="text" name="codigo_unidade" class="form-control" placeholder="Código da unidade">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Credor</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Nome Credor</label>
                  <input type="text" name="credor_nome" class="form-control" placeholder="Nome do credor">
                </div>
                <div class="col-12">
                  <label class="form-label">CNPJ/CPF Credor</label>
                  <input type="text" name="credor_cnpj_cpf" class="form-control" placeholder="00.000.000/0000-00">
                </div>
                <div class="col-12">
                  <label class="form-label">Natureza Jurídica</label>
                  <input type="text" name="credor_natureza_juridica" class="form-control" placeholder="Natureza jurídica">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Função e Subfunção</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-6">
                  <label class="form-label">Código Função</label>
                  <input type="text" name="codigo_funcao" class="form-control" placeholder="00">
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Função</label>
                  <input type="text" name="descricao_funcao" class="form-control" placeholder="Descrição">
                </div>
                <div class="col-6">
                  <label class="form-label">Código Subfunção</label>
                  <input type="text" name="codigo_subfuncao" class="form-control" placeholder="000">
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Subfunção</label>
                  <input type="text" name="descricao_subfuncao" class="form-control" placeholder="Descrição">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Ação</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Código Ação</label>
                  <input type="text" name="codigo_acao" class="form-control" placeholder="Código da ação">
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Ação</label>
                  <input type="text" name="descricao_acao" class="form-control" placeholder="Descrição da ação">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Elemento e Natureza</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-6">
                  <label class="form-label">Código Elemento</label>
                  <input type="text" name="codigo_elemento" class="form-control" placeholder="Código">
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Elemento</label>
                  <input type="text" name="descricao_elemento" class="form-control" placeholder="Descrição">
                </div>
                <div class="col-6">
                  <label class="form-label">Máscara Natureza</label>
                  <input type="text" name="mascara_natureza" class="form-control" placeholder="0.0.00.00.00">
                </div>
                <div class="col-6">
                  <label class="form-label">Natureza Despesa</label>
                  <input type="text" name="natureza_despesa" class="form-control" placeholder="Natureza">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Recurso</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Código Recurso</label>
                  <input type="text" name="codigo_recurso" class="form-control" placeholder="Código do recurso">
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Recurso</label>
                  <input type="text" name="descricao_recurso" class="form-control" placeholder="Descrição do recurso">
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Recurso</label>
                  <input type="text" name="tipo_recurso" class="form-control" placeholder="Tipo do recurso">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Modalidade e Poder</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Modalidade Aplicação</label>
                  <input type="text" name="modalidade_aplicacao" class="form-control" placeholder="Modalidade de aplicação">
                </div>
                <div class="col-12">
  <label class="form-label">Tipo Poder</label>
  <select name="tipo_poder" class="form-select" required>
    
    @foreach($dataTipoPoder as $poder)
      <option value="{{ $poder->id }}">{{ $poder->nome }}</option>
    @endforeach
  </select>
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
                  Salvar Nova Despesa
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
