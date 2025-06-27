<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimentacaobancarium;
use App\Models\Entidade;
use App\Models\TipoConta;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class MovimentacaoBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movimentacaobancarium::orderBy("updated_at" , "desc")->get();

        return view("MovimentacaoBancaria.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataEntidade = Entidade::orderBy("updated_at" , "desc")->get();
        $dataTipoConta = TipoConta::orderBy("updated_at" , "desc")->get();
        return view("MovimentacaoBancaria.create",
    ["dataEntidade"  => $dataEntidade, "dataTipoConta" => $dataTipoConta]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        try {
          
            $validatedData = $request->validate([
                'nome_entidade' => 'required|string|max:255',
                'codigo_conta' => 'required|string|max:255',
                'codigo_banco' => 'required|string|max:255',
                'nome_banco' => 'required|string|max:255',
                'numero_agencia' => 'required|string|max:255',
                'descricao_agencia' => 'required|string|max:255',
                'numero_conta' => [
                    'required',
                    'string',
                    'max:255',
                    // Regra unique para numero_conta, SEM ignorar ID, pois é um novo registro
                    Rule::unique('movimentacaobancaria', 'numero_conta'),
                ],
                'tipo_conta' => 'required|string|max:255',
            ]);

           
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id; 

            
            $movimentacaoBancaria = Movimentacaobancarium::create($validatedData);

          
            return redirect()->route('movimentacaobancaria.show', $movimentacaoBancaria->id)
                             ->with('success', 'Movimentação bancária adicionada com sucesso!');

        } catch (ValidationException $e) {
           
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()->with('error', 'Ocorreu um erro ao adicionar a movimentação bancária: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Movimentacaobancarium::findOrFail($id);

            return view("MovimentacaoBancaria.showid",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Receita/Despesa Extraorçamentária não encontrada.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Movimentacaobancarium::findOrFail($id);
            $dataEntidade = Entidade::orderBy("updated_at" , "desc")->get();
        $dataTipoConta = TipoConta::orderBy("updated_at" , "desc")->get();
            return view("MovimentacaoBancaria.edit",  ["data" => $data,
        "dataEntidade"  => $dataEntidade, "dataTipoConta" => $dataTipoConta
        ]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Receita/Despesa Extraorçamentária não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        try {
            $data = Movimentacaobancarium::findOrFail($id);

            $validatedData = $request->validate([
                'nome_entidade' => 'required|string|max:255',
                'codigo_conta' => 'required|string|max:255',
                'codigo_banco' => 'required|string|max:255',
                'nome_banco' => 'required|string|max:255',
                'numero_agencia' => 'required|string|max:255',
                'descricao_agencia' => 'required|string|max:255',
                'numero_conta' => [
                    'required',
                    'string',
                    'max:255',
                    // Regra unique para numero_conta, ignorando o ID atual para edições
                    Rule::unique('movimentacaobancaria', 'numero_conta')->ignore($id),
                ],
                'tipo_conta' => 'required|string|max:255',
            ]);

            $data->update($validatedData);

            return redirect()->route('movimentacaobancaria.show', $data->id)->with('success', 'Movimentação bancária atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            abort(404, "Movimentação Bancária não encontrada para atualização.");
        } catch (ValidationException $e) {
          
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (\Exception $e) {
         
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a movimentação bancária: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      try {
           
            $movimentacaoBancaria = Movimentacaobancarium::findOrFail($id);

            $movimentacaoBancaria->delete();

           
            return redirect()->route('movimentacao') 
                             ->with('success', 'Movimentação bancária excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
           
            return redirect()->back()
                             ->with('error', 'Movimentação bancária não encontrada para exclusão.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir a movimentação bancária: ' . $e->getMessage());
        }
    }
}
