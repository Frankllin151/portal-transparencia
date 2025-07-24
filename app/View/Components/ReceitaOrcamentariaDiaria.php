<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Receitum;
use Illuminate\View\Component;

class ReceitaOrcamentariaDiaria extends Component
{
    public $quantidadeDados; 
    public $totalValorOrcadoAtualizado;
    public $totalValorLancadoPeriodo;
    public $receitaOrcamentaria;
    public function __construct()
    {
     $this->quantidadeDados = Receitum::count();
     $this->totalValorOrcadoAtualizado = Receitum::sum('valor_orcado_atualizado');
     $this->totalValorLancadoPeriodo = Receitum::sum('valor_lancado_periodo');
      $this->receitaOrcamentaria = Receitum::with("NaturezaReceitum")->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.publico.receita.receita-orcamentaria-diaria',
    ["quantidadeDados" => $this->quantidadeDados, 
    "totalValorOrcadoAtualizado"  => $this->totalValorOrcadoAtualizado,  
    "totalValorLancadoPeriodo" => $this->totalValorLancadoPeriodo, 
    "receitaOrcamentaria" => $this->receitaOrcamentaria
    ]
    );
    }
}
