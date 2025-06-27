<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receitasdespesasextraorcamentarium;
use App\Models\Fonterecurso;
use App\Models\Classificacao;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
class ReceiDesPexTraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Receitasdespesasextraorcamentarium::
         orderBy("created_at", "desc")->get(); 
       return view("ReceitasDespesasExtraorcamentaria.showAll",["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $dataFonteRecurso = Fonterecurso::orderBy("created_at", "desc")->get();
      $dataClassificacao  = Classificacao::orderBy("created_at", "desc")->get();
       return view("ReceitasDespesasExtraorcamentaria.create",
    [
    "dataFonteRecurso" => $dataFonteRecurso,
    "dataClassificacao" => $dataClassificacao,
    ]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           
            $validatedData = $request->validate([
                'classificacao' => 'required|string|max:255',
                'numero' => 'required|string|max:255', 
                'descricao_classificacao' => 'required|string|max:255',
                'fonte_recursos' => 'required|string|max:255',
                'mascara' => 'required|string|max:255',
            ]);

            $id = Str::uuid()->toString();
            $validatedData = ['id' => $id] + $validatedData;

           
            $novaReceitaDespesa = Receitasdespesasextraorcamentarium::create($validatedData);

            return redirect()->route('despreceitaex.show', ['id' => $novaReceitaDespesa->id])
                ->with('success', 'Receita/Despesa Extraorçamentária cadastrada com sucesso!');

        } catch (ValidationException $e) {
           
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . $e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Receita/Despesa Extraorçamentária: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Receitasdespesasextraorcamentarium::findOrFail($id);
          if(!$data){
         abort(404, "Orçamentaria Despesa Receita  não encontrada");
      }
  
    return view("ReceitasDespesasExtraorcamentaria.showid", ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = Receitasdespesasextraorcamentarium::findOrFail($id);
       $dataFonteRecurso = Fonterecurso::orderBy("created_at", "desc")->get();
      $dataClassificacao  = Classificacao::orderBy("created_at", "desc")->get();
        if(!$data){
         abort(404, "Orçamentaria Despesa Receita  não encontrada");
      }
    return view("ReceitasDespesasExtraorcamentaria.edit", ["data" => $data, 
 "dataFonteRecurso" => $dataFonteRecurso,
    "dataClassificacao" => $dataClassificacao,
]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data = Receitasdespesasextraorcamentarium::findOrFail($id);
         
        try {
            $validatedData = $request->validate([
                'classificacao' => 'required|string|max:255',
                'descricao_classificacao' => 'required|string|max:255',
                'fonte_recursos' => 'required|string|max:255',
                'mascara' => 'required|string|max:255',
                'numero' => [
                    'required',
                    'string',
                    'max:255',
                  \Illuminate\Validation\Rule::unique('receitasdespesasextraorcamentaria')->ignore($id),
                ],
            ]);

            $data->update($validatedData); 
            return redirect()->route('despreceitaex.show', $data->id)->with('success', 'Registro atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            abort(404, "Receita/Despesa Extra Orçamentária não encontrada.");

        } catch (ValidationException $e) {
          
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o registro: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
          
            $data = Receitasdespesasextraorcamentarium::findOrFail($id);
            $data->delete();

            return redirect()->route('despreceitaex') 
                ->with('success', 'Receita/Despesa Extraorçamentária excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Receita/Despesa Extraorçamentária não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Receita/Despesa Extraorçamentária: ' . $e->getMessage());
        }
    }
}
