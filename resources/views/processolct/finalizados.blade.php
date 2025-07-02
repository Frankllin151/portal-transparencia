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
        <h4 class="mb-4 text-center">Processos de Licitação</h4>

        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">

            {{-- Total de Registros --}}
            <div class="col">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 card shadow-sm border h-100 p-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1"></p>
                        <h6 class="mb-0">Total de Registros: {{ $total ?? 0 }}</h6>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <hr>

        <h5 class="mb-4">Registros de Processos de Licitação</h5>
        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
            @forelse ($data as $processo)
                <div class="col">
                    <div class="card shadow-sm border h-100">
                        <div class="card-body p-4 d-flex flex-column">

                            {{-- Detalhes do Processo de Licitação --}}
                            <div class="mb-3 pb-3 border-bottom">
                                <p class="text-muted mb-1">
                                    <small>Número do Processo:</small>
                                    <strong class="text-dark">{{ $processo->numero_processo ?? 'N/A' }}</strong>
                                </p>

                                <div class="mt-2">
                                    <small class="d-block">
                                        <span class="fw-semibold">Ano do Processo:</span> {{ $processo->ano_processo ?? 'N/A' }}
                                    </small>
                                    <small class="d-block">
                                        <span class="fw-semibold">Ano da Licitação:</span> {{ $processo->ano_licitacao ?? 'N/A' }}
                                    </small>
                                    <small class="d-block">
                                        <span class="fw-semibold">Modalidade:</span> {{ $processo->modalidade ?? 'N/A' }}
                                    </small>
                                    <small class="d-block">
                                        <span class="fw-semibold">Situação:</span> {{ $processo->situacao ?? 'N/A' }}
                                    </small>
                                    <small class="d-block">
                                        <span class="fw-semibold">Registro de Preços:</span> {{ $processo->registro_precos ? 'Sim' : 'Não' }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Nenhum registro de processo de licitação encontrado.</p>
                </div>
            @endforelse
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
