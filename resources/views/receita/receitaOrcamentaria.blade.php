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
   <x-receitas-orcamentarias></x-receitas-orcamentarias>
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
  // ================================ Preparação dos Dados ================================
  const valorAtulizaoRaw = @json($valorAtulizao);
  const ValorArrecadoRaw = @json($ValorArrecado);

  // Mapeia os dados para o formato que o ApexCharts espera
  // Precisamos garantir que ambos os arrays de dados tenham os mesmos anos e na mesma ordem
  // Primeiro, colete todos os anos únicos e ordene-os
  const allYears = [...new Set([
      ...valorAtulizaoRaw.map(item => item.ano),
      ...ValorArrecadoRaw.map(item => item.ano)
  ])].sort((a, b) => a - b); // Ordena os anos de forma ascendente

  // Mapeia os valores orçados e arrecadados para cada ano, garantindo que haja um valor para cada ano
  const valorAtulizaoData = allYears.map(year => {
      const found = valorAtulizaoRaw.find(item => item.ano === year);
      return found ? found.total_orcado : 0; // Se não encontrar, assume 0
  });

  const ValorArrecadoData = allYears.map(year => {
      const found = ValorArrecadoRaw.find(item => item.ano === year);
      return found ? found.total_orcado : 0; // Se não encontrar, assume 0
  });

  // ================================ Configuração do Gráfico ================================
  var options = {
      series: [{
          name: "Valor Orçado Atualizado",
          data: valorAtulizaoData
      }, {
          name: "Valor Arrecadado Acumulado",
          data: ValorArrecadoData
      }],
      chart: {
          type: 'bar',
          height: 350, // Aumente a altura para melhor visualização
          toolbar: {
              show: false
          },
      },
      plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '50%', // Ajuste a largura das colunas
            endingShape: 'rounded'
          },
      },
      dataLabels: {
          enabled: false
      },
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
      },
      xaxis: {
          categories: allYears.map(String), // Anos como strings para o eixo X
          title: {
            text: 'Ano'
          }
      },
      yaxis: {
        title: {
            text: 'Valor (R$)'
        },
        labels: {
            formatter: function (value) {
                return 'R$ ' + value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }
      },
      fill: {
          opacity: 1
      },
      tooltip: {
          y: {
              formatter: function (val) {
                  return "R$ " + val.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
              }
          }
      },
      colors: ['#007bff', '#28a745'] // Cores para as séries: azul para orçado, verde para arrecadado
  };

  var chart = new ApexCharts(document.querySelector("#receitaOrcamentariaChart"), options);
  chart.render();
</script>
    </body>
</html>
