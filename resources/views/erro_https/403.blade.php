<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acesso Negado - Wowdash</title>
  {{-- Ajusta o caminho do favicon usando asset() --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">

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

</head>
<body>

<div class="custom-bg">
    <div class="container container--xl">
        <div class="d-flex align-items-center justify-content-between py-24">
            {{-- Ajusta o caminho do logo usando asset() --}}
        <a href="{{ url('/') }}" class="">
    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo" style="max-width: 150px; height: auto;">
</a>
            {{-- Botão "Go To Home" apontando para a raiz do seu site --}}
            <a href="{{route("dashboard")}}" class="btn btn-outline-primary-600 text-sm"> Ir para Início </a>
        </div>

        <div class="pt-48 pb-40 text-center error-content"> {{-- Adicionei a classe 'error-content' --}}
            {{-- A imagem grande 'forbidden-img.png' foi removida --}}
            <h3 class="mb-24">Acesso Negado</h3>
            <p class="text-neutral-500 text-lg">Você não tem autorização para acessar esta página.</p>
            {{-- Botão "Go Back To Home" apontando para a página anterior ou home --}}
            <a href="{{ url()->previous() }}" class="btn btn-primary-600 px-32 py-16 flex-shrink-0 d-inline-flex align-items-center justify-content-center gap-8 mt-28"> 
                <i class="ri-arrow-left-line"></i> Voltar
            </a>
            {{-- Ou se preferir ir sempre para a Home: --}}
            {{-- <a href="{{ url('/') }}" class="btn btn-primary-600 px-32 py-16 flex-shrink-0 d-inline-flex align-items-center justify-content-center gap-8 mt-28"> 
                <i class="ri-home-4-line"></i> Ir para Início
            </a> --}}
        </div>
    </div>
</div>
  
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