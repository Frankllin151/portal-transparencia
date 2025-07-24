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
    <div class="card basic-data-table">
  <div class="card-header">


 <div  class="d-flex  align-items-center justify-content-between ">
        <h5 class="mb-0">Receitas e Despesas Extraorçamentárias</h5>
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
        <p class="mb-0"><strong>Total de Registros: {{ (float)$QuantidadeRegistro }}</strong></p>
      </div>
     <div class="col-md-4">
  <p class="mb-0">
    <strong>Valor da Receita: R$ {{ number_format(max(0, (float)$valorReceita), 2, ",", ".") }}</strong>
  </p>
</div>

<div class="col-md-4">
  <p class="mb-0">
    <strong>Valor da Despesa: R$ {{ number_format(max(0, (float)$valorDespesa), 2, ",", ".") }}</strong>
  </p>
</div>

    </div>

    <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableExtraOrcamentaria" data-page-length='10'>
            <thead>
                <tr>
                    
                    <th class="ps-8"><small>NÚMERO DO PAGAMENTO</small></th>
                    <th class="ps-8"><small>DATA DO PAGAMENTO</small></th>
                    <th class="ps-8"><small>NOME DO BENEFICIÁRIO</small></th>
                    <th class="ps-8"><small>CPF/CNPJ</small></th>
                    <th class="ps-8"><small>CLASSIFICAÇÃO</small></th>
                    <th class="ps-8"><small>DESCRIÇÃO CLASSIFICAÇÃO</small></th>
                    <th class="ps-8"><small>FONTE DE RECURSOS</small></th>
                    <th class="ps-8"><small>HISTÓRICO</small></th>
                    <th class="ps-8"><small>VALOR PAGO R$</small></th>
                    <th class="ps-8"><small>Ver mais</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($extraorcametariaPagamento as $index => $pagamento)
                    <tr>
                        
                        <td class="ps-8"><small>{{ $pagamento->numero_pagamento ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ \Carbon\Carbon::parse($pagamento->data_pagamento)->format('d/m/Y') ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->nome_beneficiario ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->cpf_cnpj_beneficiario ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->Receitasdespesasextraorcamentarium->classificacao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->Receitasdespesasextraorcamentarium->descricao_classificacao ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->Receitasdespesasextraorcamentarium->fonte_recursos ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $pagamento->historico ?? 'N/A' }}</small></td>
                        <td class="ps-8">
                            <small>
                                R$ {{ number_format((float)str_replace(',', '.', str_replace('.', '', $pagamento->valor ?? '0')), 2, ',', '.') }}
                            </small>
                        </td>
                         <td class="ps-8"><small><a href="{{route("publico.execucao.extraorcamentaria.id", $pagamento->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center"><small>Nenhum registro de pagamento extra orçamentário encontrado.</small></td>
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

    </body>
</html>
