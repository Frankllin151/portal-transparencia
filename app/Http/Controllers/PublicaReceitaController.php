<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receitum;
use Illuminate\Support\Facades\DB;
class PublicaReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("receita.receitapublica");
    }


   public function previstaRealizada()
   {
   $dataGrafico = Receitum::select(
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('SUM(valor_orcado_atualizado) as total_orcado')
            )
            ->groupBy('ano')
            ->orderBy('ano', 'desc') // Opcional: ordenar os anos
            ->get();
          
    return  view("receita.previstaXrealizada", ["dataGrafico"=>  $dataGrafico]);
   }

  public function ReceitaOrcamentaria()
  {
    $valorAtulizao = Receitum::select(
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('SUM(valor_orcado_atualizado) as total_orcado')
            )
            ->groupBy('ano')
            ->orderBy('ano', 'desc') // Opcional: ordenar os anos
            ->get();
  $ValorArrecado = Receitum::select(
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('SUM(valor_arrecadado_acumulado) as total_orcado')
            )
            ->groupBy('ano')
            ->orderBy('ano', 'desc') // Opcional: ordenar os anos
            ->get();
    return view("receita.receitaOrcamentaria", ["valorAtulizao" => $valorAtulizao , 
    "ValorArrecado" => $ValorArrecado ]);
  }



    public function  VisualizaDiariaOrcamentaria()
    {
      return view("receita.ReceitaOrcamentariaDiaria");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
