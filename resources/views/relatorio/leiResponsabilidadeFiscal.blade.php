
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
   <div class="container">
    <h4>Relatório de Responsabilidade Fiscal</h4>

    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        {{-- Receita do Mês --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1">Receita Arrecadada no Mês</p>
                    <h6 class="mb-0">R$ {{ number_format($receitaMes, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        {{-- Receita Anual --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1">Receita Acumulada no Ano</p>
                    <h6 class="mb-0">R$ {{ number_format($receitaAno, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        {{-- Receita Corrente Líquida --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1">Receita Corrente Líquida</p>
                    <h6 class="mb-0">R$ {{ number_format($receitaCorrenteLiquida, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        {{-- Despesa Paga no Mês --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1">Despesa Paga no Mês</p>
                    <h6 class="mb-0">R$ {{ number_format($despesaPagoMes, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        {{-- Resultado Fiscal --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1">Resultado Fiscal do Mês</p>
                    <h6 class="mb-0">
                        @if ($resultadoFiscalMes >= 0)
                            <span class="text-success">Superávit: R$ {{ number_format($resultadoFiscalMes, 2, ',', '.') }}</span>
                        @else
                            <span class="text-danger">Déficit: R$ {{ number_format(abs($resultadoFiscalMes), 2, ',', '.') }}</span>
                        @endif
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <hr>

    <h5>Detalhamento das Despesas do Mês</h5>
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        <div class="col">
            <div class="card shadow-sm border h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <p class="fw-semibold mb-2">Valor Empenhado</p>
                    <h6 class="text-primary">R$ {{ number_format($despesaEmpenhadoMes, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm border h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <p class="fw-semibold mb-2">Valor Liquidado</p>
                    <h6 class="text-warning">R$ {{ number_format($despesaLiquidadoMes, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm border h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <p class="fw-semibold mb-2">Valor Pago</p>
                    <h6 class="text-success">R$ {{ number_format($despesaPagoMes, 2, ',', '.') }}</h6>
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
