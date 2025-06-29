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
    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
      <!-- Botão Voltar -->
      <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
        Voltar
      </a>
      <a href="javascript:void(0)" class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
        Enviar
      </a>
      <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
      <!-- Botão Editar (assumindo a rota 'contratos.edit') -->
      <a href="{{ route('contratos.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1" title="Editar Contrato">
        <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
        Editar
      </a>
      <!-- Botão Imprimir -->
      <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1" onclick="window.print()" title="Imprimir Detalhes">
        <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
        Imprimir
      </button>
    </div>
  </div>
  <div class="card-body py-40">
    <div class="row justify-content-center" id="detalhes-contrato">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Contrato: <small>{{ $data->numero_contrato }} / {{ $data->ano }}</small></h3>
              <p class="mb-1 text-sm">Contratado: <small>{{ $data->contratado }}</small></p>
              <p class="mb-0 text-sm">Entidade: <small>{{ $data->entidade }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>Valor Inicial: R$ {{ number_format($data->valor_inicial, 2, ',', '.') }}</small></h4>
              <p class="mb-1 text-sm">Situação: <span class="badge 
                @if($data->situacao == 'Ativo') bg-success 
                @elseif($data->situacao == 'Encerrado') bg-danger 
                @elseif($data->situacao == 'Pendente') bg-warning 
                @else bg-secondary @endif
                "><small>{{ $data->situacao }}</small></span></p>
              <p class="mb-0 text-sm">ID: <small>{{ $data->id }}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <!-- Informações Gerais do Contrato -->
            <div class="mb-4">
              <h6 class="text-md mb-3">Dados Principais</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Número Contrato</td>
                        <td class="ps-8">: <small>{{ $data->numero_contrato }}</small></td>
                      </tr>
                      <tr>
                        <td>Ano</td>
                        <td class="ps-8">: <small>{{ $data->ano }}</small></td>
                      </tr>
                      <tr>
                        <td>Entidade</td>
                        <td class="ps-8">: <small>{{ $data->entidade }}</small></td>
                      </tr>
                      <tr>
                        <td>Contratado</td>
                        <td class="ps-8">: <small>{{ $data->contratado }}</small></td>
                      </tr>
                      <tr>
                        <td>Tipo de Contrato</td>
                        <td class="ps-8">: <small>{{ $data->tipo_contrato }}</small></td>
                      </tr>
                      <tr>
                        <td>Modalidade Licitação</td>
                        <td class="ps-8">: <small>{{ $data->modalidade_licitacao }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Número Processo</td>
                        <td class="ps-8">: <small>{{ $data->numero_processo }}</small></td>
                      </tr>
                      <tr>
                        <td>Número Licitação</td>
                        <td class="ps-8">: <small>{{ $data->numero_licitacao }}</small></td>
                      </tr>
                      <tr>
                        <td>Instrumento Contrato</td>
                        <td class="ps-8">: <small>{{ $data->instrumento_contrato }}</small></td>
                      </tr>
                      <tr>
                        <td>Código Fornecedor</td>
                        <td class="ps-8">: <small>{{ $data->codigo_fornecedor }}</small></td>
                      </tr>
                      <tr>
                        <td>Código Processo</td>
                        <td class="ps-8">: <small>{{ $data->codigo_processo }}</small></td>
                      </tr>
                      <tr>
                        <td>Subcontratação</td>
                        <td class="ps-8">: <small>{{ $data->subcontratacao }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Datas e Valores -->
            <div class="mt-24 mb-4">
              <h6 class="text-md mb-3">Prazos e Valores</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Data de Assinatura</td>
                        <td class="ps-8">: <small>{{ $data->data_assinatura ? date('d/m/Y', strtotime($data->data_assinatura)) : 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Vigência Inicial</td>
                        <td class="ps-8">: <small>{{ $data->data_vigencia_inicial ? date('d/m/Y', strtotime($data->data_vigencia_inicial)) : 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Vigência Final</td>
                        <td class="ps-8">: <small>{{ $data->data_vigencia_final ? date('d/m/Y', strtotime($data->data_vigencia_final)) : 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Valor Inicial</td>
                        <td class="ps-8">: <small>R$ {{ number_format($data->valor_inicial, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Valor Final</td>
                        <td class="ps-8">: <small>R$ {{ number_format($data->valor_final, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Competência</td>
                        <td class="ps-8">: <small>{{ $data->competencia }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Timestamps -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Registro do Sistema</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Criado em</td>
                        <td class="ps-8">: <small>{{ $data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Última Atualização</td>
                        <td class="ps-8">: <small>{{ $data->updated_at ? date('d/m/Y H:i', strtotime($data->updated_at)) : 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Sistema de Gestão de Contratos</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID do Contrato: <small>{{ $data->id }}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Gerado em: {{ date('d/m/Y H:i') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-app-layout>