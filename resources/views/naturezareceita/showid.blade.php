<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Natureza Receita') }} :{{$naturezaReceita->codigo}}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route('natureza')}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Natureza Receita') }}
      </a>
    </li>
   
    
  </ul>
</div>

<!-- Show Natureza Receita-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
      <!-- Estes botões são placeholders, ajuste as rotas conforme necessário -->
      <a href="javascript:void(0)" class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
        Enviar
      </a>
      <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
      <!-- Supondo uma rota 'naturezareceita.edit' -->
      <a href="{{ route('naturezareceita.edit', $naturezaReceita->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="natureza-receita-detalhes">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Natureza de Receita #<small>{{$naturezaReceita->codigo}}</small></h3>
              <p class="mb-1 text-sm">Descrição: <small>{{$naturezaReceita->descricao}}</small></p>
              <p class="mb-0 text-sm">Criado em: <small>{{$naturezaReceita->created_at ? date('d/m/Y H:i', strtotime($naturezaReceita->created_at)) : 'N/A'}}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{$naturezaReceita->categoria_economica}}</small></h4>
              <p class="mb-1 text-sm">Origem: <small>{{$naturezaReceita->origem}}</small></p>
              <p class="mb-0 text-sm">ID: <small>{{$naturezaReceita->id}}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <!-- Informações da Natureza de Receita -->
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Detalhamento da Receita:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Espécie</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->especie}}</small></td>
                    </tr>
                    <tr>
                      <td>Tipo</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->tipo}}</small></td>
                    </tr>
                    <tr>
                      <td>Rubrica</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->rubrica}}</small></td>
                    </tr>
                    <tr>
                      <td>Alínea</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->alinea}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Subalínea</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->subalinea}}</small></td>
                    </tr>
                    <tr>
                      <td>Desdobramento Nível 1</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->desdobramento_nivel_1}}</small></td>
                    </tr>
                    <tr>
                      <td>Desdobramento Nível 2</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->desdobramento_nivel_2}}</small></td>
                    </tr>
                    <tr>
                      <td>Desdobramento Nível 3</td>
                      <td class="ps-8">: <small>{{$naturezaReceita->desdobramento_nivel_3}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Resumo Final -->
            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Código:</span> <small>{{$naturezaReceita->codigo}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Descrição:</span> <small>{{$naturezaReceita->descricao}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Categoria Econômica:</span> <small>{{$naturezaReceita->categoria_economica}}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Origem:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$naturezaReceita->origem}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Espécie:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$naturezaReceita->especie}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Tipo:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{$naturezaReceita->tipo}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">Atualizado em:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold"><small>{{$naturezaReceita->updated_at ? date('d/m/Y H:i', strtotime($naturezaReceita->updated_at)) : 'N/A'}}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Natureza de Receita</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{$naturezaReceita->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Natureza de Receita</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
