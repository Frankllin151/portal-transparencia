<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Compra Direta') }}
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

    <!---- Detalhes da Compra Direta --->
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                {{-- Botões de ação, você pode adaptar conforme a necessidade --}}
                <a href="javascript:void(0)" class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
                    Enviar
                </a>
                <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                    Download
                </a>
                <a href="{{ route('comprasdiretas.edit', $data->id) }}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Editar
                </a>
                <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1" onclick="window.print()">
                    <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
                    Imprimir
                </button>
            </div>
        </div>
        <div class="card-body py-40">
            <div class="row justify-content-center" id="compra-direta-detalhes">
                <div class="col-lg-12">
                    <div class="shadow-4 border radius-8">
                        <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                            <div>
                                <h3 class="text-xl">Código: <small>{{ $data->codigo }}</small></h3>
                                <p class="mb-1 text-sm">Objeto: <small>{{ $data->objeto }}</small></p>
                                <p class="mb-0 text-sm">Criado em: <small>{{ $data->created_at ? $data->created_at->format('d/m/Y H:i') : 'N/A' }}</small></p>
                            </div>
                            <div>
                                <h4 class="mb-8"><small>Valor: {{ number_format($data->valor_rs, 2, ',', '.') }} R$</small></h4>
                                <p class="mb-1 text-sm">Data da Compra: <small>{{ $data->data_da_compra->format('d/m/Y') }}</small></p>
                                <p class="mb-0 text-sm">ID: <small>{{ $data->id }}</small></p>
                            </div>
                        </div>

                        <div class="py-28 px-20">
                            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                                <div>
                                    <h6 class="text-md">Informações da Compra:</h6>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                            <tr>
                                                <td>Centro de Custos</td>
                                                <td class="ps-8">: <small>{{ $data->centro_de_custos }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Fornecedor</td>
                                                <td class="ps-8">: <small>{{ $data->fornecedor }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>CNPJ/CPF Fornecedor</td>
                                                <td class="ps-8">: <small>{{ $data->cnpj_cpf_fornecedor }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Fundamentação</td>
                                                <td class="ps-8">: <small>{{ $data->fundamentacao }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo</td>
                                                <td class="ps-8">: <small>{{ $data->tipo }}</small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                            <tr>
                                                <td>Objeto</td>
                                                <td class="ps-8">: <small>{{ $data->objeto }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Valor (R$)</td>
                                                <td class="ps-8">: <small>{{ number_format($data->valor_rs, 2, ',', '.') }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Data da Compra</td>
                                                <td class="ps-8">: <small>{{ $data->data_da_compra->format('d/m/Y') }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>ID do Registro</td>
                                                <td class="ps-8">: <small>{{ $data->id }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Criado em</td>
                                                <td class="ps-8">: <small>{{ $data->created_at ? $data->created_at->format('d/m/Y H:i') : 'N/A' }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Última Atualização</td>
                                                <td class="ps-8">: <small>{{ $data->updated_at ? $data->updated_at->format('d/m/Y H:i') : 'N/A' }}</small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-24">
                                <div class="d-flex flex-wrap justify-content-between gap-3">
                                    <div>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Código:</span> <small>{{ $data->codigo }}</small></p>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Fornecedor:</span> <small>{{ $data->fornecedor }}</small></p>
                                        <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Valor:</span> <small>{{ number_format($data->valor_rs, 2, ',', '.') }}</small></p>
                                    </div>
                                    <div>
                                        <table class="text-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="pe-64">Data da Compra:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold"><small>{{ $data->data_da_compra->format('d/m/Y') }}</small></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64">Centro de Custos:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold"><small>{{ $data->centro_de_custos }}</small></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64 border-bottom pb-4">ID:</td>
                                                    <td class="pe-16 border-bottom pb-4">
                                                        <span class="text-primary-light fw-semibold"><small>{{ $data->id }}</small></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64 pt-4">
                                                        <span class="text-primary-light fw-semibold">Atualizado em:</span>
                                                    </td>
                                                    <td class="pe-16 pt-4">
                                                        <span class="text-primary-light fw-semibold"><small>{{ $data->updated_at ? $data->updated_at->format('d/m/Y H:i') : 'N/A' }}</small></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-64">
                                <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes da Compra Direta</p>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
                                <div class="text-sm border-top d-inline-block px-12">ID: <small>{{ $data->id }}</small></div>
                                <div class="text-sm border-top d-inline-block px-12">Sistema de Gestão de Compras Diretas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
