<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Despesa;

class DespesasExecucao extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         $todosRegistros= Despesa::all();

        // Calcula o total de registros
        $quantidadeRegistro = $todosRegistros->count();

        // Calcula os valores totais para o cabeçalho
        $valorEmpenhoTotal = $todosRegistros->sum('valor_empenho');
        $valorLiquidadoTotal = $todosRegistros->sum('valor_liquidado');
        $valorPagoTotal = $todosRegistros->sum('valor_pago');
        return view('components.publico.despesas.despesas-execucao', [
             'QuantidadeRegistro' => $quantidadeRegistro,
            'ValorEmpenhoTotal' => $valorEmpenhoTotal,
            'ValorLiquidadoTotal' => $valorLiquidadoTotal,
            'ValorPagoTotal' => $valorPagoTotal,
            'TodosRegistroLoop' => $todosRegistros,
        ]);
    }
}
