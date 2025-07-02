<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Despesa;
use Illuminate\View\Component;

class PessoalDespesas extends Component
{
    public $ValorEmpenho;
    public $ValorAlterado; 
    public $QuantidadeRegistro;
    public $TodosRegistroLoop;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {   
    $this->ValorAlterado = Despesa::sum("valor_alterado");
    $this->ValorEmpenho =  Despesa::sum("valor_empenho");
    $this->QuantidadeRegistro = Despesa::count();
    $this->TodosRegistroLoop   = Despesa::orderBy("updated_at",  "desc")->get();

        // quantidade de registro
        //valor_empenho , valor_alterado ,

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // data_empenho , numero_empenho,  codigo_elemento , historico_empenho 
        // credor_nome, valor_liquidado ,  valor_pago
        return view('components.publico.despesas.pessoal-despesas', 
    ["ValorAlterado" => $this->ValorAlterado , "ValorEmpenho"
     =>  $this->ValorEmpenho , "QuantidadeRegistro" =>  $this->QuantidadeRegistro, 
     "TodosRegistroLoop"  => $this->TodosRegistroLoop
     ]
    );
    }
}
