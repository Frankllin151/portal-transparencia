<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Despesa;
class DespesasOrcamentaria extends Component
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

        // Calcula os valores totais para o cabeçalho
        $valorOrcadoTotal = $todosRegistros->sum('valor_orcado');
        $valorAtualizadoTotal = $todosRegistros->sum('valor_atualizado');
        $valorEmpenhoTotal = $todosRegistros->sum('valor_empenho');
        $valorLiquidadoTotal = $todosRegistros->sum('valor_liquidado');
        $valorPagoTotal = $todosRegistros->sum('valor_pago');

        // Retorna a view, passando os dados
        return view('components.publico.despesas.despesas-orcamentaria', [
            'QuantidadeRegistro' => $quantidadeRegistro,
            'ValorOrcadoTotal' => $valorOrcadoTotal,
            'ValorAtualizadoTotal' => $valorAtualizadoTotal,
            'ValorEmpenhoTotal' => $valorEmpenhoTotal,
            'ValorLiquidadoTotal' => $valorLiquidadoTotal,
            'ValorPagoTotal' => $valorPagoTotal,
            'TodosRegistroLoop' => $todosRegistros,
        ]);
    }
}
