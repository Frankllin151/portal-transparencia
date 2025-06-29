<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Contrato Item') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("contratos_item")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Contrato Item') }}
      </a>
    </li>
   
    
  </ul>
</div>

<div class="card">
  <div class="card-header">

    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
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
      <!-- Botão Voltar -->
     
      <!-- Botão Editar (assumindo a rota 'contratos_item.edit') -->
      <a href="{{ route('contratos_item.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1" title="Editar Item de Contrato">
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
    <div class="row justify-content-center" id="detalhes-item-contrato">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Item Contrato: <small>{{ $data->codigo_item_contrato ?? 'N/A' }}</small></h3>
              <p class="mb-1 text-sm">Descrição: <small>{{ $data->descricao_item_contrato ?? 'N/A' }}</small></p>
              <p class="mb-0 text-sm">Contratado: <small>{{ $data->contrato->contratado ?? 'N/A' }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>Valor Total: R$ {{ number_format($data->valor_total, 2, ',', '.') }}</small></h4>
              <p class="mb-1 text-sm">Quantidade: <small>{{ $data->quantidade ?? 'N/A' }}</small></p>
              <p class="mb-0 text-sm">ID do Item: <small>{{ $data->id }}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <!-- Informações Detalhadas do Item -->
            <div class="mb-4">
              <h6 class="text-md mb-3">Dados do Item</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Código do Item</td>
                        <td class="ps-8">: <small>{{ $data->codigo_item_contrato ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Descrição do Item</td>
                        <td class="ps-8">: <small>{{ $data->descricao_item_contrato ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Unidade de Medida</td>
                        <td class="ps-8">: <small>{{ $data->unidade_medida ?? 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Quantidade</td>
                        <td class="ps-8">: <small>{{ $data->quantidade ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Valor Unitário</td>
                        <td class="ps-8">: <small>R$ {{ number_format($data->valor_unitario, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Valor Total</td>
                        <td class="ps-8">: <small>R$ {{ number_format($data->valor_total, 2, ',', '.') }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Informações do Contrato Pai (se existir) -->
            @if ($data->contrato)
            <div class="mt-24 mb-4">
              <h6 class="text-md mb-3">Dados do Contrato Vinculado</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Contratado</td>
                        <td class="ps-8">: <small>{{ $data->contrato->contratado ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Número do Contrato</td>
                        <td class="ps-8">: <small>{{ $data->contrato->numero_contrato ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Ano do Contrato</td>
                        <td class="ps-8">: <small>{{ $data->contrato->ano ?? 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Tipo de Contrato</td>
                        <td class="ps-8">: <small>{{ $data->contrato->tipo_contrato ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Situação do Contrato</td>
                        <td class="ps-8">: <small>{{ $data->contrato->situacao ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Valor Inicial do Contrato</td>
                        <td class="ps-8">: <small>R$ {{ number_format($data->contrato->valor_inicial ?? 0, 2, ',', '.') }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif

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
              <p class="text-center text-secondary-light text-sm fw-semibold">Sistema de Gestão de Contratos (Itens)</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID do Item: <small>{{ $data->id }}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Gerado em: {{ date('d/m/Y H:i') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-app-layout>