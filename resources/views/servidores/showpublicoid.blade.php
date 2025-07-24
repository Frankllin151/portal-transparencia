<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal  Transparência</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif


        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
    body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Fundo levemente cinza para destacar o header/footer brancos */
        }
  </style>
    </head>
    <body>
   <x-header></x-header>

<div class="card">
  <div class="card-header">
   
<div class="d-flex justify-content-between gap-2">
       <a href="{{ route('publico.servidores') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
    Voltar 
</a>
       <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
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
                      <tr>
                        <td>CPF Servidor:</td>
                        <td class="ps-8"> <small>{{$servidor->cpf ?? "Não informado"}}</small></td>
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
  <x-footer></x-footer>

<script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
  <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
  <script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
