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
   <div class="">
     <div class="">
    
        </div>
      </div>
    <div class="card basic-data-table">
  <div class="card-header">
    <h5 class="mb-0">Fiscais de Contratos</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de Registros --}}
      <div class="col-md-4">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$total }}</strong></p>
      </div>
      {{-- Add other totals or summaries here if applicable --}}
    </div>
<div class="table-responsive-scrollable">
    <table class="table bordered-table mb-0" id="dataTableContratos" data-page-length='10'>
        <thead>
            <tr>
                <th class="ps-8"><small>S.L</small></th>
                <th class="ps-8"><small>ENTIDADE</small></th>
                <th class="ps-8"><small>DATA DE ASSINATURA</small></th>
                <th class="ps-8"><small>NÚMERO DO CONTRATO</small></th>
                <th class="ps-8"><small>Nº PROCESSO</small></th>
                <th class="ps-8"><small>ANO CONTRATO</small></th>
                <th class="ps-8"><small>MODALIDADE LICITAÇÃO</small></th>
                <th class="ps-8"><small>NÚMERO LICITAÇÃO</small></th>
                <th class="ps-8"><small>TIPO DE CONTRATO</small></th>
                <th class="ps-8"><small>OBJETO DO CONTRATO</small></th>
                <th class="ps-8"><small>CONTRATADO</small></th>
                <th class="ps-8"><small>DATA VIGÊNCIA INICIAL</small></th>
                <th class="ps-8"><small>DATA VIGÊNCIA FINAL</small></th>
                <th class="ps-8"><small>SITUAÇÃO</small></th>
                <th class="ps-8"><small>VALOR INICIAL R$</small></th>
                <th class="ps-8"><small>VALOR FINAL R$</small></th>
                <th class="ps-8"><small>COMPETÊNCIA</small></th>
                <th class="ps-8"><small>INSTRUMENTO DO CONTRATO</small></th>
                <th class="ps-8"><small>CÓDIGO FORNECEDOR</small></th>
                <th class="ps-8"><small>CÓDIGO PROCESSO</small></th>
                <th class="ps-8"><small>SUBCONTRATAÇÃO</small></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $item)
                <tr>
                    <td class="ps-8"><small>{{ $index + 1 }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->entidade ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->data_assinatura ? \Carbon\Carbon::parse($item->contrato->data_assinatura)->format('d/m/Y') : 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->numero_contrato ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->numero_processo ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->ano ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->modalidade_licitacao ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->numero_licitacao ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->tipo_contrato ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->descricao_item_contrato ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->contratado ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->data_vigencia_inicial ? \Carbon\Carbon::parse($item->contrato->data_vigencia_inicial)->format('d/m/Y') : 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->data_vigencia_final ? \Carbon\Carbon::parse($item->contrato->data_vigencia_final)->format('d/m/Y') : 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->situacao ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>R$ {{ number_format((float)($item->contrato->valor_inicial ?? 0), 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>R$ {{ number_format((float)($item->contrato->valor_final ?? 0), 2, ',', '.') }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->competencia ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->instrumento_contrato ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->codigo_fornecedor ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->codigo_processo ?? 'N/A' }}</small></td>
                    <td class="ps-8"><small>{{ $item->contrato->subcontratacao ?? 'N/A' }}</small></td>
                </tr>
            @empty
                <tr>
                    <td colspan="21" class="text-center"><small>Nenhum registro encontrado.</small></td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
