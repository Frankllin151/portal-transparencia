<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receitum;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
 $ValorOrcadoAtualizadoPorAno = Receitum::select(
               DB::raw('YEAR(created_at) as ano'), // Or the actual year column name
               DB::raw('SUM(valor_orcado_inicial) as total_orcado')
           )
           ->groupBy(DB::raw('YEAR(created_at)')) // Or the actual year column name
           ->orderBy(DB::raw('YEAR(created_at)'))
           ->get();

       // Get sum of valor_arrecadado_acumulado grouped by year
       $ValorArrecadadoPorAno = Receitum::select(
               DB::raw('YEAR(created_at) as ano'), // Or the actual year column name
               DB::raw('SUM(valor_arrecadado_mes) as total_arrecadado')
           )
           ->groupBy(DB::raw('YEAR(created_at)')) // Or the actual year column name
           ->orderBy(DB::raw('YEAR(created_at)'))
           ->get();

    return  view("receita.previstaXrealizada", [
        "ValorOrcadoAtualizado" => $ValorOrcadoAtualizadoPorAno , 
        "ValorArrecadado" => $ValorArrecadadoPorAno 
    ]);
   }

  public function ReceitaOrcamentaria()
  {
    $valorAtulizao = Receitum::select(
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('SUM(valor_orcado_inicial) as total_orcado')
            )
            ->groupBy('ano')
            ->orderBy('ano', 'desc') // Opcional: ordenar os anos
            ->get();
  $ValorArrecado = Receitum::select(
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('SUM(valor_arrecadado_mes) as total_orcado')
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

   public function show($id)
   {
    try{
    $data = Receitum::with('naturezaReceitum')->findOrFail($id);
return view("receita.showpublicoid", ["receita" => $data]);
    }
    catch(ModelNotFoundException $e)
    {
 return redirect()->back()
                ->with('error', 'Receita não encontrado');
    }
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
