<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Movimentação Bancaria') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('movimentacao')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Movimentação Bancaria') }}
      </a>
    </li>
   
    
  </ul>
</div>


<!-- Show Movimentação bancaria-->
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
      <a href="{{ route('movimentacaobancaria.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="movimentacao-bancaria-detalhes">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Movimentação Bancária #<small>{{ $data->codigo_conta }}</small></h3>
              <p class="mb-1 text-sm">Entidade: <small>{{ $data->nome_entidade }}</small></p>
              <p class="mb-0 text-sm">Criado em: <small>{{ $data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : 'N/A' }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{ $data->nome_banco }}</small></h4>
              <p class="mb-1 text-sm">Agência: <small>{{ $data->numero_agencia }} - {{ $data->descricao_agencia }}</small></p>
              <p class="mb-0 text-sm">ID: <small>{{ $data->id }}</small></p>
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Dados da Conta:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Código da Conta</td>
                      <td class="ps-8">: <small>{{ $data->codigo_conta }}</small></td>
                    </tr>
                    <tr>
                      <td>Código do Banco</td>
                      <td class="ps-8">: <small>{{ $data->codigo_banco }}</small></td>
                    </tr>
                    <tr>
                      <td>Nome do Banco</td>
                      <td class="ps-8">: <small>{{ $data->nome_banco }}</small></td>
                    </tr>
                    <tr>
                      <td>Número da Agência</td>
                      <td class="ps-8">: <small>{{ $data->numero_agencia }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Descrição da Agência</td>
                      <td class="ps-8">: <small>{{ $data->descricao_agencia }}</small></td>
                    </tr>
                    <tr>
                      <td>Número da Conta</td>
                      <td class="ps-8">: <small>{{ $data->numero_conta }}</small></td>
                    </tr>
                    <tr>
                      <td>Tipo da Conta</td>
                      <td class="ps-8">: <small>{{ $data->tipo_conta }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Entidade:</span> <small>{{ $data->nome_entidade }}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Banco:</span> <small>{{ $data->nome_banco }}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Número da Conta:</span> <small>{{ $data->numero_conta }}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Tipo da Conta:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->tipo_conta }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Código da Conta:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->codigo_conta }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Agência:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->numero_agencia }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">Atualizado em:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->updated_at ? date('d/m/Y H:i', strtotime($data->updated_at)) : 'N/A' }}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Movimentação Bancária</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{ $data->id }}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Movimentação Bancária</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
