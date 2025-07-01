<div class="container">
<p>{{$quantidadeDados}}</p>
<p>{{number_format($totalValorOrcadoAtualizado, 2,"," , ".") }}</p>
<p>{{number_format($totalValorLancadoPeriodo,2, "," ,  ".")}}</p>
<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    @foreach ($receitaOrcamentaria as $receita)
    <div class="col">
        <div class="card shadow-sm border h-100"> {{-- Usando shadow-sm para uma sombra mais suave --}}
            <div class="card-body p-4 d-flex flex-column"> {{-- Aumentando o padding e usando flex-column para melhor organização vertical --}}

                <div class="mb-3 pb-3 border-bottom"> {{-- Separador visual para a data e natureza --}}
                    <p class="text-muted mb-1">
                        <small>Data da Receita:</small>
                        <strong class="text-dark">{{ $receita->data->format('d/m/Y') }}</strong> {{-- Formato DD/MM/AAAA --}}
                    </p>

                    <div class="mt-2">
                        <p class="text-muted mb-1">Natureza da Receita:</p>
                        <small class="d-block">
                            <span class="fw-semibold">Código:</span> {{ $receita->naturezaReceitum->codigo }}
                        </small>
                        <small class="d-block">
                            <span class="fw-semibold">Descrição:</span> {{ $receita->naturezaReceitum->descricao }}
                        </small>
                    </div>
                </div>

                {{-- Bloco de Valores --}}
                <div class="mt-auto"> {{-- Garante que este bloco fique na parte inferior do card --}}
                    <p class="fw-medium text-primary mb-1">Valor Orçado Inicial</p> {{-- Usando text-primary --}}
                    <small class="mb-0 text-success fw-bold">R$ {{ number_format($receita->valor_orcado_inicial, 2, ',', '.') }}</small> {{-- Adicionando R$ e negrito para destacar valores --}}
                </div>
                <div class="mt-auto"> {{-- Garante que este bloco fique na parte inferior do card --}}
                    <p class="fw-medium text-primary mb-1">Valor Orçado Atualizado</p> {{-- Usando text-primary --}}
                    <small class="mb-0 text-success fw-bold">R$ {{ number_format($receita->valor_orcado_atualizado, 2, ',', '.') }}</small> {{-- Adicionando R$ e negrito para destacar valores --}}
                </div>
                 <div class="mt-auto"> {{-- Garante que este bloco fique na parte inferior do card --}}
                    <p class="fw-medium text-primary mb-1">Valor Orçado periodo</p> {{-- Usando text-primary --}}
                    <small class="mb-0 text-success fw-bold">R$ {{ number_format($receita->valor_lancado_periodo, 2, ',', '.') }}</small> {{-- Adicionando R$ e negrito para destacar valores --}}
                </div>

                <div class="mt-auto"> {{-- Garante que este bloco fique na parte inferior do card --}}
                    <p class="fw-medium text-primary mb-1">Valor Arrecado Acumulado</p> {{-- Usando text-primary --}}
                    <small class="mb-0 text-success fw-bold">R$ {{ number_format($receita->valor_arrecadado_acumulado, 2, ',', '.') }}</small> {{-- Adicionando R$ e negrito para destacar valores --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>