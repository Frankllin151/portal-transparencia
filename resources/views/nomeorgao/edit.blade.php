<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Editar Nome de Órgão') }} {{-- Título do cabeçalho ajustado --}}
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Nome Órgão') }}</h6> {{-- Título da seção ajustado --}}
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("nomeorgao.novo")}}" class="btn btn-primary ">Novo</a> 
    </li>
  </ul>
</div>

<div class="row gy-4">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Edição de Nome Órgão</h5> {{-- Título do card ajustado --}}
      </div>
      <div class="card-body">
        <form action="{{ route('nomeorgao.update', $data->id) }}" method="POST" class="row gy-3 needs-validation" novalidate> {{-- Rota do formulário e parâmetro ajustados --}}
          @csrf
          @method("PUT") {{-- Mantido para o método PUT --}}
          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <div class="icon-field has-validation">
              <input type="text" name="nome" class="form-control" placeholder="Digite o nome" value="{{$data->nome}}" required> {{-- Valor do campo preenchido com $data->nome --}}
              <div class="invalid-feedback">
                Por favor, preencha o nome.
              </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <button class="btn btn-primary-600" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
