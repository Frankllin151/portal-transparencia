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
       <div class="col-xxl-4">
        <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
              
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
           <div id="remuneracaoDonutChart"></div>

          </div>
        </div>
      </div>
  <div class="card-header">
    <h5 class="mb-0">Servidores Remunerações</h5>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      {{-- Total de Registros --}}
      <div class="col-md-4">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$total }}</strong></p>
      </div>
      {{-- Adicione outros totais aqui, se houver --}}
    </div>

    <table class="table bordered-table mb-0" id="dataTableRemuneracoes" data-page-length='10'>
      <thead>
        <tr>
          <th>S.L</th>
          <th>Nome do Servidor</th>
          <th>Matrícula</th>
          <th>Vínculo Empregatício</th>
          <th>Remuneração Contratual</th>
          <th>Competência do Cargo</th>
          <th>Situação</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $index => $servidor)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $servidor->nome_servidor ?? 'N/A' }}</td>
            <td>{{ $servidor->matricula ?? 'N/A' }}</td>
            <td>{{ $servidor->vinculo_empregaticio ?? 'N/A' }}</td>
            <td>R$ {{ number_format((float)($servidor->remuneracao_contratual ?? 0), 2, ',', '.') }}</td>
            <td>{{ $servidor->cargo->competencia ?? 'N/A' }}</td>
        
            <td>{{ $servidor->situacao ?? 'N/A' }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="10" class="text-center">Nenhum registro de remuneração encontrado.</td>
          </tr>
        @endforelse
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
<script>
  // ================================ Dados para o Gráfico Donut ================================
  const remuneracaoTotal = {{ $remuneracao ?? 0 }}; // Pega o valor da variável PHP, padrão 0 se não existir

  // ApexCharts precisa de um array de séries. Para um único valor, usamos um array com um item.
  // Se o valor for 0, usamos um valor simbólico de 1 para garantir a renderização e uma cor neutra.
  const chartSeries = remuneracaoTotal > 0 ? [remuneracaoTotal] : [1];
  const chartLabels = remuneracaoTotal > 0 ? ['Remuneração Contratual'] : ['Nenhum Valor'];
  const chartColors = remuneracaoTotal > 0 ? ['#007bff'] : ['#CCCCCC']; // Azul para valor, Cinza para nenhum

  // ================================ Configuração do Gráfico Donut ================================
  var options = {
      series: chartSeries, // Apenas uma fatia com o valor total
      colors: chartColors, // A cor da fatia
      labels: chartLabels, // O rótulo da fatia
      legend: {
          show: false // Não mostramos a legenda, já que o valor principal estará no centro
      },
      chart: {
        type: 'donut',
        height: 270, // Altura do gráfico
        sparkline: {
          enabled: false // Desabilita sparkline para ter controle total dos rótulos e do centro
        },
        // Ajuste de margens e padding para otimizar o espaço
        margin: { top: 0, right: 0, bottom: 0, left: 0 },
        padding: { top: 0, right: 0, bottom: 0, left: 0 }
      },
      stroke: {
        width: 0, // Remove a borda das fatias
      },
      dataLabels: {
        enabled: false // Não mostra rótulos na própria fatia; o valor estará no centro
      },
      plotOptions: {
          pie: {
              donut: {
                  size: '65%', // Tamanho do anel do donut (o espaço vazio no centro)
                  labels: {
                      show: true,
                      name: {
                          show: true,
                          fontSize: '16px',
                          color: undefined,
                          offsetY: -10,
                          text: 'Total Remuneração' // Texto que aparece acima do valor central
                      },
                      value: {
                          show: true,
                          fontSize: '22px',
                          color: undefined,
                          formatter: function (val) {
                              // Formata e exibe o valor total da remuneração no centro do gráfico
                              return 'R$ ' + remuneracaoTotal.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                          }
                      },
                      total: { // A seção 'total' é útil para somas de múltiplas fatias. Aqui desabilitamos.
                          show: false // Desabilita o total padrão para evitar redundância
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

  var chart = new ApexCharts(document.querySelector("#remuneracaoDonutChart"), options);
  chart.render();
</script>
    </body>
</html>
