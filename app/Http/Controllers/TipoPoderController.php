<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\TipoPoder;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
class TipoPoderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TipoPoder::orderBy("updated_at", "desc")->get();
        return view("tipopoder.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipopoder.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'ativo' => 'required|boolean', 
            ]);

            
            $id = Str::uuid()->toString();
            $validatedData = ['id' => $id] + $validatedData;
 
          TipoPoder::create($validatedData);

            return redirect()->route('tipopoder')
                ->with('success', 'Tipo de Poder cadastrado com sucesso!');

        } catch (ValidationException $e) {
            
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . $e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Tipo de Poder: ' . $e->getMessage())
                ->withInput();
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    try {
            $data = TipoPoder::findOrFail($id);
            return view("tipopoder.edit",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Tipo poder não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipoPoder = TipoPoder::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'ativo' => 'required|boolean',
        ]);

        $tipoPoder->update($validatedData);

        return redirect()->route('tipopoder')
                         ->with('success', 'Tipo de Poder atualizado com sucesso!');

    } catch (ModelNotFoundException $e) {
        abort(404, "Tipo de Poder não encontrado.");
        
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
          
            $data = TipoPoder::findOrFail($id);
            $data->delete();

            return redirect()->route('tipopoder') 
                ->with('success', 'Tipo poder  excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Tipo poder  não encontrada.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir Tipo Poder : ' . $e->getMessage());
        }
    
    }
}
