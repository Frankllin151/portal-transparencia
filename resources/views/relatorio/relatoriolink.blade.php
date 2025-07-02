
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
   <div class="container">
<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4 py-3">

  {{-- Relatório de Movimentação Bancária --}}
  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Movimentação Bancária</p>
            <h6 class="mb-0"></h6>
          </div>
          <div class="w-50-px h-50-px btn-info-600 rounded-circle d-flex justify-content-center align-items-center">
            <iconify-icon icon="mdi:bank-transfer" class="text-white text-2xl mb-0"></iconify-icon>
          </div>
        </div>
        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
          <a href="{{ route('publico.relatorio.movimentacao_bancaria') }}" class="text-primary-main">Ver Detalhes</a>
        </p>
      </div>
    </div>
  </div>

  {{-- Relatório de Movimentação Bancária Mensal --}}
  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Movimentação Mensal</p>
            <h6 class="mb-0"></h6>
          </div>
          <div class="w-50-px h-50-px btn-info-600 rounded-circle d-flex justify-content-center align-items-center">
            <iconify-icon icon="mdi:calendar-month-outline" class="text-white text-2xl mb-0"></iconify-icon>
          </div>
        </div>
        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
          <a href="{{ route('publico.relatorio.movimentacao_bancaria_mensal') }}" class="text-primary-main">Ver Detalhes</a>
        </p>
      </div>
    </div>
  </div>

  {{-- Relatório da Lei de Responsabilidade Fiscal --}}
  <div class="col">
    <div class="card shadow-none border bg-gradient-start-1 h-100">
      <div class="card-body p-20">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <p class="fw-medium text-primary-light mb-1">Lei Resp. Fiscal</p>
            <h6 class="mb-0"></h6>
          </div>
          <div class="w-50-px h-50-px btn-info-600 rounded-circle d-flex justify-content-center align-items-center">
            <iconify-icon icon="mdi:scale-balance" class="text-white text-2xl mb-0"></iconify-icon>
          </div>
        </div>
        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
          <a href="{{ route('publico.relatorio.lei_responsabilidade_fiscal') }}" class="text-primary-main">Ver Detalhes</a>
        </p>
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
