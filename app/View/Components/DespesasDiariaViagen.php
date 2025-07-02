<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB; 
use App\Models\Despesa;
class DespesasDiariaViagen extends Component
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
         $todosRegistros = Despesa::all();

        // Calcula o total de registros
        $quantidadeRegistro = $todosRegistros->count();

        // Calcula o valor total empenhado
        $valorEmpenho = $todosRegistros->sum('valor_empenho');

        // Calcula o valor total alterado
        $valorAlterado = $todosRegistros->sum('valor_alterado');

        // Calcula o valor total pago atual
        $valorPagoAtual = $todosRegistros->sum('valor_pago');
        return view('components.publico.despesas.despesas-diaria-viagen',[
              'QuantidadeRegistro' => $quantidadeRegistro,
            'ValorEmpenho' => $valorEmpenho,
            'ValorAlterado' => $valorAlterado,
            'ValorPagoAtual' => $valorPagoAtual,
            'TodosRegistroLoop' => $todosRegistros,
        ]);
    }
}
