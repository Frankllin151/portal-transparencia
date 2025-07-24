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
       <a href="{{ route('publico.processos') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center" id="processo-licitatorio">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Processo Licitatório #<small>{{$processo->numero_processo}}</small></h3>
              <p class="mb-1 text-sm">Ano Processo: <small>{{$processo->ano_processo}}</small></p>
              <p class="mb-0 text-sm">Data Criação: <small>{{$processo->data_criacao ? date('d/m/Y', strtotime($processo->data_criacao)) : 'N/A'}}</small></p>
            </div>
            <div>
              <h4 class="mb-8"><small>{{$processo->entidade}}</small></h4>
              <p class="mb-1 text-sm">Situação: <span class="badge 
                @if($processo->situacao == 'Concluído') bg-success 
                @elseif($processo->situacao == 'Em Andamento') bg-warning 
                @else bg-secondary @endif
                "><small>{{$processo->situacao}}</small></span></p>
              <p class="mb-0 text-sm">ID: <small>{{$processo->id}}</small></p>
            </div>
          </div>
          
          <div class="py-28 px-20">
            <!-- Informações da Licitação -->
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Informações da Licitação:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Número Licitação</td>
                      <td class="ps-8">: <small>{{$processo->numero_licitacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Ano Licitação</td>
                      <td class="ps-8">: <small>{{$processo->ano_licitacao}}</small></td>
                    </tr>
                    <tr>
                      <td>Modalidade</td>
                      <td class="ps-8">: <small>{{$processo->modalidade}}</small></td>
                    </tr>
                    <tr>
                      <td>Forma Contratação</td>
                      <td class="ps-8">: <small>{{$processo->forma_contratacao}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Tipo Objeto</td>
                      <td class="ps-8">: <small>{{$processo->tipo_objeto}}</small></td>
                    </tr>
                    <tr>
                      <td>Forma Julgamento</td>
                      <td class="ps-8">: <small>{{$processo->forma_julgamento}}</small></td>
                    </tr>
                    <tr>
                      <td>Registro Preços</td>
                      <td class="ps-8">: <span class="badge {{$processo->registro_precos == 'Sim' ? 'bg-success' : 'bg-danger'}}"><small>{{$processo->registro_precos}}</small></span></td>
                    </tr>
                    <tr>
                      <td>Data Homologação</td>
                      <td class="ps-8">: <small>{{$processo->data_homologacao ? date('d/m/Y', strtotime($processo->data_homologacao)) : 'N/A'}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Local do Certame -->
            <div class="mt-24">
              <h6 class="text-md mb-3">Local do Certame</h6>
              <div class="row">
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Cidade</td>
                        <td class="ps-8">: <small>{{$processo->cidade_certame}}</small></td>
                      </tr>
                      <tr>
                        <td>Estado</td>
                        <td class="ps-8">: <small>{{$processo->estado_certame}}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="text-sm text-secondary-light">
                    <tbody>
                      <tr>
                        <td>Contato Responsável</td>
                        <td class="ps-8">: <small>{{$processo->nome_contato}}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

           
           

            <!-- Resumo Final -->
            <div class="mt-24">
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Entidade:</span> <small>{{$processo->entidade}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Modalidade:</span> <small>{{$processo->modalidade}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Forma de Julgamento:</span> <small>{{$processo->forma_julgamento}}</small></p>
                </div>
                <div>
                  <table class="text-sm">
                    <tbody>
                      <tr>
                        <td class="pe-64">Processo Nº:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$processo->numero_processo}}/{{$processo->ano_processo}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64">Licitação Nº:</td>
                        <td class="pe-16">
                          <span class="text-primary-light fw-semibold"><small>{{$processo->numero_licitacao}}/{{$processo->ano_licitacao}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 border-bottom pb-4">Situação:</td>
                        <td class="pe-16 border-bottom pb-4">
                          <span class="text-primary-light fw-semibold"><small>{{$processo->situacao}}</small></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="pe-64 pt-4">
                          <span class="text-primary-light fw-semibold">Registro de Preços:</span>
                        </td>
                        <td class="pe-16 pt-4">
                          <span class="text-primary-light fw-semibold"><small>{{$processo->registro_precos}}</small></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Processo Licitatório</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID: <small>{{$processo->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Licitações</div>
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
