<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finalidade; // Certifique-se de que este caminho esteja correto para o seu modelo Finalidade
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FinalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as finalidades ordenadas pela data de atualização em ordem decrescente
        $data = Finalidade::orderBy("updated_at", "desc")->get();
        // Retorna a view 'finalidade.showAll' passando os dados
        return view("finalidade.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'finalidade.create'
        return view("finalidade.create");
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        try {
            // Valida os dados da requisição
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a finalidade
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Finalidade no banco de dados
            Finalidade::create($validatedData);

            // Redireciona para a rota 'finalidade' com uma mensagem de sucesso
            return redirect()->route('finalidade')
                ->with('success', 'Finalidade cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Finalidade: ' . $e->getMessage())
                ->withInput(); // Mantém os dados preenchidos no formulário
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a finalidade pelo ID ou lança uma exceção ModelNotFoundException
            $data = Finalidade::findOrFail($id);
            // Retorna a view 'finalidade.edit' passando os dados da finalidade
            return view("finalidade.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a finalidade não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Finalidade não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a finalidade pelo ID ou lança uma exceção ModelNotFoundException
            $finalidade = Finalidade::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a finalidade
            ]);

            // Atualiza o registro da finalidade com os dados validados
            $finalidade->update($validatedData);

            // Redireciona para a rota 'finalidade' com uma mensagem de sucesso
            return redirect()->route('finalidade')
                ->with('success', 'Finalidade atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a finalidade não for encontrada, aborta com erro 404
            abort(404, "Finalidade não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Finalidade: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     * Remove o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        try {
            // Encontra a finalidade pelo ID ou lança uma exceção ModelNotFoundException
            $data = Finalidade::findOrFail($id);
            // Exclui o registro da finalidade
            $data->delete();

            // Redireciona para a rota 'finalidade' com uma mensagem de sucesso
            return redirect()->route('finalidade')
                ->with('success', 'Finalidade excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a finalidade não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Finalidade não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Finalidade: ' . $e->getMessage());
        }
    }
}
