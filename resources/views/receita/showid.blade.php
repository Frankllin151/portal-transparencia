<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __(' Receita') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('receita')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __(' Receita') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!-- Showid Receita-->
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
      <a href="{{ route('receita.edit', $receita->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="receita-detalhes">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Detalhes da Receita #<small>{{$receita->id}}</small></h3>
              <p class="mb-1 text-sm">Finalidade: <small>{{$receita->finalidade}}</small></p>
              <p class="mb-0 text-sm">Data: <small>{{ date('d/m/Y', strtotime($receita->data)) }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{$receita->forma_ingresso}}</small></h4>
              <p class="mb-1 text-sm">Natureza Código: <small>{{$receita->NaturezaReceitum->codigo}}</small></p>
              <p class="mb-0 text-sm">Receita Corrente Líquida: <small>{{ $receita->receita_corrente_liquida ? 'Sim' : 'Não' }}</small></p>
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Valores Orçamentários:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Valor Orçado Inicial</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_orcado_inicial, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Orçado Atualizado</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_orcado_atualizado, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Deduções Orçado</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_deducoes_orcado, 2, ',', '.') }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <h6 class="text-md">Valores Arrecadados e Lançados:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Valor Arrecadado Mês</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_arrecadado_mes, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Arrecadado Acumulado</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_arrecadado_acumulado, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Deduções Mês</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_deducoes_mes, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Lançado Mês</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_lancado_mes, 2, ',', '.') }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor Lançado Período</td>
                      <td class="ps-8">: <small>R$ {{ number_format($receita->valor_lancado_periodo, 2, ',', '.') }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Finalidade:</span> <small>{{$receita->finalidade}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Forma de Ingresso:</span> <small>{{$receita->forma_ingresso}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Realizado Percentual:</span> <small>{{ number_format($receita->realizado_percentual, 2, ',', '.') }}%</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Data:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ date('d/m/Y', strtotime($receita->data)) }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Natureza Código:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$receita->NaturezaReceitum->codigo}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Receita Corrente Líquida:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{ $receita->receita_corrente_liquida ? 'Sim' : 'Não' }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">ID:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold"><small>{{$receita->id}}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Receita</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{$receita->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Receita</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
