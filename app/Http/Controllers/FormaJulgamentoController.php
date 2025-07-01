<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormaJulgamento; // Certifique-se de que este caminho esteja correto para o seu modelo FormaJulgamento
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FormaJulgamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as formas de julgamento ordenadas pela data de atualização em ordem decrescente
        $data = FormaJulgamento::orderBy("updated_at", "desc")->get();
        // Retorna a view 'formajulgamento.showAll' passando os dados
        return view("formajulgamento.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'formajulgamento.create'
        return view("formajulgamento.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a forma de julgamento
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de FormaJulgamento no banco de dados
            FormaJulgamento::create($validatedData);

            // Redireciona para a rota 'formajulgamento' com uma mensagem de sucesso
            return redirect()->route('formajulgamento')
                ->with('success', 'Forma de Julgamento cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Forma de Julgamento: ' . $e->getMessage())
                ->withInput(); // Mantém os dados preenchidos no formulário
        }
    }

    /**
     * Display the specified resource.
     * Exibe o recurso especificado.
     * (Este método não foi implementado com base no seu exemplo anterior,
     * mas pode ser adicionado se necessário no futuro).
     */
    public function show(string $id)
    {
        // Implementação opcional, se você precisar exibir um único registro.
        // Por exemplo:
        // try {
        //     $data = FormaJulgamento::findOrFail($id);
        //     return view("formajulgamento.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Forma de Julgamento não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a forma de julgamento pelo ID ou lança uma exceção ModelNotFoundException
            $data = FormaJulgamento::findOrFail($id);
            // Retorna a view 'formajulgamento.edit' passando os dados da forma de julgamento
            return view("formajulgamento.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a forma de julgamento não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Forma de Julgamento não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a forma de julgamento pelo ID ou lança uma exceção ModelNotFoundException
            $formaJulgamento = FormaJulgamento::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a forma de julgamento
            ]);

            // Atualiza o registro da forma de julgamento com os dados validados
            $formaJulgamento->update($validatedData);

            // Redireciona para a rota 'formajulgamento' com uma mensagem de sucesso
            return redirect()->route('formajulgamento')
                ->with('success', 'Forma de Julgamento atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a forma de julgamento não for encontrada, aborta com erro 404
            abort(404, "Forma de Julgamento não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Forma de Julgamento: ' . $e->getMessage())
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
            // Encontra a forma de julgamento pelo ID ou lança uma exceção ModelNotFoundException
            $data = FormaJulgamento::findOrFail($id);
            // Exclui o registro da forma de julgamento
            $data->delete();

            // Redireciona para a rota 'formajulgamento' com uma mensagem de sucesso
            return redirect()->route('formajulgamento')
                ->with('success', 'Forma de Julgamento excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a forma de julgamento não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Forma de Julgamento não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Forma de Julgamento: ' . $e->getMessage());
        }
    }
}
