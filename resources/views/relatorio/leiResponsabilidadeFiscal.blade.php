
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
    <div class="card basic-data-table">
    <div class="card-header">
     

 <div  class="d-flex  align-items-center justify-content-between ">
     <h5 class="mb-0">Relatório de Responsabilidade Fiscal</h5>
    <div>

       <a href="javascript:void(0);" onclick="history.back();"  class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
    Voltar 
</a>
 <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
    </div>
   </div>

    </div>
  <div class="card-body">
    {{-- Para este tipo de tabela de resumo, a rolagem superior horizontal não é tipicamente necessária,
         pois ela não costuma ter muitas colunas que fariam o conteúdo exceder a largura.
         Portanto, removi o horizontal-scroll-top-wrapper e o table-responsive-scrollable. --}}
    <table class="table bordered-table mb-0" id="noDatatables" data-no-datatable>
        <tbody>
            <tr>
                <td class="ps-8"><small><strong>Receita Arrecadada no Mês</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$receitaMes, 2, ',', '.') }}</strong></small></td>
            </tr>
            <tr>
                <td class="ps-8"><small><strong>Receita Acumulada no Ano</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$receitaAno, 2, ',', '.') }}</strong></small></td>
            </tr>
            <tr>
                <td class="ps-8"><small><strong>Receita Corrente Líquida</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$receitaCorrenteLiquida, 2, ',', '.') }}</strong></small></td>
            </tr>
            <tr>
                <td class="ps-8"><small><strong>Despesa Paga no Mês</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$despesaPagoMes, 2, ',', '.') }}</strong></small></td>
            </tr>
            <tr>
                <td class="ps-8"><small><strong>Despesa Empenhada no Mês</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$despesaEmpenhadoMes, 2, ',', '.') }}</strong></small></td>
            </tr>
             <tr>
                <td class="ps-8"><small><strong>Despesa Liquidada no Mês</strong></small></td>
                <td class="ps-8"><small><strong>R$ {{ number_format((float)$despesaLiquidadoMes, 2, ',', '.') }}</strong></small></td>
            </tr>
            <tr>
                <td class="ps-8"><small><strong>Resultado Fiscal do Mês</strong></small></td>
                <td class="ps-8">
                    <small>
                        @if ($resultadoFiscalMes >= 0)
                            <strong class="text-success">Superávit: R$ {{ number_format((float)$resultadoFiscalMes, 2, ',', '.') }}</strong>
                        @else
                            <strong class="text-danger">Déficit: R$ {{ number_format(abs((float)$resultadoFiscalMes), 2, ',', '.') }}</strong>
                        @endif
                    </small>
                </td>
            </tr>
        </tbody>
    </table>
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
