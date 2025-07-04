<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Receitum;
class ReceitasOrcamentarias extends Component
{
    public $receitaOrcamentaria;
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
     $data =  Receitum::with("NaturezaReceitum")->get();
     $totalRegistro = Receitum::with("NaturezaReceitum")->count();
     $valorOrcadoAtualizado =Receitum::sum("valor_orcado_atualizado");
     $valorArrecadomes  = Receitum::sum("valor_arrecadado_mes");
        return view('components.publico.receita.receitas-orcamentarias',
    ["data" => $data, "totalRegistro"=> $totalRegistro,
       'valorOrcadoAtualizado' =>$valorOrcadoAtualizado,
         "valorArrecadomes" => $valorArrecadomes
    ] 
    );
    }
}
