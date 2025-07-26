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
<br>
<br>
<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between gap-2">
      {{-- Rota para retornar à lista de compras diretas --}}
      <a href="{{ route('publico.compras.diretas') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
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
              {{-- Substituindo 'Pagamento Extra Orçamentário' por 'Compra Direta' --}}
              <h3 class="text-xl">Compra Direta #<small>{{ $compraDireta->codigo ?? 'N/A' }}</small></h3>
              <p class="mb-1 text-sm">Fornecedor: <small>{{ $compraDireta->fornecedor ?? 'N/A' }}</small></p>
              <p class="mb-0 text-sm">CPF/CNPJ: <small>{{ $compraDireta->cnpj_cpf_fornecedor ?? 'N/A' }}</small></p>
            </div>
            <div>
              <h4 class="mb-8">Valor: <small>R$ {{ number_format((float)$compraDireta->valor_rs, 2, ',', '.') }}</small></h4>
              <p class="mb-1 text-sm">Data da Compra: <small>{{ $compraDireta->data_da_compra ? \Carbon\Carbon::parse($compraDireta->data_da_compra)->format('d/m/Y') : 'N/A' }}</small></p>
            
            </div>
          </div>

          <div class="py-28 px-20">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
              <div>
                <h6 class="text-md">Informações da Compra:</h6>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Código</td>
                      <td class="ps-8">: <small>{{ $compraDireta->codigo ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Objeto</td>
                      <td class="ps-8">: <small>{{ $compraDireta->objeto ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Centro de Custos</td>
                      <td class="ps-8">: <small>{{ $compraDireta->centro_de_custos ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Fundamentação</td>
                      <td class="ps-8">: <small>{{ $compraDireta->fundamentacao ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Tipo</td>
                      <td class="ps-8">: <small>{{ $compraDireta->tipo ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td class="ps-8">: <small>R$ {{ number_format((float)$compraDireta->valor_rs, 2, ',', '.') }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Fornecedor</td>
                      <td class="ps-8">: <small>{{ $compraDireta->fornecedor ?? 'N/A' }}</small></td>
                    </tr>
                    <tr>
                      <td>CPF/CNPJ Fornecedor</td>
                      <td class="ps-8">: <small>{{ $compraDireta->cnpj_cpf_fornecedor ?? 'N/A' }}</small></td>
                    </tr>
                     <tr>
                      <td>Criado em</td>
                      <td class="ps-8">: <small>{{ $compraDireta->created_at ? \Carbon\Carbon::parse($compraDireta->created_at)->format('d/m/Y H:i') : 'N/A' }}</small></td>
                    </tr>
                     <tr>
                      <td>Última Atualização</td>
                      <td class="ps-8">: <small>{{ $compraDireta->updated_at ? \Carbon\Carbon::parse($compraDireta->updated_at)->format('d/m/Y H:i') : 'N/A' }}</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            {{-- Removemos a seção 'Informações da Receita/Despesa Extra Orçamentária Associada' --}}
            {{-- pois não é relevante para Compras Diretas baseadas nos atributos fornecidos. --}}

            <div class="mt-64">
              <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Compra Direta</p>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
            
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
