<?php

namespace App\View\Components;

use Closure;
use App\Models\Receitum;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrevistaRealizada extends Component
{
    public $totalValorOrcadoAtualizado;
    public $percentualValor;
    public $totalValorOrcadoInicial;
    public $totalValorDeducoesOrcado;
    public $totalValorArrecadadoMes;
    public $totalValorArrecadadoAcumulado;
    public $totalValorDeducoesMes;
    public $totalValorLancadoMes;
    public $totalValorLancadoPeriodo;
    /**
     * Create a new component instance.
     */

    public function __construct()
    {
        
        $this->percentualValor = Receitum::sum("realizado_percentual");
        $this->totalValorOrcadoInicial = Receitum::sum('valor_orcado_inicial');
        $this->totalValorOrcadoAtualizado = Receitum::sum('valor_orcado_atualizado');
        $this->totalValorDeducoesOrcado = Receitum::sum('valor_deducoes_orcado');
        $this->totalValorArrecadadoMes = Receitum::sum('valor_arrecadado_mes');
        $this->totalValorArrecadadoAcumulado = Receitum::sum('valor_arrecadado_acumulado');
        $this->totalValorDeducoesMes = Receitum::sum('valor_deducoes_mes');
        $this->totalValorLancadoMes = Receitum::sum('valor_lancado_mes');
        $this->totalValorLancadoPeriodo = Receitum::sum('valor_lancado_periodo');
        $this->percentualValor = Receitum::sum('realizado_percentual');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.publico.receita.prevista-realizada', 
    [
        'totalValorOrcadoInicial' => $this->totalValorOrcadoInicial,
            'totalValorOrcadoAtualizado' => $this->totalValorOrcadoAtualizado,
            'totalValorDeducoesOrcado' => $this->totalValorDeducoesOrcado,
            'totalValorArrecadadoMes' => $this->totalValorArrecadadoMes,
            'totalValorArrecadadoAcumulado' => $this->totalValorArrecadadoAcumulado,
            'totalValorDeducoesMes' => $this->totalValorDeducoesMes,
            'totalValorLancadoMes' => $this->totalValorLancadoMes,
            'totalValorLancadoPeriodo' => $this->totalValorLancadoPeriodo,
            'percentualValor' => $this->percentualValor,
    ]
    );
    }
}
