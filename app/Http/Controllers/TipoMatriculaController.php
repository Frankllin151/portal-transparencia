<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoMatricula;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class TipoMatriculaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TipoMatricula::orderBy("updated_at", "desc")->get();
        return view("tipomatricula.showAll" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipomatricula.create");
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

            // Gerar UUID para o ID
            $id = Str::uuid()->toString();
            $validatedData = ['id' => $id] + $validatedData;
 
            TipoMatricula::create($validatedData);

            return redirect()->route('tipomatricula') // Alterado para 'tipomatricula.index'
                ->with('success', 'Tipo de Matrícula cadastrado com sucesso!');

        } catch (ValidationException $e) {
            
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . json_encode($e->errors())) // Convertendo erros para string
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Tipo de Matrícula: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Geralmente usado para exibir um item específico.
        // Se não for usar, você pode remover ou deixar vazio.
        try {
            $data = TipoMatricula::findOrFail($id);
            return view("tipomatricula.show", ["data" => $data]); // Exemplo de view para mostrar um único item
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Tipo de Matrícula não encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = TipoMatricula::findOrFail($id);
            return view("tipomatricula.edit",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
             return redirect()->back()
                ->with('error', 'Tipo de Matrícula não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipoMatricula = TipoMatricula::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            $tipoMatricula->update($validatedData);

            return redirect()->route('tipomatricula') // Alterado para 'tipomatricula.index'
                            ->with('success', 'Tipo de Matrícula atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            abort(404, "Tipo de Matrícula não encontrado.");
            
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
            $data = TipoMatricula::findOrFail($id);
            $data->delete();

            return redirect()->route('tipomatricula') // Alterado para 'tipomatricula.index'
                ->with('success', 'Tipo de Matrícula excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            
            return redirect()->back()
                ->with('error', 'Tipo de Matrícula não encontrado.');
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o Tipo de Matrícula: ' . $e->getMessage());
        }
    }
}
