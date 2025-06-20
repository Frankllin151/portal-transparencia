<?php

namespace App\Http\Controllers;

use App\Models\NaturezaReceitum;
use App\Models\Receitum;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Receitum::orderBy("created_at", "desc")->get();
        return view("receita.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataNatureza = NaturezaReceitum::orderBy("created_at", "desc")->get();
        return view("receita.create", ["dataNatureza" => $dataNatureza]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
            'data' => 'required|date',
            'natureza_id' => 'required|uuid|exists:natureza_receita,id', // Valida se é um UUID e existe na tabela natureza_receita
            'finalidade' => 'required|string|max:255',
            'forma_ingresso' => 'required|string|max:255',
            'valor_orcado_inicial' => 'nullable|numeric|min:0',
            'valor_orcado_atualizado' => 'nullable|numeric|min:0',
            'valor_deducoes_orcado' => 'nullable|numeric|min:0',
            'valor_arrecadado_mes' => 'nullable|numeric|min:0',
            'valor_arrecadado_acumulado' => 'nullable|numeric|min:0',
            'valor_deducoes_mes' => 'nullable|numeric|min:0',
            'valor_lancado_mes' => 'nullable|numeric|min:0',
            'valor_lancado_periodo' => 'nullable|numeric|min:0',
            'receita_corrente_liquida' => 'boolean',
            'realizado_percentual' => 'nullable|numeric|min:0|max:100',
        ]);
         $id = Str::uuid()->toString();
        $validatedData = ['id' => $id] + $validatedData;
        $novaReceita = Receitum::create($validatedData);

        return redirect()->route('receita.show', ['id' => $novaReceita->id])
        ->with('success', 'Receita  cadastrado com sucesso!');

        } catch(ValidationException $e){
return redirect()->back()->with('error', 'Erros nos inputs: ' . 
$e->errors())->withInput();
        } catch(\Exception $e){
return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o processo licitatório: ' .
 $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $receitaId = Receitum::with("NaturezaReceitum")->findOrFail($id);
         if(!$receitaId){
             abort(404, "Receita não encontrada");
         }
        return view("receita.showid", ["receita" => $receitaId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $receitaId = Receitum::with("NaturezaReceitum")->findOrFail($id);
      $dataNatureza = NaturezaReceitum::orderBy("created_at", "desc")->get();
    
      if(!$receitaId){
             abort(404, "Receita não encontrada");
         }
     return view("receita.edit", [ 
    "receita"=>$receitaId, 
    "dataNatureza" => $dataNatureza
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $receita= Receitum::find($id);
          if(!$receita){
             abort(404, "Receita não encontrada");
         }
        try{
          $validatedData = $request->validate([
            'data' => 'required|date',
            'natureza_id' => 'required|uuid|exists:natureza_receita,id', // Valida se é um UUID e existe na tabela natureza_receita
            'finalidade' => 'required|string|max:255',
            'forma_ingresso' => 'required|string|max:255',
            'valor_orcado_inicial' => 'nullable|numeric|min:0',
            'valor_orcado_atualizado' => 'nullable|numeric|min:0',
            'valor_deducoes_orcado' => 'nullable|numeric|min:0',
            'valor_arrecadado_mes' => 'nullable|numeric|min:0',
            'valor_arrecadado_acumulado' => 'nullable|numeric|min:0',
            'valor_deducoes_mes' => 'nullable|numeric|min:0',
            'valor_lancado_mes' => 'nullable|numeric|min:0',
            'valor_lancado_periodo' => 'nullable|numeric|min:0',
            'receita_corrente_liquida' => 'boolean',
            'realizado_percentual' => 'nullable|numeric|min:0|max:100',
        ]);
         $receita->update($validatedData);
          return redirect()->route('receita.show', $receita->id)
          ->with('success', 'Receita atualizada com sucesso!');
        }
         catch(ValidationException $e){
return redirect()->back()->with('error', 'Erros nos inputs: ' . 
$e->errors())->withInput();
        } catch(\Exception $e){
return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a Receita: ' .
 $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $receita= Receitum::find($id);
          if(!$receita){
             abort(404, "Receita não encontrada");
         }

       $receita->delete();

    return redirect()->route('receita')->with('success', 'Receita deletada com sucesso.');
    }
}
