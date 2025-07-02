<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use  App\Models\Despesa;
class Despesasprograma extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $todosRegistros = Despesa::all();

        // Calcula o total de registros
        $quantidadeRegistro = $todosRegistros->count();

        // Calcula os valores totais para o cabeçalho
        $valorAtualizadoTotal = $todosRegistros->sum('valor_atualizado');
        $valorEmpenhoTotal = $todosRegistros->sum('valor_empenho');
        $valorLiquidadoTotal = $todosRegistros->sum('valor_liquidado');
        return view('components.publico.despesas.despesasprograma', [
             'QuantidadeRegistro' => $quantidadeRegistro,
            'ValorAtualizadoTotal' => $valorAtualizadoTotal,
            'ValorEmpenhoTotal' => $valorEmpenhoTotal,
            'ValorLiquidadoTotal' => $valorLiquidadoTotal,
            'TodosRegistroLoop' => $todosRegistros,
        ]);
    }
}
