<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Editar Footer') }}
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0">{{ __('Editar Footer') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
     <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
    </li>
  </ul>
</div>

<div class="row gy-4">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Editar Configurações do Footer</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('footer.update', $data->id) }}" method="POST" class="row gy-3 needs-validation" novalidate>
          @csrf
          @method('PUT')

          <!-- Portal da Transparência -->
          <div class="col-12">
            <h6 class="fw-semibold mb-3 text-primary-600">Portal da Transparência</h6>
          </div>

          <div class="col-md-6">
            <label class="form-label">Título do Portal</label>
            <div class="icon-field has-validation">
              <input type="text" name="transparency_portal_title" class="form-control" 
                     placeholder="Ex: PORTAL DA TRANSPARÊNCIA" 
                     value="{{ old('transparency_portal_title', $data->transparency_portal_title ?? 'PORTAL DA TRANSPARÊNCIA') }}" required>
              <div class="invalid-feedback">
                Por favor, preencha o título do portal.
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <label class="form-label">Descrição do Portal</label>
            <div class="icon-field">
              <textarea name="transparency_portal_description" class="form-control" rows="3" 
                        placeholder="Descrição sobre o portal da transparência">{{ old('transparency_portal_description', $data->transparency_portal_description ?? '') }}</textarea>
            </div>
          </div>

          <!-- Informações de Contato -->
          <div class="col-12 mt-4">
            <h6 class="fw-semibold mb-3 text-primary-600">Informações de Contato</h6>
          </div>

          <div class="col-md-12">
            <label class="form-label">Endereço</label>
            <div class="icon-field">
              <input type="text" name="contact_address" class="form-control" 
                     placeholder="Digite o endereço completo"
                     value="{{ old('contact_address', $data->contact_address ?? '') }}">
            </div>
          </div>

          <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <div class="icon-field">
              <input type="email" name="contact_email" class="form-control" 
                     placeholder="contato@exemplo.com"
                     value="{{ old('contact_email', $data->contact_email ?? '') }}">
            </div>
          </div>

          <div class="col-md-6">
            <label class="form-label">Telefone</label>
            <div class="icon-field">
              <input type="text" name="contact_phone" class="form-control" 
                     placeholder="(00) 0000-0000"
                     value="{{ old('contact_phone', $data->contact_phone ?? '') }}">
            </div>
          </div>

          <!-- Links Úteis -->
          <div class="col-12 mt-4">
            <h6 class="fw-semibold mb-3 text-primary-600">Links Úteis</h6>
          </div>

          <div class="col-12">
            <div id="useful-links-container">
              @php
                $usefulLinks = old('useful_links', isset($data->useful_links) ? (is_string($data->useful_links) ? json_decode($data->useful_links, true) : $data->useful_links) : []);
                if (empty($usefulLinks)) {
                    $usefulLinks = [['text' => '', 'url' => '']];
                }
              @endphp

              @foreach($usefulLinks as $index => $link)
              <div class="useful-link-item mb-3 p-3 border rounded">
                <div class="row">
                  <div class="col-md-5">
                    <label class="form-label">Texto do Link</label>
                    <input type="text" name="useful_links[{{ $index }}][text]" class="form-control" 
                           placeholder="Ex: Despesas" value="{{ $link['text'] ?? '' }}">
                  </div>
                  <div class="col-md-5">
                    <label class="form-label">URL</label>
                    <input type="text" name="useful_links[{{ $index }}][url]" class="form-control" 
                           placeholder="Ex: /despesas" value="{{ $link['url'] ?? '' }}">
                  </div>
                  <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger-600 btn-sm remove-link" 
                            onclick="removeUsefulLink(this)" {{ $index === 0 ? 'style=display:none' : '' }}>
                      <iconify-icon icon="material-symbols:delete"></iconify-icon>
                    </button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addUsefulLink()">
              <iconify-icon icon="material-symbols:add"></iconify-icon>
              Adicionar Link
            </button>
          </div>

          <!-- Copyright e Links Legais -->
          <div class="col-12 mt-4">
            <h6 class="fw-semibold mb-3 text-primary-600">Copyright e Links Legais</h6>
          </div>

          <div class="col-md-12">
            <label class="form-label">Texto do Copyright</label>
            <div class="icon-field">
              <input type="text" name="copyright_text" class="form-control" 
                     placeholder="Ex: © 2024 Todos os direitos reservados"
                     value="{{ old('copyright_text', $data->copyright_text ?? '') }}">
            </div>
          </div>

        
          <div class="col-md-12 mt-4 d-flex justify-content-end">
            <button class="btn btn-primary-600" type="submit">
              <iconify-icon icon="material-symbols:save"></iconify-icon>
              Atualizar Configurações
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
// Função para adicionar link útil
function addUsefulLink() {
    const container = document.getElementById('useful-links-container');
    const index = container.children.length;
    const linkItem = document.createElement('div');
    linkItem.className = 'useful-link-item mb-3 p-3 border rounded';
    linkItem.innerHTML = `
        <div class="row">
            <div class="col-md-5">
                <label class="form-label">Texto do Link</label>
                <input type="text" name="useful_links[${index}][text]" class="form-control" placeholder="Ex: Despesas">
            </div>
            <div class="col-md-5">
                <label class="form-label">URL</label>
                <input type="text" name="useful_links[${index}][url]" class="form-control" placeholder="Ex: /despesas">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger-600 btn-sm remove-link" onclick="removeUsefulLink(this)">
                    <iconify-icon icon="material-symbols:delete"></iconify-icon>
                </button>
            </div>
        </div>
    `;
    container.appendChild(linkItem);
}

