<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipoacao;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
class TipoAcaoControlller extends Controller
{
    
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tipoacao::orderBy("updated_at", "desc")->get();
        return view("tipoacao.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipoacao.create");
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
 
          Tipoacao::create($validatedData);

            return redirect()->route('tipoacao')
                ->with('success', 'Tipo Empenho cadastrado com sucesso!');

        } catch (ValidationException $e) {
            
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . $e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Tipo Empenho ' . $e->getMessage())
                ->withInput();
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    try {
            $data = Tipoacao::findOrFail($id);
            return view("tipoacao.edit",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Tipo Empenho não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipoPoder = Tipoacao::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipoPoder->update($validatedData);

        return redirect()->route('tipoacao')
                         ->with('success', 'Tipo Empenho atualizado com sucesso!');

    } catch (ModelNotFoundException $e) {
        abort(404, "Tipo Empenho não encontrado.");
        
    } catch (ValidationException $e) {
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();

    } catch (\Exception $e) {
        return redirect()->back()
                         ->with('error', 'Ocorreu um erro ao atualizar o registro: ' . $e->getMessage())
                         ->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          try {
          
            $data = Tipoacao::findOrFail($id);
            $data->delete();

            return redirect()->route('tipoacao') 
                ->with('success', 'Tipo Empenho excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Tipo Empenho não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir Tipo Empenho : ' . $e->getMessage());
        }
    
    }
}

