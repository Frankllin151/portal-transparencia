<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classificacao; // Certifique-se de que este caminho esteja correto para o seu modelo Classificacao
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClassificacaoController extends Controller // Corrigido o nome do controller para ClassificacaoController
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as classificações ordenadas pela data de atualização em ordem decrescente
        $data = Classificacao::orderBy("updated_at", "desc")->get();
        // Retorna a view 'classificacao.showAll' passando os dados
        return view("classificacao.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'classificacao.create'
        return view("classificacao.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a classificação
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Classificacao no banco de dados
            Classificacao::create($validatedData);

            // Redireciona para a rota 'classificacao' com uma mensagem de sucesso
            return redirect()->route('classificacao')
                ->with('success', 'Classificação cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Classificação: ' . $e->getMessage())
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
        //     $data = Classificacao::findOrFail($id);
        //     return view("classificacao.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Classificação não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a classificação pelo ID ou lança uma exceção ModelNotFoundException
            $data = Classificacao::findOrFail($id);
            // Retorna a view 'classificacao.edit' passando os dados da classificação
            return view("classificacao.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a classificação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Classificação não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a classificação pelo ID ou lança uma exceção ModelNotFoundException
            $classificacao = Classificacao::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a classificação
            ]);

            // Atualiza o registro da classificação com os dados validados
            $classificacao->update($validatedData);

            // Redireciona para a rota 'classificacao' com uma mensagem de sucesso
            return redirect()->route('classificacao')
                ->with('success', 'Classificação atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a classificação não for encontrada, aborta com erro 404
            abort(404, "Classificação não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Classificação: ' . $e->getMessage())
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
            // Encontra a classificação pelo ID ou lança uma exceção ModelNotFoundException
            $data = Classificacao::findOrFail($id);
            // Exclui o registro da classificação
            $data->delete();

            // Redireciona para a rota 'classificacao' com uma mensagem de sucesso
            return redirect()->route('classificacao')
                ->with('success', 'Classificação excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a classificação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Classificação não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Classificação: ' . $e->getMessage());
        }
    }
}
