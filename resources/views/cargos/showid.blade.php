<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Cargo') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("cargos")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Cargo') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!----Tabela Cargos--->
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
      <a href="{{ route('cargos.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="cargo-detalhes">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Cargo: <small>{{ $data->descricao_cargo }}</small></h3>
              <p class="mb-1 text-sm">Competência: <small>{{ $data->competencia }}</small></p>
              <p class="mb-0 text-sm">Criado em: <small>{{ $data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : 'N/A' }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{ $data->situacao_cargo }}</small></h4>
              <p class="mb-1 text-sm">Classificação: <small>{{ $data->classificacao_cargo }}</small></p>
              <p class="mb-0 text-sm">ID: <small>{{ $data->id }}</small></p>
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Detalhamento do Cargo:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Ano</td>
                      <td class="ps-8">: <small>{{ $data->ano }}</small></td>
                    </tr>
                    <tr>
                      <td>Competência</td>
                      <td class="ps-8">: <small>{{ $data->competencia }}</small></td>
                    </tr>
                    <tr>
                      <td>Situação do Cargo</td>
                      <td class="ps-8">: <small>{{ $data->situacao_cargo }}</small></td>
                    </tr>
                    <tr>
                      <td>Classificação do Cargo</td>
                      <td class="ps-8">: <small>{{ $data->classificacao_cargo }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Descrição do Cargo</td>
                      <td class="ps-8">: <small>{{ $data->descricao_cargo }}</small></td>
                    </tr>
                    <tr>
                      <td>ID do Registro</td>
                      <td class="ps-8">: <small>{{ $data->id }}</small></td>
                    </tr>
                    <tr>
                      <td>Criado em</td>
                      <td class="ps-8">: <small>{{ $data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Última Atualização</td>
                      <td class="ps-8">: <small>{{ $data->updated_at ? date('d/m/Y H:i', strtotime($data->updated_at)) : 'N/A' }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Descrição do Cargo:</span> <small>{{ $data->descricao_cargo }}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Situação:</span> <small>{{ $data->situacao_cargo }}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Classificação:</span> <small>{{ $data->classificacao_cargo }}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Ano:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->ano }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Competência:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->competencia }}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">ID:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{ $data->id }}</small></span>
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
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Cargo</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{ $data->id }}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Gestão de Cargos</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
