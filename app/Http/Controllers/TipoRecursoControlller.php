<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use App\Models\Tiporecurso;

class TipoRecursoControlller extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tiporecurso::orderBy("updated_at", "desc")->get();
        return view("tipoRecurso.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipoRecurso.create");
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
 
          Tiporecurso::create($validatedData);

            return redirect()->route('tiporecurso')
                ->with('success', 'Tipo Recurso cadastrado com sucesso!');

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
            $data = Tiporecurso::findOrFail($id);
            return view("tipoRecurso.edit",  ["data" => $data]);
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
       $tipoPoder = Tiporecurso::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipoPoder->update($validatedData);

        return redirect()->route('tiporecurso')
                         ->with('success', 'Tipo Recurso atualizado com sucesso!');

    } catch (ModelNotFoundException $e) {
        abort(404, "Tipo Recurso não encontrado.");
        
    } catch (ValidationException $e) {
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();

    } catch (\Exception $e) {
        return redirect()->back()
                         ->with('error', 'Ocorreu um erro ao atualizar o registro Tipo Recurso: ' . $e->getMessage())
                         ->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          try {
          
            $data = Tiporecurso::findOrFail($id);
            $data->delete();

            return redirect()->route('tiporecurso') 
                ->with('success', 'Tipo Recurso excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Tipo Recurso não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir Tipo Recurso : ' . $e->getMessage());
        }
    
    }
}
