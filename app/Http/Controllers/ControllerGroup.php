<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group; // Certifique-se de que este caminho esteja correto para o seu modelo Group
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ControllerGroup extends Controller
{
    
    /**
     * Display a listing of the resource.
     * Exibe uma listagem dos grupos.
     */
    public function index()
    {
        $data = Group::orderBy("updated_at", "desc")->get();
        return view("group.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo grupo.
     */
    public function create()
    {
        return view("group.create");
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um grupo recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255', // Supondo que 'name' seja o campo para o grupo
            ]);

            $id = Str::uuid()->toString();
            $validatedData = ['id' => $id] + $validatedData;

            Group::create($validatedData);

            return redirect()->route('grupos')
                ->with('success', 'Grupo cadastrado com sucesso!');

        } catch (ValidationException $e) {
            return dd($e->errors());
        } catch (\Exception $e) {
            
                 return dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o grupo especificado.
     */
    public function edit(string $id)
    {
        try {
            $data = Group::findOrFail($id);
            return view("group.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Grupo não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o grupo especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            $group = Group::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $group->update($validatedData);

            return redirect()->route('grupos')
                ->with('success', 'Grupo atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            abort(404, "Grupo não encontrado.");

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro do Grupo: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     * Remove o grupo especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        try {
            $data = Group::findOrFail($id);
            $data->delete();

            return redirect()->route('grupos')
                ->with('success', 'Grupo excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Grupo não encontrado.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o Grupo: ' . $e->getMessage());
        }
    }
}
