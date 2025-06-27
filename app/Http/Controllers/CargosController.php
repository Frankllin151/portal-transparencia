<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Classificacaocargo;
use App\Models\Situacaocargo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cargo::orderBy("updated_at", "desc")->get();
    
        return view("cargos.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $dataSituacao = Situacaocargo::orderBy("updated_at", "desc")->get(); // Assumindo que o campo de nome é 'nome'
        $dataClassificacao = Classificacaocargo::orderBy("updated_at", "desc")->get(); // Assumindo que o campo de nome é 'nome'

        return view("cargos.create", [
            "dataSituacao" => $dataSituacao,
            "dataClassificacao" => $dataClassificacao,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Define as regras de validação para os campos do Cargo
            $validatedData = $request->validate([
                'ano' => 'required|string|max:255',
                'competencia' => 'required|string|max:255',
                'descricao_cargo' => 'required|string|max:255',
                'classificacao_cargo' => 'required|string|max:255',
                'situacao_cargo' => 'required|string|max:255',
            ]);

            // Gera um novo UUID para o campo 'id'
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id;

            // Cria um novo registro de Cargo no banco de dados
            $cargo = Cargo::create($validatedData);

            // Redireciona para a página de detalhes do Cargo recém-criado
            // ou para a listagem de cargos, com uma mensagem de sucesso
            return redirect()->route('cargos.show', $cargo->id)
                             ->with('success', 'Cargo adicionado com sucesso!');

        } catch (ValidationException $e) {
            // Captura e trata erros de validação
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (\Exception $e) {
            // Captura e trata outros erros gerais
            return redirect()->back()
                             ->with('error', 'Ocorreu um erro ao adicionar o cargo: ' . $e->getMessage())
                             ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Cargo::findOrFail($id);
            return view("cargos.showid",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Cargo não encontrado.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Cargo::findOrFail($id);
             $dataSituacao = Situacaocargo::orderBy("updated_at", "desc")->get();
        $dataClassificao = Classificacaocargo::orderBy("updated_at", "desc")->get();
           
            return view("cargos.edit",  ["data" => $data,
         "dataSituacao" => $dataSituacao, 
         "dataClassificao" => $dataClassificao
        ]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Cargo não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try {
            $cargo = Cargo::findOrFail($id);

            $request->validate([
                'descricao_cargo' => 'required|string|max:255',
                'situacao_cargo' => 'required|string|max:255',
                'classificacao_cargo' => 'required|string|max:255',
                'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Exemplo de validação de ano
                'competencia' => 'required|string|max:255',
               
            ]);

            $cargo->descricao_cargo = $request->input('descricao_cargo');
            $cargo->situacao_cargo = $request->input('situacao_cargo');
            $cargo->classificacao_cargo = $request->input('classificacao_cargo');
            $cargo->ano = $request->input('ano');
            $cargo->competencia = $request->input('competencia');
            
            $cargo->save(); 

            return redirect()->route('cargos.show', $cargo->id)
                             ->with('success', 'Cargo atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Cargo não encontrado para atualização.');
        } catch (ValidationException $e) {
           
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o cargo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