// Função para remover link útil
function removeUsefulLink(button) {
    const container = document.getElementById('useful-links-container');
    if (container.children.length > 1) {
        button.closest('.useful-link-item').remove();
        updateUsefulLinksIndexes();
    }
}

// Função para adicionar link legal
function addLegalLink() {
    const container = document.getElementById('legal-links-container');
    const index = container.children.length;
    const linkItem = document.createElement('div');
    linkItem.className = 'legal-link-item mb-3 p-3 border rounded';
    linkItem.innerHTML = `
        <div class="row">
            <div class="col-md-5">
                <label class="form-label">Texto do Link</label>
                <input type="text" name="legal_links[${index}][text]" class="form-control" placeholder="Ex: Política de Privacidade">
            </div>
            <div class="col-md-5">
                <label class="form-label">URL</label>
                <input type="text" name="legal_links[${index}][url]" class="form-control" placeholder="Ex: /politica-de-privacidade">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger-600 btn-sm remove-link" onclick="removeLegalLink(this)">
                    <iconify-icon icon="material-symbols:delete"></iconify-icon>
                </button>
            </div>
        </div>
    `;
    container.appendChild(linkItem);
}

// Função para remover link legal
function removeLegalLink(button) {
    const container = document.getElementById('legal-links-container');
    if (container.children.length > 1) {
        button.closest('.legal-link-item').remove();
        updateLegalLinksIndexes();
    }
}

// Função para atualizar índices dos links úteis
function updateUsefulLinksIndexes() {
    const container = document.getElementById('useful-links-container');
    Array.from(container.children).forEach((item, index) => {
        const inputs = item.querySelectorAll('input');
        inputs[0].name = `useful_links[${index}][text]`;
        inputs[1].name = `useful_links[${index}][url]`;
    });
}

// Função para atualizar índices dos links legais
function updateLegalLinksIndexes() {
    const container = document.getElementById('legal-links-container');
    Array.from(container.children).forEach((item, index) => {
        const inputs = item.querySelectorAll('input');
        inputs[0].name = `legal_links[${index}][text]`;
        inputs[1].name = `legal_links[${index}][url]`;
    });
}

// Validação do formulário
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

</x-app-layout>