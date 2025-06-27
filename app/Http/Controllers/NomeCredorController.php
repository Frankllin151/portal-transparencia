<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomecredor;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class NomeCredorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Nomecredor::orderBy("updated_at", "desc")->get();
        return view("nomecredor.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("nomecredor.create");
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
 
          Nomecredor::create($validatedData);

            return redirect()->route('nomecredor')
                ->with('success', 'Nome Credor cadastrado com sucesso!');

        } catch (ValidationException $e) {
            
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . $e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Nome Credor ' . $e->getMessage())
                ->withInput();
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    try {
            $data = Nomecredor::findOrFail($id);
            return view("nomecredor.edit",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Nome Credor não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipoPoder = Nomecredor::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipoPoder->update($validatedData);

        return redirect()->route('nomecredor')
                         ->with('success', 'Nome Credor atualizado com sucesso!');

    } catch (ModelNotFoundException $e) {
        abort(404, "Nome Credor não encontrado.");
        
    } catch (ValidationException $e) {
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();

    } catch (\Exception $e) {
        return redirect()->back()
                         ->with('error', 'Ocorreu um erro ao atualizar o registro Nome Credor: ' . $e->getMessage())
                         ->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          try {
          
            $data = Nomecredor::findOrFail($id);
            $data->delete();

            return redirect()->route('nomecredor') 
                ->with('success', 'Nome Credor excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Nome Credor não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir  Nome Credor : ' . $e->getMessage());
        }
    
    }
}
