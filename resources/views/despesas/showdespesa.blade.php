
<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Despesas') }}: <small>{{$despesa->credor_cnpj_cpf}}</small></h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{ route('despesas') }}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Despesas') }} : 
      </a>
    </li>
   
    
  </ul>
</div>

<!--Despesa-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
      <a href="javascript:void(0)" class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
        Enviar
      </a>
      <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
      <a  href="{{route("despesas.show", $despesa->id)}}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
        Editar
      </a>
      <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1" onclick="printInvoice()">
        <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
        Imprimir
      </button>
    </div>
  </div>
  <div class="card-body py-40">
    <div class="row justify-content-center" id="invoice">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Despesa #<small>{{$despesa->numero_empenho}}</small></h3>
              <p class="mb-1 text-sm">Ano Exercício: <small>{{$despesa->ano_exercicio}}</small></p>
              <p class="mb-0 text-sm">Data Empenho: <small>{{$despesa->data_empenho ? date('d/m/Y', strtotime($despesa->data_empenho)) : 'N/A'}}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{$despesa->orgao}}</small></h4>
              <p class="mb-1 text-sm"><small>{{$despesa->unidade}}</small></p>
              <p class="mb-0 text-sm">Código: <small>{{$despesa->codigo_unidade}}</small></p>
            </div>
          </div>
          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Informações do Credor:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Nome</td>
                      <td class="ps-8">: <small>{{$despesa->credor_nome}}</small></td>
                    </tr>
                    <tr>
                      <td>CNPJ/CPF</td>
                      <td class="ps-8">: <small>{{$despesa->credor_cnpj_cpf}}</small></td>
                    </tr>
                    <tr>
                      <td>Natureza Jurídica</td>
                      <td class="ps-8">: <small>{{$despesa->credor_natureza_juridica}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Data Liquidação</td>
                      <td class="ps-8">: <small>{{$despesa->data_liquidacao ? date('d/m/Y', strtotime($despesa->data_liquidacao)) : 'N/A'}}</small></td>
                    </tr>
                    <tr>
                      <td>Data Pagamento</td>
                      <td class="ps-8">: <small>{{$despesa->data_pagamento ? date('d/m/Y', strtotime($despesa->data_pagamento)) : 'N/A'}}</small></td>
                    </tr>
                    <tr>
                      <td>Tipo Empenho</td>
                      <td class="ps-8">: <small>{{$despesa->tipo_empenho}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Histórico do Empenho -->
            <div class="mt-24">
              <h6 class="text-md mb-2">Histórico do Empenho:</h6>
              <p class="text-sm text-secondary-light"><small>{{$despesa->historico_empenho}}</small></p>
            </div>

            <!-- Valores Financeiros -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Valores Financeiros</h6>
              <div class="table-responsive scroll-sm">
                <table class="table bordered-table text-sm">
                  <thead>
                    <tr>
                      <th scope="col" class="text-sm">Tipo</th>
                      <th scope="col" class="text-sm">Valor</th>
                      <th scope="col" class="text-sm">Percentual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Valor Orçado</td>
                      <td>R$ <small>{{number_format($despesa->valor_orcado ?? 0, 2, ',', '.')}}</small></td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>Valor Empenhado</td>
                      <td>R$ <small>{{number_format($despesa->valor_empenho ?? 0, 2, ',', '.')}}</small></td>
                      <td><small>{{$despesa->porcentagem_empenhado_sobre_orcado ?? 0}}%</small></td>
                    </tr>
                    <tr>
                      <td>Valor Liquidado</td>
                      <td>R$ <small>{{number_format($despesa->valor_liquidado ?? 0, 2, ',', '.')}}</small></td>
                      <td><small>{{$despesa->porcentagem_liquidado_sobre_orcado ?? 0}}%</small></td>
                    </tr>
                    <tr>
                      <td>Valor Pago</td>
                      <td>R$ <small>{{number_format($despesa->valor_pago ?? 0, 2, ',', '.')}}</small></td>
                      <td><small>{{$despesa->porcentagem_pago_sobre_orcado ?? 0}}%</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Classificação Orçamentária -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Classificação Orçamentária</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Função</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_funcao}} - {{$despesa->descricao_funcao}}</small></td>
                      </tr>
                      <tr>
                        <td>Subfunção</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_subfuncao}} - {{$despesa->descricao_subfuncao}}</small></td>
                      </tr>
                      <tr>
                        <td>Programa</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_programa}} - {{$despesa->descricao_programa}}</small></td>
                      </tr>
                      <tr>
                        <td>Ação</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_acao}} - {{$despesa->descricao_acao}}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Elemento</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_elemento}} - {{$despesa->descricao_elemento}}</small></td>
                      </tr>
                      <tr>
                        <td>Natureza</td>
                        <td class="ps-8">: <small>{{$despesa->mascara_natureza}} - {{$despesa->natureza_despesa}}</small></td>
                      </tr>
                      <tr>
                        <td>Recurso</td>
                        <td class="ps-8">: <small>{{$despesa->codigo_recurso}} - {{$despesa->descricao_recurso}}</small></td>
                      </tr>
                      <tr>
                        <td>Modalidade</td>
                        <td class="ps-8">: <small>{{$despesa->modalidade_aplicacao}}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Programa Details -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Detalhes do Programa</h6>
              <div class="row">
                <div class="col-md-4">
                  <p class="text-sm mb-2"><strong>Finalidade:</strong></p>
                  <p class="text-sm text-secondary-light"><small>{{$despesa->finalidade_programa}}</small></p>
                </div>
                <div class="col-md-4">
                  <p class="text-sm mb-2"><strong>Objetivo:</strong></p>
                  <p class="text-sm text-secondary-light"><small>{{$despesa->objetivo_programa}}</small></p>
                </div>
                <div class="col-md-4">
                  <p class="text-sm mb-2"><strong>Tipo Ação:</strong></p>
                  <p class="text-sm text-secondary-light"><small>{{$despesa->tipo_acao_programa}}</small></p>
                </div>
              </div>
            </div>

            <!-- Resumo Final -->
            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Entidade:</span> <small>{{$despesa->entidade}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Tipo Poder:</span> <small>{{$despesa->tipo_poder}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Tipo Recurso:</span> <small>{{$despesa->tipo_recurso}}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Valor Atualizado:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold">R$ <small>{{number_format($despesa->valor_atualizado ?? 0, 2, ',', '.')}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Valor Alterado:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold">R$ <small>{{number_format($despesa->valor_alterado ?? 0, 2, ',', '.')}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Categoria:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{$despesa->categoria_empenho}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">Total Empenhado:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold">R$ <small>{{number_format($despesa->valor_empenho ?? 0, 2, ',', '.')}}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Despesa Pública</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{$despesa->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Controle</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>