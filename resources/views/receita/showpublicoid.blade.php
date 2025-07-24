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
       <a href="{{ route('receitapublica') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
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
