<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Compra Direta') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Compra Direta') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="javascript:void(0);" onclick="history.back();" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
                    Voltar
                </a>
            </li>
        </ul>
    </div>

    <!------ Edição de Compra Direta ---->
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <h6 class="card-title mb-0">Editar Compra Direta</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('comprasdiretas.update', $data->id) }}" method="POST">
                @csrf {{-- Token CSRF para segurança --}}
                @method('PUT') {{-- Simula o método HTTP PUT para atualização --}}

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Informações da Compra</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label">Código</label>
                                        <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $data->codigo) }}" placeholder="Ex: CD2024001">
                                        @error('codigo')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Centro de Custos</label>
                                        <input type="text" name="centro_de_custos" class="form-control" value="{{ old('centro_de_custos', $data->centro_de_custos) }}" placeholder="Ex: Departamento Financeiro">
                                        @error('centro_de_custos')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Data da Compra</label>
                                        <input type="date" name="data_da_compra" class="form-control" value="{{ old('data_da_compra', $data->data_da_compra->format('Y-m-d')) }}">
                                        @error('data_da_compra')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Objeto</label>
                                        <input type="text" name="objeto" class="form-control" value="{{ old('objeto', $data->objeto) }}" placeholder="Ex: Material de Escritório">
                                        @error('objeto')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Dados do Fornecedor e Valores</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label">Fornecedor</label>
                                        <input type="text" name="fornecedor" class="form-control" value="{{ old('fornecedor', $data->fornecedor) }}" placeholder="Ex: ABC Suprimentos Ltda.">
                                        @error('fornecedor')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">CNPJ/CPF Fornecedor</label>
                                        <input type="text" name="cnpj_cpf_fornecedor" class="form-control cpf-cnpj-mask" value="{{ old('cnpj_cpf_fornecedor', $data->cnpj_cpf_fornecedor) }}" placeholder="Ex: 00.000.000/0000-00 ou 000.000.000-00">
                                        @error('cnpj_cpf_fornecedor')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Fundamentação</label>
                                        <input type="text" name="fundamentacao" class="form-control" value="{{ old('fundamentacao', $data->fundamentacao) }}" placeholder="Ex: Dispensa de Licitação Art. 24">
                                        @error('fundamentacao')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Tipo</label>
                                        <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $data->tipo) }}" placeholder="Ex: Material / Serviço">
                                        @error('tipo')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Valor (R$)</label>
                                        <input type="text" step="0.01" name="valor_rs" class="moedaBr form-control" value="{{ old('valor_rs', $data->valor_rs) }}" placeholder="Ex: 1500.75">
                                        @error('valor_rs')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
