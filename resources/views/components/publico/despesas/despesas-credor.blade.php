<div class="container">
    <h4>Despesas por Credor</h4>
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

        {{-- Valor Pago (Total) --}}
        <div class="col">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <p class="fw-medium text-primary-light mb-1"></p>
                    <h6 class="mb-0">Valor Pago (Total): R${{ number_format($ValorPagoTotal, 2, ",", ".") }}</h6>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <hr>

    <h5>Registros de Despesas por Credor</h5>
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        @forelse ($TodosRegistroLoop as $despesa)
            <div class="col">
                <div class="card shadow-sm border h-100">
                    <div class="card-body p-4 d-flex flex-column">

                        {{-- Informações do Credor e Despesa --}}
                        <div class="mb-3 pb-3 border-bottom">
                            <p class="text-muted mb-1">
                                <small>Ano Exercício:</small>
                                <strong class="text-dark">{{ $despesa->ano_exercicio }}</strong>
                            </p>

                            <div class="mt-2">
                                <small class="d-block">
                                    <span class="fw-semibold">Entidade:</span> {{ $despesa->entidade }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">Nome Credor:</span> {{ $despesa->credor_nome }}
                                </small>
                                <small class="d-block">
                                    <span class="fw-semibold">CPF/CNPJ Credor:</span> {{ $despesa->credor_cnpj_cpf }}
                                </small>
                            </div>
                        </div>

                        {{-- Valor Pago --}}
                        <div class="mt-auto">
                            <p class="fw-medium text-primary mb-1">Valor Pago</p>
                            <small class="mb-0 text-success fw-bold">R$ {{ number_format($despesa->valor_pago, 2, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Nenhum registro de despesa por credor encontrado.</p>
            </div>
        @endforelse
    </div>
</div>
