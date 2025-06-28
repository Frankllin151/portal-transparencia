<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Servidores') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("servidores")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Servidores') }}
      </a>
    </li>
   
    
  </ul>
</div>
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
      <a href="{{ route('servidores.edit', $servidor->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="detalhes-servidor">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Servidor: <small>{{ $servidor->nome_servidor }}</small></h3>
              <p class="mb-1 text-sm">Matrícula: <small>{{ $servidor->matricula }}</small></p>
              <p class="mb-0 text-sm">Vínculo: <small>{{ $servidor->vinculo_empregaticio }}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{ $servidor->entidade }}</small></h4>
              <p class="mb-1 text-sm">Situação: <span class="badge 
                @if($servidor->situacao == 'Ativo') bg-success 
                @elseif($servidor->situacao == 'Inativo' || $servidor->situacao == 'Exonerado') bg-danger 
                @else bg-secondary @endif
                "><small>{{ $servidor->situacao }}</small></span></p>
              <p class="mb-0 text-sm">ID: <small>{{ $servidor->id }}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <!-- Informações Básicas e Administrativas -->
            <div class="mb-4">
              <h6 class="text-md mb-3">Dados Administrativos</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Nome Completo</td>
                        <td class="ps-8">: <small>{{ $servidor->nome_servidor }}</small></td>
                      </tr>
                      <tr>
                        <td>Matrícula</td>
                        <td class="ps-8">: <small>{{ $servidor->matricula }}</small></td>
                      </tr>
                      <tr>
                        <td>Vínculo Empregatício</td>
                        <td class="ps-8">: <small>{{ $servidor->vinculo_empregaticio }}</small></td>
                      </tr>
                      <tr>
                        <td>Entidade</td>
                        <td class="ps-8">: <small>{{ $servidor->entidade }}</small></td>
                      </tr>
                      <tr>
                        <td>Órgão</td>
                        <td class="ps-8">: <small>{{ $servidor->orgao }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Lotação</td>
                        <td class="ps-8">: <small>{{ $servidor->lotacao }}</small></td>
                      </tr>
                      <tr>
                        <td>Data de Admissão</td>
                        <td class="ps-8">: <small>{{ $servidor->data_admissao ? date('d/m/Y', strtotime($servidor->data_admissao)) : 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Situação</td>
                        <td class="ps-8">: <small>{{ $servidor->situacao }}</small></td>
                      </tr>
                      <tr>
                        <td>Classificação de Afastamento</td>
                        <td class="ps-8">: <small>{{ $servidor->classificacao_afastamento ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Efetivo em Cargo Comissionado</td>
                        <td class="ps-8">: <small>{{ $servidor->efetivo_em_cargo_comissionado == '1' ? 'Sim' : 'Não' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Informações de Cargo Relacionado -->
            @if ($servidor->cargo) {{-- Verifica se há um cargo relacionado --}}
            <div class="mt-24 mb-4">
              <h6 class="text-md mb-3">Dados do Cargo</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Descrição do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->descricao_cargo ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Classificação do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->classificacao_cargo ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Situação do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->situacao_cargo ?? 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Ano do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->ano ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>Competência do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->competencia ?? 'N/A' }}</small></td>
                      </tr>
                      <tr>
                        <td>ID do Cargo</td>
                        <td class="ps-8">: <small>{{ $servidor->cargo->id ?? 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif

            <!-- Informações Financeiras -->
            <div class="mt-24 mb-4">
              <h6 class="text-md mb-3">Dados Financeiros</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Remuneração Contratual</td>
                        <td class="ps-8">: <small>R$ {{ number_format($servidor->remuneracao_contratual, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Contribuição Empregado (RGPS)</td>
                        <td class="ps-8">: <small>R$ {{ number_format($servidor->contribuicao_empregado_rgps, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Contribuição Empregado (RAT/FAT)</td>
                        <td class="ps-8">: <small>R$ {{ number_format($servidor->contribuicao_empregado_rat_fat, 2, ',', '.') }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Contribuição Patronal (RGPS)</td>
                        <td class="ps-8">: <small>R$ {{ number_format($servidor->contribuicao_patronal_rgps, 2, ',', '.') }}</small></td>
                      </tr>
                      <tr>
                        <td>Carga Horária Semanal</td>
                        <td class="ps-8">: <small>{{ $servidor->carga_horaria_semanal }} horas</small></td>
                      </tr>
                      <tr>
                        <td>Carga Horária Mensal</td>
                        <td class="ps-8">: <small>{{ $servidor->carga_horaria_mensal }} horas</small></td>
                      </tr>
                      <tr>
                        <td>Organograma</td>
                        <td class="ps-8">: <small>{{ $servidor->organograma }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Timestamps -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Datas do Registro</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Criado em</td>
                        <td class="ps-8">: <small>{{ $servidor->created_at ? date('d/m/Y H:i', strtotime($servidor->created_at)) : 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Última Atualização</td>
                        <td class="ps-8">: <small>{{ $servidor->updated_at ? date('d/m/Y H:i', strtotime($servidor->updated_at)) : 'N/A' }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Sistema de Gestão de Servidores</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID do Registro: <small>{{ $servidor->id }}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Gerado em: {{ date('d/m/Y H:i') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-app-layout>