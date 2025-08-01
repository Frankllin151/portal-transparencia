{{-- filepath: resources/views/components/publico/footer.blade.php --}}
@php
    // Garante que $footer sempre exista
    $footer = $footer ?? \App\Models\Footer::first();
@endphp

<footer class="bg-dark pt-5 pb-3 mt-auto">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase mb-4 fw-bold text-light ">
          {{ $footer->transparency_portal_title ?? 'Portal da Transparência' }}
        </h5>
        <p class="text-white-50 ">
          {{ $footer->transparency_portal_description ?? 'Informações sobre a gestão pública, receitas, despesas e muito mais para garantir a transparência e o controle social.' }}
        </p>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase text-light mb-4 fw-bold ">Links Úteis</h5>
        <ul class="list-unstyled">
          @if(!empty($footer->useful_links) && is_array($footer->useful_links))
            @foreach($footer->useful_links as $link)
              <li class="mb-2">
                <a href="{{ $link['url'] }}" class="text-white-50 text-decoration-none hover-white" target="_blank">
                  {{ $link['text'] }}
                </a>
              </li>
            @endforeach
          @else
            <li class="mb-2">
              <a href="{{ route('publico.despesas') }}" class="text-white-50 text-decoration-none hover-white">
                Despesas
              </a>
            </li>
            <li class="mb-2">
              <a href="{{ route('publico.relatorio') }}" class="text-white-50 text-decoration-none hover-white">
                Relatórios
              </a>
            </li>
            <li class="mb-2">
              <a href="{{ route('publico.processos') }}" class="text-white-50 text-decoration-none hover-white">
                Processos Licitatórios
              </a>
            </li>
            <li class="mb-2">
              <a href="{{ route('publico.compras.diretas') }}" class="text-white-50 text-decoration-none hover-white">
                Compras Diretas
              </a>
            </li>
          @endif
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase mb-4 fw-bold text-light ">Contato</h5>
        <p class="text-white-50"><i class="bi bi-geo-alt-fill me-2"></i> {{ $footer->contact_address ?? 'Rua Exemplo, 123, Centro - Cidade/UF' }}</p>
        <p class="text-white-50"><i class="bi bi-envelope-fill me-2"></i> {{ $footer->contact_email ?? 'contato@seuprefixo.gov.br' }}</p>
        <p class="text-white-50"><i class="bi bi-telephone-fill me-2"></i> {{ $footer->contact_phone ?? '(XX) XXXX-XXXX' }}</p>
        <div class="d-flex mt-3">
          <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-4"></i></a>
          <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin fs-4"></i></a>
        </div>
      </div>
    </div>
    <hr class="border-secondary my-4">
    <div class="text-center text-white-50">
      <p class="mb-0">&copy; 2025 {{ $footer->copyright_text ?? '[Nome do Órgão/Prefeitura]' }}. Todos os direitos reservados.</p>
      <p class="mt-1">
        <a href="#" class="text-white-50 text-decoration-none hover-white">Política de Privacidade</a> | 
        <a href="#" class="text-white-50 text-decoration-none hover-white">Termos de Uso</a>
      </p>
    </div>
  </div>
</footer>