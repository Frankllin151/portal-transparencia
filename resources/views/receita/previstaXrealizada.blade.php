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
  <x-prevista-realizada></x-prevista-realizada>
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
  // Prepara os dados para o ApexCharts
  const rawData = @json($dataGrafico);

  // Mapeia os dados para o formato que o ApexCharts espera
  const chartCategories = rawData.map(item => item.ano.toString()); // Anos como strings
  const chartData = rawData.map(item => item.total_orcado); // Valores orçados

  // ================================ Configuração do Gráfico ================================
  var options = {
      series: [{
          name: "Valor Orçado Atualizado", // Nome da série para o gráfico
          data: chartData, // Seus dados de valor orçado por ano
      }],
      chart: {
          type: 'bar',
          height: 350, // Altura ajustada para ser mais parecida com o segundo gráfico
          toolbar: {
              show: false
          },
      },
      plotOptions: {
          bar: {
            borderRadius: 6,
            horizontal: false,
            // columnWidth: 24, // Removido para usar a porcentagem
            columnWidth: '50%', // Largura da coluna ajustada
            endingShape: 'rounded',
          }
      },
      dataLabels: {
          enabled: false
      },
      // Estilo de preenchimento (cor sólida como no segundo exemplo)
      fill: {
          opacity: 1,
          colors: ['#007bff'], // Cor azul para a barra, como no primeiro item do segundo gráfico
      },
      grid: {
          show: false, // Mantido como no seu original
          borderColor: '#D1D5DB',
          strokeDashArray: 4,
          position: 'back',
          padding: {
            top: -10,
            right: -10,
            bottom: -10,
            left: -10
          }
      },
      xaxis: {
          type: 'category',
          categories: chartCategories, // Seus anos como categorias do eixo X
          title: {
            text: 'Ano' // Título para o eixo X
          }
      },
      yaxis: {
        show: true, // Mostrar o eixo Y para visualizar os valores
        title: {
            text: 'Valor Orçado (R$)' // Título para o eixo Y
        },
        labels: {
            formatter: function (value) {
                return 'R$ ' + value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }
      },
      // Configuração do tooltip para formatar o valor como R$
      tooltip: {
          y: {
              formatter: function (val) {
                  return "R$ " + val.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
              }
          }
      },
      // Adicionado stroke para borda nas barras, como no segundo gráfico
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent'] // A cor transparente dá a ilusão de barras separadas
      },
  };

  var chart = new ApexCharts(document.querySelector("#barChart"), options);
  chart.render();
</script>
    </body>
</html>
