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
       <a href="{{ route('pulico.contrato') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
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
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="shadow-4 border radius-8">
          <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
            <div>
              <h3 class="text-xl">Item do Contrato #<small>{{$data->codigo_item_contrato}}</small></h3>
              <p class="mb-1 text-sm">Descrição: <small>{{$data->descricao_item_contrato}}</small></p>
              <p class="mb-0 text-sm">Unidade de Medida: <small>{{$data->unidade_medida}}</small></p>
            </div>
            <div>
              <h4 class="mb-8">Valor Total: <small>R$ {{ number_format($data->valor_total, 2, ',', '.') }}</small></h4>
              <p class="mb-1 text-sm">Quantidade: <small>{{$data->quantidade}}</small></p>
              <p class="mb-0 text-sm">Valor Unitário: <small>R$ {{ number_format($data->valor_unitario, 2, ',', '.') }}</small></p>
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Detalhes do Item:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Código do Item</td>
                      <td class="ps-8">: <small>{{$data->codigo_item_contrato}}</small></td>
                    </tr>
                    <tr>
                      <td>Descrição</td>
                      <td class="ps-8">: <small>{{$data->descricao_item_contrato}}</small></td>
                    </tr>
                    <tr>
                      <td>Unidade de Medida</td>
                      <td class="ps-8">: <small>{{$data->unidade_medida}}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Quantidade</td>
                      <td class="ps-8">: <small>{{$data->quantidade}}</small></td>
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

            <div class="mt-24">
              <h6 class="text-md">Informações do Contrato Associado:</h6>
              <div class="d-flex flex-wrap justify-content-between gap-3">
                <div>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Número do Contrato:</span> <small>{{$data->contrato->numero_contrato}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Contratado:</span> <small>{{$data->contrato->contratado}}</small></p>
                  <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Modalidade de Licitação:</span> <small>{{$data->contrato->modalidade_licitacao}}</small></p>
                  <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Tipo de Contrato:</span> <small>{{$data->contrato->tipo_contrato}}</small></p>
                </div>
                <div>
                    <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Data de Assinatura:</span> <small>{{$data->contrato->data_assinatura ? date('d/m/Y', strtotime($data->contrato->data_assinatura)) : 'N/A'}}</small></p>
                    <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Vigência Inicial:</span> <small>{{$data->contrato->data_vigencia_inicial ? date('d/m/Y', strtotime($data->contrato->data_vigencia_inicial)) : 'N/A'}}</small></p>
                    <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Vigência Final:</span> <small>{{$data->contrato->data_vigencia_final ? date('d/m/Y', strtotime($data->contrato->data_vigencia_final)) : 'N/A'}}</small></p>
                    <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Situação:</span> <small>{{$data->contrato->situacao}}</small></p>
                </div>
              </div>
            </div>

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Item do Contrato</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
              <div class="text-sm border-top d-inline-block px-12">ID do Item: <small>{{$data->id}}</small></div>
              <div class="text-sm border-top d-inline-block px-12">Sistema de Transparência</div>
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
