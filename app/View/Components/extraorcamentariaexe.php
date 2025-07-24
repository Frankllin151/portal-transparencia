<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
class extraorcamentariaexe extends Component
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
        $extraorcametaria = "teste";

        return view('components.extraorcamentariaexe', [
            'extraorcametaria' => $extraorcametaria
        ]);
    }
}
