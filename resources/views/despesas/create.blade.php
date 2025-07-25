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
      <a href="{{route("despesas")}}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
       <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
    {{ __('Voltar') }}
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
       
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('despesas.store') }}" method="POST">
      @csrf

      {{-- Bloco para exibir mensagens de sucesso/erro gerais --}}
      @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

      @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

      {{-- Bloco para exibir todos os erros de validação --}}
      @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Ops!</strong> Houve alguns problemas com seus dados.
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif

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
                  <input type="number" name="ano_exercicio" class="form-control @error('ano_exercicio') is-invalid @enderror" placeholder="2024" value="{{ old('ano_exercicio') }}" required>
                  @error('ano_exercicio')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Número Empenho</label>
                  <input type="text" name="numero_empenho" class="form-control @error('numero_empenho') is-invalid @enderror" placeholder="Digite o número do empenho" value="{{ old('numero_empenho') }}" required>
                  @error('numero_empenho')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Empenho</label>
                 <select name="tipo_empenho" class="form-select @error('tipo_empenho') is-invalid @enderror" required>
                    <option value="">Selecione o Tipo de Empenho</option> {{-- Adicionado placeholder --}}
                    @foreach($dataTipoEmpenho as $item)
                      <option value="{{ $item->nome}}" {{ old('tipo_empenho') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('tipo_empenho')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Categoria Empenho</label>
                  <select name="categoria_empenho" class="form-select @error('categoria_empenho') is-invalid @enderror" required>
                    <option value="">Selecione a Categoria de Empenho</option> {{-- Adicionado placeholder --}}
                    @foreach($dataCategoriaEmpenho as $item)
                      <option value="{{ $item->nome}}" {{ old('categoria_empenho') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('categoria_empenho')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Histórico Empenho</label>
                  <textarea name="historico_empenho" class="form-control @error('historico_empenho') is-invalid @enderror" rows="4" placeholder="Descreva o histórico do empenho">{{ old('historico_empenho') }}</textarea>
                  @error('historico_empenho')
                      <div class="invalid-feedback">{{ $message }}</div>
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
                  <label class="form-label">Valor Empenho</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_empenho" class="form-control money @error('valor_empenho') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_empenho') }}">
                    @error('valor_empenho')
                        <div class="invalid-feedback d-block">{{ $message }}</div> {{-- d-block para exibir corretamente --}}
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Liquidado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_liquidado" class="form-control money @error('valor_liquidado') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_liquidado') }}">
                    @error('valor_liquidado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Pago</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_pago" class="form-control money @error('valor_pago') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_pago') }}">
                    @error('valor_pago')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Orçado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_orcado" class="form-control money @error('valor_orcado') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_orcado') }}">
                    @error('valor_orcado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Atualizado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_atualizado" class="form-control money @error('valor_atualizado') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_atualizado') }}">
                    @error('valor_atualizado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Valor Alterado</label>
                  <div class="input-group">
                    <span class="input-group-text bg-base">R$</span>
                    <input type="text" name="valor_alterado" class="form-control money @error('valor_alterado') is-invalid @enderror" placeholder="0,00" value="{{ old('valor_alterado') }}">
                    @error('valor_alterado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
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
                    <input type="number" name="porcentagem_empenhado_sobre_orcado" class="form-control @error('porcentagem_empenhado_sobre_orcado') is-invalid @enderror" step="0.01" placeholder="0,00" value="{{ old('porcentagem_empenhado_sobre_orcado') }}">
                    <span class="input-group-text bg-base">%</span>
                    @error('porcentagem_empenhado_sobre_orcado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">% Liquidado sobre Orçado</label>
                  <div class="input-group">
                    <input type="number" name="porcentagem_liquidado_sobre_orcado" class="form-control @error('porcentagem_liquidado_sobre_orcado') is-invalid @enderror" step="0.01" placeholder="0,00" value="{{ old('porcentagem_liquidado_sobre_orcado') }}">
                    <span class="input-group-text bg-base">%</span>
                    @error('porcentagem_liquidado_sobre_orcado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">% Pago sobre Orçado</label>
                  <div class="input-group">
                    <input type="number" name="porcentagem_pago_sobre_orcado" class="form-control @error('porcentagem_pago_sobre_orcado') is-invalid @enderror" step="0.01" placeholder="0,00" value="{{ old('porcentagem_pago_sobre_orcado') }}">
                    <span class="input-group-text bg-base">%</span>
                    @error('porcentagem_pago_sobre_orcado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
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
                  <input type="date" name="data_empenho" class="form-control @error('data_empenho') is-invalid @enderror" value="{{ old('data_empenho') }}">
                  @error('data_empenho')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Data Liquidação</label>
                  <input type="date" name="data_liquidacao" class="form-control @error('data_liquidacao') is-invalid @enderror" value="{{ old('data_liquidacao') }}">
                  @error('data_liquidacao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Data Pagamento</label>
                  <input type="date" name="data_pagamento" class="form-control @error('data_pagamento') is-invalid @enderror" value="{{ old('data_pagamento') }}">
                  @error('data_pagamento')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <textarea name="finalidade_programa" class="form-control @error('finalidade_programa') is-invalid @enderror" rows="3" placeholder="Descreva a finalidade do programa">{{ old('finalidade_programa') }}</textarea>
                  @error('finalidade_programa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Objetivo Programa</label>
                  <textarea name="objetivo_programa" class="form-control @error('objetivo_programa') is-invalid @enderror" rows="3" placeholder="Descreva o objetivo do programa">{{ old('objetivo_programa') }}</textarea>
                  @error('objetivo_programa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Ação Programa</label>
                  <select name="tipo_acao_programa" id="tipo_acao_programa" class="form-select @error('tipo_acao_programa') is-invalid @enderror" required>
                    <option value="">Selecione o Tipo de Ação</option> {{-- Adicionado placeholder --}}
                    @foreach($dataTipoacao as $item)
                      <option value="{{ $item->nome}}" {{ old('tipo_acao_programa') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('tipo_acao_programa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Código Programa</label>
                  <input type="text" name="codigo_programa" class="form-control @error('codigo_programa') is-invalid @enderror" placeholder="Código do programa" value="{{ old('codigo_programa') }}">
                  @error('codigo_programa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Programa</label>
                  <input type="text" name="descricao_programa" class="form-control @error('descricao_programa') is-invalid @enderror" placeholder="Descrição do programa" value="{{ old('descricao_programa') }}">
                  @error('descricao_programa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <select name="entidade" class="form-select @error('entidade') is-invalid @enderror" required>
                    <option value="">Selecione a Entidade</option> {{-- Adicionado placeholder --}}
                    @foreach($dataEntidade as $item)
                      <option value="{{ $item->nome}}" {{ old('entidade') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('entidade')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Órgão</label>
                  <select name="orgao" id="orgao" class="form-select @error('orgao') is-invalid @enderror" required>
                    <option value="">Selecione o Órgão</option> {{-- Adicionado placeholder --}}
                    @foreach($dataNomeorgao as $item)
                      <option value="{{ $item->nome }}" {{ old('orgao') == $item->nome ? 'selected' : '' }}>{{ $item->nome}}</option>
                    @endforeach
                  </select>
                  @error('orgao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Código Órgão</label>
                  <input type="text" name="codigo_orgao" class="form-control @error('codigo_orgao') is-invalid @enderror" placeholder="Código do órgão" value="{{ old('codigo_orgao') }}">
                  @error('codigo_orgao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Unidade</label>
                  <select name="unidade" class="form-select @error('unidade') is-invalid @enderror" required>
                    <option value="">Selecione a Unidade</option> {{-- Adicionado placeholder --}}
                    @foreach($dataUnidade as $item)
                      <option value="{{ $item->nome}}" {{ old('unidade') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('unidade')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Código Unidade</label>
                  <input type="text" name="codigo_unidade" class="form-control @error('codigo_unidade') is-invalid @enderror" placeholder="Código da unidade" value="{{ old('codigo_unidade') }}">
                  @error('codigo_unidade')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                 <select name="credor_nome" id="nome_credor" class="form-select @error('credor_nome') is-invalid @enderror" required>
                    <option value="">Selecione o Nome do Credor</option> {{-- Adicionado placeholder --}}
                    @foreach($dataNomecredor as $item)
                      <option value="{{ $item->nome }}" {{ old('credor_nome') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('credor_nome')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">CNPJ/CPF Credor</label>
                  <input type="text" name="credor_cnpj_cpf" class="form-control @error('credor_cnpj_cpf') is-invalid @enderror" placeholder="00.000.000/0000-00" value="{{ old('credor_cnpj_cpf') }}">
                  @error('credor_cnpj_cpf')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Natureza Jurídica</label>
                  <select name="credor_natureza_juridica" id="credor_natureza_juridica" class="form-select @error('credor_natureza_juridica') is-invalid @enderror" required>
                    <option value="">Selecione a Natureza Jurídica</option> {{-- Adicionado placeholder --}}
                    @foreach($dataNaturezajuridica as $item)
                      <option value="{{ $item->nome }}" {{ old('credor_natureza_juridica') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('credor_natureza_juridica')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <input type="text" name="codigo_funcao" class="form-control @error('codigo_funcao') is-invalid @enderror" placeholder="00" value="{{ old('codigo_funcao') }}">
                  @error('codigo_funcao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Função</label>
                  <input type="text" name="descricao_funcao" class="form-control @error('descricao_funcao') is-invalid @enderror" placeholder="Descrição" value="{{ old('descricao_funcao') }}">
                  @error('descricao_funcao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Código Subfunção</label>
                  <input type="text" name="codigo_subfuncao" class="form-control @error('codigo_subfuncao') is-invalid @enderror" placeholder="000" value="{{ old('codigo_subfuncao') }}">
                  @error('codigo_subfuncao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Subfunção</label>
                  <input type="text" name="descricao_subfuncao" class="form-control @error('descricao_subfuncao') is-invalid @enderror" placeholder="Descrição" value="{{ old('descricao_subfuncao') }}">
                  @error('descricao_subfuncao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <input type="text" name="codigo_acao" class="form-control @error('codigo_acao') is-invalid @enderror" placeholder="Código da ação" value="{{ old('codigo_acao') }}">
                  @error('codigo_acao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Ação</label>
                  <input type="text" name="descricao_acao" class="form-control @error('descricao_acao') is-invalid @enderror" placeholder="Descrição da ação" value="{{ old('descricao_acao') }}">
                  @error('descricao_acao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <input type="text" name="codigo_elemento" class="form-control @error('codigo_elemento') is-invalid @enderror" placeholder="Código" value="{{ old('codigo_elemento') }}">
                  @error('codigo_elemento')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Descrição Elemento</label>
                  <input type="text" name="descricao_elemento" class="form-control @error('descricao_elemento') is-invalid @enderror" placeholder="Descrição" value="{{ old('descricao_elemento') }}">
                  @error('descricao_elemento')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Máscara Natureza</label>
                  <input type="text" name="mascara_natureza" class="form-control @error('mascara_natureza') is-invalid @enderror" placeholder="0.0.00.00.00" value="{{ old('mascara_natureza') }}">
                  @error('mascara_natureza')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Natureza Despesa</label>
                  <input type="text" name="natureza_despesa" class="form-control @error('natureza_despesa') is-invalid @enderror" placeholder="Natureza" value="{{ old('natureza_despesa') }}">
                  @error('natureza_despesa')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <input type="text" name="codigo_recurso" class="form-control @error('codigo_recurso') is-invalid @enderror" placeholder="Código do recurso" value="{{ old('codigo_recurso') }}">
                  @error('codigo_recurso')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição Recurso</label>
                  <input type="text" name="descricao_recurso" class="form-control @error('descricao_recurso') is-invalid @enderror" placeholder="Descrição do recurso" value="{{ old('descricao_recurso') }}">
                  @error('descricao_recurso')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Recurso</label>
                  <select name="tipo_recurso" id="tipo_recurso" class="form-select @error('tipo_recurso') is-invalid @enderror" required>
                    <option value="">Selecione o Tipo de Recurso</option> {{-- Adicionado placeholder --}}
                    @foreach($dataTiporecurso as $item)
                      <option value="{{ $item->nome }}" {{ old('tipo_recurso') == $item->nome ? 'selected' : '' }}>{{ $item->nome }}</option>
                    @endforeach
                  </select>
                  @error('tipo_recurso')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <input type="text" name="modalidade_aplicacao" class="form-control @error('modalidade_aplicacao') is-invalid @enderror" placeholder="Modalidade de aplicação" value="{{ old('modalidade_aplicacao') }}">
                  @error('modalidade_aplicacao')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo Poder</label>
                  <select name="tipo_poder" class="form-select @error('tipo_poder') is-invalid @enderror" required>
                    <option value="">Selecione o Tipo de Poder</option> {{-- Adicionado placeholder --}}
                    @foreach($dataTipoPoder as $poder)
                      <option value="{{ $poder->nome}}" {{ old('tipo_poder') == $poder->nome ? 'selected' : '' }}>{{ $poder->nome }}</option>
                    @endforeach
                  </select>
                  @error('tipo_poder')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row gy-3 mt-3"> {{-- Adicionei mt-3 para espaçamento --}}
                 <div class="col-12">
                  <label class="form-label" for="observacoes">Observações</label>
                  <textarea name="observacoes" id="observacoes" class="form-control @error('observacoes') is-invalid @enderror" rows="3" placeholder="Digite observações adicionais">{{ old('observacoes') }}</textarea>
                  @error('observacoes')
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

<!-- jQuery (se ainda não estiver incluso) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  
  // Adiciona a classe 'is-invalid' e 'invalid-feedback' para os campos
  // que já possuem erro após o carregamento da página (ex: ao voltar do submit)
  $('.form-control, .form-select').each(function() {
    var fieldName = $(this).attr('name');
    if ($('.invalid-feedback[data-field="' + fieldName + '"]').length) {
      $(this).addClass('is-invalid');
    }
  });
});
</script>
