<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Despesa;

class DespesasCredor extends Component
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
        // Busca todos os registros da tabela 'despesa'
        // Você pode adicionar filtros aqui se precisar exibir apenas um subconjunto de despesas
        $todosRegistros = Despesa::all();

        // Calcula o total de registros
        $quantidadeRegistro = $todosRegistros->count();

        // Calcula o valor total pago
        $valorPagoTotal = $todosRegistros->sum('valor_pago');

        // Retorna a view, passando os dados
        return view('components.publico.despesas.despesas-credor', [
            'QuantidadeRegistro' => $quantidadeRegistro,
            'ValorPagoTotal' => $valorPagoTotal,
            'TodosRegistroLoop' => $todosRegistros,
        ]);
    }
}
