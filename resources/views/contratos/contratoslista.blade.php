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
   <div class="">
    <div class="card h-100 radius-8 border">
          <div class="card-body p-24">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
              <div>
              
              
              </div>
              <div class="text-end">
               {{-- <h6 class="mb-2 fw-bold text-lg">{{ number_format($totalValorOrcadoAtualizado, 2, ",", ".")}}</h6>--}}
              
              </div>
            </div>
          
         <div id="contratosValorChart"></div>

          </div>
    <div class="card basic-data-table">
  <div class="card-header">
  

 <div  class="d-flex  align-items-center justify-content-between ">
      <h5 class="mb-0">Contratos</h5>
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
    <div class="row mb-4">
      {{-- Total de Registros --}}
      <div class="col-md-4">
        <p class="mb-0"><strong>Total de Registros: {{ (float)$total }}</strong></p>
      </div>

      <div class="col-md-4">
    <p class="mb-0"><strong>Valo final 
      R$ (Soma)
      : R$ {{ number_format($valorFinal, 2, ',', '.') }}</strong></p>
</div>
      {{-- Adicione outros totais ou resumos aqui, se aplicável --}}
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
                <th class="ps-8"><small>VER MAIS</small></th>
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
                 <td class="ps-8"><small><a href="{{route("publico.contrato.lista.id", $item->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
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

  <script>
  // ================================ Preparação dos Dados ================================
  // Mapeamos as variáveis do PHP para o JavaScript
  const valorInicialRaw = @json($valorInicialPorAno);
  const valorFinalRaw = @json($valorFinalPorAno);

  // Coleta todos os anos únicos de ambas as coleções e os ordena
  const allYears = [...new Set([
      ...valorInicialRaw.map(item => item.ano),
      ...valorFinalRaw.map(item => item.ano)
  ])].sort((a, b) => a - b); // Ordena os anos de forma ascendente

  // Mapeia os dados de Valor Inicial para cada ano
  const valorInicialData = allYears.map(year => {
      const found = valorInicialRaw.find(item => item.ano === year);
      // Retorna o 'total_valor_inicial' se encontrado, senão 0
      return found ? found.total_valor_inicial : 0;
  });

  // Mapeia os dados de Valor Final para cada ano
  const valorFinalData = allYears.map(year => {
      const found = valorFinalRaw.find(item => item.ano === year);
      // Retorna o 'total_valor_final' se encontrado, senão 0
      return found ? found.total_valor_final : 0;
  });

  // ================================ Configuração do Gráfico de Barras Agrupadas ================================
  var options = {
      series: [{
          name: "Valor Inicial", // Nome da série para o gráfico
          data: valorInicialData // Dados do valor inicial por ano
      }, {
          name: "Valor Final", // Nome da série para o gráfico
          data: valorFinalData // Dados do valor final por ano
      }],
      chart: {
          type: 'bar', // Tipo de gráfico de barras
          height: 350, // Altura do gráfico
          toolbar: {
              show: false // Oculta a barra de ferramentas
          },
      },
      plotOptions: {
          bar: {
            horizontal: false, // Barras verticais
            columnWidth: '50%', // Ajusta a largura das colunas para barras agrupadas
            endingShape: 'rounded' // Cantos arredondados no topo das barras
          },
      },
      dataLabels: {
          enabled: false // Desabilita os rótulos de dados nas barras
      },
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent'] // Borda transparente para as barras
      },
      xaxis: {
          categories: allYears.map(String), // Anos como strings para o eixo X
          title: {
            text: 'Ano' // Título do eixo X
          }
      },
      yaxis: {
        title: {
            text: 'Valor (R$)' // Título do eixo Y
        },
        labels: {
            formatter: function (value) {
                // Formata os valores do eixo Y como moeda brasileira
                return 'R$ ' + value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }
      },
      fill: {
          opacity: 1, // Opacidade total para o preenchimento
          // Cores para as séries: azul claro para Valor Inicial, verde para Valor Final
          // Adaptei as cores do seu exemplo anterior para ficarem distintas
          colors: ['#007bff', '#28a745'] 
      },
      tooltip: {
          y: {
              formatter: function (val) {
                  // Formata os valores do tooltip como moeda brasileira
                  return "R$ " + val.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
              }
          }
      },
      // Não há propriedade 'grid' no exemplo fornecido, mas se precisar ocultá-la:
      // grid: { show: false }
  };

  var chart = new ApexCharts(document.querySelector("#contratosValorChart"), options);
  chart.render();
</script><script>
  // ================================ Preparação dos Dados ================================
  // Mapeamos as variáveis do PHP para o JavaScript
  const valorInicialRaw = @json($valorInicialPorAno);
  const valorFinalRaw = @json($valorFinalPorAno);

  // Coleta todos os anos únicos de ambas as coleções e os ordena
  const allYears = [...new Set([
      ...valorInicialRaw.map(item => item.ano),
      ...valorFinalRaw.map(item => item.ano)
  ])].sort((a, b) => a - b); // Ordena os anos de forma ascendente

  // Mapeia os dados de Valor Inicial para cada ano
  const valorInicialData = allYears.map(year => {
      const found = valorInicialRaw.find(item => item.ano === year);
      // Retorna o 'total_valor_inicial' se encontrado, senão 0
      return found ? found.total_valor_inicial : 0;
  });

  // Mapeia os dados de Valor Final para cada ano
  const valorFinalData = allYears.map(year => {
      const found = valorFinalRaw.find(item => item.ano === year);
      // Retorna o 'total_valor_final' se encontrado, senão 0
      return found ? found.total_valor_final : 0;
  });

  // ================================ Configuração do Gráfico de Barras Agrupadas ================================
  var options = {
      series: [{
          name: "Fornecimento de material", // Nome da série para o gráfico
          data: valorInicialData // Dados do valor inicial por ano
      }, {
          name: "Prestação de serviços", // Nome da série para o gráfico
          data: valorFinalData // Dados do valor final por ano
      }],
      chart: {
          type: 'bar', // Tipo de gráfico de barras
          height: 350, // Altura do gráfico
          toolbar: {
              show: false // Oculta a barra de ferramentas
          },
      },
      plotOptions: {
          bar: {
            horizontal: false, // Barras verticais
            columnWidth: '50%', // Ajusta a largura das colunas para barras agrupadas
            endingShape: 'rounded' // Cantos arredondados no topo das barras
          },
      },
      dataLabels: {
          enabled: false // Desabilita os rótulos de dados nas barras
      },
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent'] // Borda transparente para as barras
      },
      xaxis: {
          categories: allYears.map(String), // Anos como strings para o eixo X
          title: {
            text: 'Ano' // Título do eixo X
          }
      },
      yaxis: {
        title: {
            text: 'Valor (R$)' // Título do eixo Y
        },
        labels: {
            formatter: function (value) {
                // Formata os valores do eixo Y como moeda brasileira
                return 'R$ ' + value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }
      },
      fill: {
          opacity: 1, // Opacidade total para o preenchimento
          // Cores para as séries: azul claro para Valor Inicial, verde para Valor Final
          // Adaptei as cores do seu exemplo anterior para ficarem distintas
          colors: ['#007bff', '#28a745'] 
      },
      tooltip: {
          y: {
              formatter: function (val) {
                  // Formata os valores do tooltip como moeda brasileira
                  return "R$ " + val.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
              }
          }
      },
      // Não há propriedade 'grid' no exemplo fornecido, mas se precisar ocultá-la:
      // grid: { show: false }
  };

  var chart = new ApexCharts(document.querySelector("#contratosValorChart"), options);
  chart.render();
</script>
    </body>
</html>
