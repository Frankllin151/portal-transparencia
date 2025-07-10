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
    
    <div class="card basic-data-table">
    <div class="card-header">
        <h5 class="mb-0">Cargos e Vencimentos dos Servidores  </h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            {{-- Total de Registros --}}
            <div class="col-md-4">
                <p class="mb-0"><strong>Total de Registros: {{ (float)$total }}</strong></p>
            </div>
            {{-- You can add other summary totals here if applicable --}}
        </div>

       <div class="table-responsive-scrollable">
        <table class="table bordered-table mb-0" id="dataTableServidores" data-page-length='10'>
            <thead>
                <tr>
                 
                    <th class="ps-8"><small>ENTIDADE</small></th>
                    <th class="ps-8"><small>DESCRIÇÃO DO CARGO</small></th>
                    <th class="ps-8"><small>CLASSIFICAÇÃO DO CARGO</small></th>
                    <th class="ps-8"><small>MATRÍCULA</small></th>
                    <th class="ps-8"><small>VINCULO EMPREGATICIO</small></th>
                    <th class="ps-8"><small>SITUAÇÃO DO CARGO</small></th>
                     <th class="ps-8"><small>VER MAIS</small></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $servidor)
                    <tr>
                      
                        <td class="ps-8"><small>{{ $servidor->entidade ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $servidor->cargo->descricao_cargo ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $servidor->cargo->classificacao_cargo ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $servidor->matricula ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $servidor->vinculo_empregaticio ?? 'N/A' }}</small></td>
                        <td class="ps-8"><small>{{ $servidor->cargo->situacao_cargo ?? 'N/A' }}</small></td>
                       <td class="ps-8"><small><a href="{{route("publico.servidores.id", $servidor->id)}}">
                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a></small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center"><small>Nenhum registro de servidor encontrado.</small></td>
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
