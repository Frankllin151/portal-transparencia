<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __(' Pagamentos de Receitas e Despesas') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('pagamentosdespesasreceita')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __(' Pagamentos de Receitas e Despesas') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!-- Showid pagamento Receita Depesas Extra Orçamentaria-->
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
      {{-- Substitua 'receita.edit' pela rota correta para editar PagamentosReceitasDespesasExtraorcamentaria --}}
      <a href="{{route('pagamentosdespesasreceita.edit' , $data->id)}}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
        Editar
      </a>
      <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1" onclick="window.print()">
        <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
        Imprimir
      </button>
    </div>
  </div>
  <div class="card-body py-40">
    <div class="row justify-content-center" id="pagamento-detalhes"> {{-- ID alterado para refletir o contexto --}}
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Detalhes do Pagamento #<small>{{$data->id}}</small></h3>
              <p class="mb-1 text-sm">Histórico: <small>{{$data->historico}}</small></p>
              <p class="mb-0 text-sm">Data do Pagamento: <small>{{ date('d/m/Y', strtotime($data->data_pagamento)) }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>R$ {{ number_format($data->valor, 2, ',', '.') }}</small></h4>
              <p class="mb-1 text-sm">Número do Pagamento: <small>{{$data->numero_pagamento}}</small></p>
              <p class="mb-0 text-sm">Beneficiário: <small>{{$data->nome_beneficiario}}</small></p>
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Informações do Beneficiário:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>CPF/CNPJ</td>
                      <td class="ps-8">: <small>{{$data->cpf_cnpj_beneficiario}}</small></td>
                    </tr>
                    <tr>
                      <td>Nome</td>
                      <td class="ps-8">: <small>{{$data->nome_beneficiario}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <h6 class="text-md">Detalhes da Classificação Extra Orçamentária:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Classificação</td>
                      <td class="ps-8">: <small>{{$data->receitasdespesasextraorcamentarium->classificacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Descrição</td>
                      <td class="ps-8">: <small>{{$data->receitasdespesasextraorcamentarium->descricao_classificacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Fonte de Recursos</td>
                      <td class="ps-8">: <small>{{$data->receitasdespesasextraorcamentarium->fonte_recursos}}</small></td>
                    </tr>
                    <tr>
                      <td>Máscara</td>
                      <td class="ps-8">: <small>{{$data->receitasdespesasextraorcamentarium->mascara}}</small></td>
                    </tr>
                    <tr>
                      <td>Número</td>
                      <td class="ps-8">: <small>{{$data->receitasdespesasextraorcamentarium->numero}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">ID do Pagamento:</span> <small>{{$data->id}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Número do Pagamento:</span> <small>{{$data->numero_pagamento}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Valor:</span> <small>R$ {{ number_format($data->valor, 2, ',', '.') }}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Data do Pagamento:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ date('d/m/Y', strtotime($data->data_pagamento)) }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">ID da Classificação Extra:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$data->receita_depesa_extraorcamentaria_id}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Classificação Extra:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{$data->receitasdespesasextraorcamentarium->classificacao}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">Beneficiário:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold"><small>{{$data->nome_beneficiario}}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Pagamento Extra Orçamentário</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{$data->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Pagamentos Extra Orçamentários</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
