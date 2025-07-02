<br>
<br>
<div class="container">
    <h4>Despesas Orçamentárias</h4>
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">

        {{-- Total de resultados --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Total de Registros: {{ $QuantidadeRegistro }}</h6>
                </div>
            </div>
        </div>

        {{-- Valor Total Orçado --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Total Orçado: R${{ number_format($ValorOrcadoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

        {{-- Valor Total Atualizado --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Total Atualizado: R$ {{ number_format($ValorAtualizadoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

        {{-- Valor Total Empenhado --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Total Empenhado: R$ {{ number_format($ValorEmpenhoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

        {{-- Valor Total Liquidado --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Total Liquidado: R$ {{ number_format($ValorLiquidadoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

        {{-- Valor Total Pago --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Total Pago: R$ {{ number_format($ValorPagoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <hr>

    <h5>Registros de Despesas Orçamentárias</h5>
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        @forelse ($TodosRegistroLoop as $despesa)
            <div class="col">
                <div class="card shadow-sm border h-100">
                    <div class="card-body p-4 d-flex flex-column">

                        {{-- Informações Principais da Despesa --}}
                        <div class="mb-3 pb-3 border-bottom">
                            <p class="text-muted mb-1">
                                <small>Data do Empenho:</small>
                                <strong class="text-dark">{{ \Carbon\Carbon::parse($despesa->data_empenho)->format('d/m/Y') }}</strong>
                            </p>

                            <div class="mt-2">
                                <small class="d-block">
                                    <span class="fw-semibold">Órgão:</span> {{ $despesa->orgao }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">Número do Empenho:</span> {{ $despesa->numero_empenho }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">Credor:</span> {{ $despesa->credor_nome }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">Descrição do Programa:</span> {{ $despesa->descricao_programa }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">Histórico:</span> {{ $despesa->historico_empenho }}
                                </small>
                            </div>
                        </div>

                        {{-- Valores da Despesa --}}
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Orçado</p>
                            <small class="mb-0 text-dark fw-bold">R$ {{ number_format($despesa->valor_orcado, 2, ',', '.') }}</small>
                        </div>
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Atualizado</p>
                            <small class="mb-0 text-dark fw-bold">R$ {{ number_format($despesa->valor_atualizado, 2, ',', '.') }}</small>
                        </div>
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Empenhado</p>
                            <small class="mb-0 text-success fw-bold">R$ {{ number_format($despesa->valor_empenho, 2, ',', '.') }}</small>
                        </div>
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Liquidado</p>
                            <small class="mb-0 text-info fw-bold">R$ {{ number_format($despesa->valor_liquidado, 2, ',', '.') }}</small>
                        </div>
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Pago</p>
                            <small class="mb-0 text-success fw-bold">R$ {{ number_format($despesa->valor_pago, 2, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Nenhum registro de despesa orçamentária encontrado.</p>
            </div>
        @endforelse
    </div>
</div>
