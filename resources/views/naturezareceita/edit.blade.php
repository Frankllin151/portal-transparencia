<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Natureza Receita') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
     
    <a href="{{route("natureza.create")}}" class="btn btn-primary ">Novo</a>
    </li>
   
    
  </ul>
</div>
<!-- Edita Natureza Receita-->
<div class="card">
  <div class="card-header">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
      <h6 class="card-title mb-0">Editar Natureza de Receita</h6>
      <div class="d-flex gap-2">
        <!-- Assume que você tem uma rota para visualizar os detalhes da Natureza Receita -->
        <a href="{{ route('naturezareceita.show', $naturezaReceita->id) }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
          <iconify-icon icon="mynaui:arrow-left" class="text-xl"></iconify-icon>
          Voltar
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('naturezareceita.update', $naturezaReceita->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="row gy-4">
        <!-- Informações Principais -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Informações Principais</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Código</label>
                  <input type="text" name="codigo" class="form-control" value="{{ $naturezaReceita->codigo }}" placeholder="Ex: 413210101010000">
                </div>
                <div class="col-12">
                  <label class="form-label">Descrição</label>
                  <input type="text" name="descricao" class="form-control" value="{{ $naturezaReceita->descricao }}" placeholder="Ex: RENDIMENTOS DE APLICAÇÕES FINANCEIRAS">
                </div>
                <div class="col-12">
                  <label class="form-label">Categoria Econômica</label>
                  <input type="text" name="categoria_economica" class="form-control" value="{{ $naturezaReceita->categoria_economica }}" placeholder="Ex: Receitas Correntes">
                </div>
                <div class="col-12">
                  <label class="form-label">Origem</label>
                  <input type="text" name="origem" class="form-control" value="{{ $naturezaReceita->origem }}" placeholder="Ex: Receita Patrimonial">
                </div>
                <div class="col-12">
                  <label class="form-label">Espécie</label>
                  <input type="text" name="especie" class="form-control" value="{{ $naturezaReceita->especie }}" placeholder="Ex: Valores Mobiliários">
                </div>
                <div class="col-12">
                  <label class="form-label">Tipo</label>
                  <input type="text" name="tipo" class="form-control" value="{{ $naturezaReceita->tipo }}" placeholder="Ex: Receita Corrente">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Desdobramentos -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">Detalhamento</h6>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-12">
                  <label class="form-label">Rubrica</label>
                  <input type="text" name="rubrica" class="form-control" value="{{ $naturezaReceita->rubrica }}" placeholder="Rubrica">
                </div>
                <div class="col-12">
                  <label class="form-label">Alínea</label>
                  <input type="text" name="alinea" class="form-control" value="{{ $naturezaReceita->alinea }}" placeholder="Alínea">
                </div>
                <div class="col-12">
                  <label class="form-label">Subalínea</label>
                  <input type="text" name="subalinea" class="form-control" value="{{ $naturezaReceita->subalinea }}" placeholder="Subalínea">
                </div>
                <div class="col-12">
                  <label class="form-label">Desdobramento Nível 1</label>
                  <input type="text" name="desdobramento_nivel_1" class="form-control" value="{{ $naturezaReceita->desdobramento_nivel_1 }}" placeholder="Desdobramento Nível 1">
                </div>
                <div class="col-12">
                  <label class="form-label">Desdobramento Nível 2</label>
                  <input type="text" name="desdobramento_nivel_2" class="form-control" value="{{ $naturezaReceita->desdobramento_nivel_2 }}" placeholder="Desdobramento Nível 2">
                </div>
                <div class="col-12">
                  <label class="form-label">Desdobramento Nível 3</label>
                  <input type="text" name="desdobramento_nivel_3" class="form-control" value="{{ $naturezaReceita->desdobramento_nivel_3 }}" placeholder="Desdobramento Nível 3">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Botões de Ação -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-end gap-3">
                <button type="button" class="btn btn-secondary" onclick="history.back()">
                  <iconify-icon icon="mynaui:arrow-left" class="me-1"></iconify-icon>
                  Cancelar
                </button>
                <button type="submit" class="btn btn-primary">
                  <iconify-icon icon="material-symbols:save" class="me-1"></iconify-icon>
                  Salvar Alterações
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


</x-app-layout>
