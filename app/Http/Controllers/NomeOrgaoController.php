<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomeorgao;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class NomeOrgaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Nomeorgao::orderBy("updated_at", "desc")->get();
        return view("nomeorgao.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("nomeorgao.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            
            $id = Str::uuid()->toString();
            $validatedData = ['id' => $id] + $validatedData;
 
          Nomeorgao::create($validatedData);

            return redirect()->route('nomeorgao')
                ->with('success', 'Nome Orgão cadastrado com sucesso!');

        } catch (ValidationException $e) {
            
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . $e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Nome Orgão ' . $e->getMessage())
                ->withInput();
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    try {
            $data = Nomeorgao::findOrFail($id);
            return view("nomeorgao.edit",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Nome Orgão não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipoPoder = Nomeorgao::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipoPoder->update($validatedData);

        return redirect()->route('nomeorgao')
                         ->with('success', 'Nome Orgão atualizado com sucesso!');

    } catch (ModelNotFoundException $e) {
        abort(404, "Nome Orgão não encontrado.");
        
    } catch (ValidationException $e) {
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();

    } catch (\Exception $e) {
        return redirect()->back()
                         ->with('error', 'Ocorreu um erro ao atualizar o registro Nome Orgão: ' . $e->getMessage())
                         ->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          try {
          
            $data = Nomeorgao::findOrFail($id);
            $data->delete();

            return redirect()->route('nomeorgao') 
                ->with('success', 'Nome Orgão excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Nome Orgão não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir  Nome Orgão : ' . $e->getMessage());
        }
    
    }
}
