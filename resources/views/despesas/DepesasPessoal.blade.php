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
  <x-pessoal-despesas></x-pessoal-despesas>
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

  <script>
  // ================================ Dados para o Gráfico Donut ================================
  const valorEmpenhoTotal = {{ $valorEmpenho ?? 0 }};

  // Se o valor for 0, ApexCharts pode não renderizar bem.
  // Podemos adicionar uma fatia simbólica para garantir a renderização.
  const chartSeries = valorEmpenhoTotal > 0 ? [valorEmpenhoTotal] : [1]; // Se > 0, usa o valor, senão usa 1 simbólico
  const chartLabels = valorEmpenhoTotal > 0 ? ['Valor Empenhado'] : ['Nenhum Valor'];
  const chartColors = valorEmpenhoTotal > 0 ? ['#4CAF50'] : ['#CCCCCC']; // Verde para valor, Cinza para nenhum

  // ================================ Configuração do Gráfico Donut ================================
  var options = {
      series: chartSeries,
      colors: chartColors,
      labels: chartLabels,
      legend: {
          show: false // Não mostra a legenda, pois só há uma fatia (ou uma simbólica)
      },
      chart: {
        type: 'donut',
        height: 270,
        sparkline: {
          enabled: false // Desabilita sparkline para ter mais controle sobre labels e centro
        },
        // Ajuste de margens e padding
        margin: { top: 0, right: 0, bottom: 0, left: 0 },
        padding: { top: 0, right: 0, bottom: 0, left: 0 }
      },
      stroke: {
        width: 0, // Sem borda nas fatias
      },
      dataLabels: {
        enabled: false // Desabilitamos as labels das fatias, pois a informação principal está no centro
      },
      plotOptions: {
          pie: {
              donut: {
                  size: '65%', // Ajusta o tamanho do anel
                  labels: {
                      show: true,
                      name: {
                          show: true,
                          fontSize: '16px',
                          color: undefined,
                          offsetY: -10,
                          text: 'Total Empenhado' // Texto fixo acima do valor central
                      },
                      value: {
                          show: true,
                          fontSize: '22px',
                          color: undefined,
                          formatter: function (val) {
                              // Exibe o valor empenhado formatado no centro do donut
                              return 'R$ ' + valorEmpenhoTotal.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                          }
                      },
                      total: { // A seção 'total' pode ser usada para um valor agregado, mas 'value' já faz o que queremos
                          show: false // Desabilita o total padrão para não duplicar ou confundir
                      }
                  }
              }
          }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }],
  };

  var chart = new ApexCharts(document.querySelector("#valorEmpenhoDonutChart"), options);
  chart.render();
</script>
    </body>
</html>
