<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Receita Orçamentaria') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('despreceitaex')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Receita Orçamentaria') }}
      </a>
    </li>
   
    
  </ul>
</div>


<!-----receita despesas extra orcamentaria--->
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
      <a href="{{ route('despreceitaex.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Registro de Receita/Despesa Extra Orçamentária #<small>{{$data->numero}}</small></h3>
              <p class="mb-1 text-sm">Classificação: <small>{{$data->classificacao}}</small></p>
              <p class="mb-0 text-sm">Data de Criação: <small>{{$data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : 'N/A'}}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{$data->fonte_recursos}}</small></h4>
              <p class="mb-1 text-sm">ID do Registro: <small>{{$data->id}}</small></p>
              <p class="mb-0 text-sm">Última Atualização: <small>{{$data->updated_at ? date('d/m/Y H:i', strtotime($data->updated_at)) : 'N/A'}}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Informações Principais:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Classificação</td>
                      <td class="ps-8">: <small>{{$data->classificacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Descrição da Classificação</td>
                      <td class="ps-8">: <small>{{$data->descricao_classificacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Fonte de Recursos</td>
                      <td class="ps-8">: <small>{{$data->fonte_recursos}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Máscara</td>
                      <td class="ps-8">: <small>{{$data->mascara}}</small></td>
                    </tr>
                    <tr>
                      <td>Número de Identificação</td>
                      <td class="ps-8">: <small>{{$data->numero}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Classificação:</span> <small>{{$data->classificacao}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Fonte de Recursos:</span> <small>{{$data->fonte_recursos}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Máscara:</span> <small>{{$data->mascara}}</small></p>
                </div>
                <div>
                 
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Registro Extra Orçamentário</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID do Registro: <small>{{$data->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Transparência</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function printReceiptExtra() {
    window.print();
  }
</script>

</x-app-layout>
