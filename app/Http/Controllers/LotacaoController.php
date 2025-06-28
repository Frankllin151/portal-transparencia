<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lotacao; // Certifique-se de que este caminho esteja correto para o seu modelo Lotacao
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as lotações ordenadas pela data de atualização em ordem decrescente
        $data = Lotacao::orderBy("updated_at", "desc")->get();
        // Retorna a view 'lotacao.showAll' passando os dados
        return view("lotacao.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'lotacao.create'
        return view("lotacao.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a lotação
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Lotacao no banco de dados
            Lotacao::create($validatedData);

            // Redireciona para a rota 'lotacao' com uma mensagem de sucesso
            return redirect()->route('lotacao')
                ->with('success', 'Lotação cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Lotação: ' . $e->getMessage())
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
        //     $data = Lotacao::findOrFail($id);
        //     return view("lotacao.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Lotação não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a lotação pelo ID ou lança uma exceção ModelNotFoundException
            $data = Lotacao::findOrFail($id);
            // Retorna a view 'lotacao.edit' passando os dados da lotação
            return view("lotacao.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a lotação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Lotação não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a lotação pelo ID ou lança uma exceção ModelNotFoundException
            $lotacao = Lotacao::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a lotação
            ]);

            // Atualiza o registro da lotação com os dados validados
            $lotacao->update($validatedData);

            // Redireciona para a rota 'lotacao' com uma mensagem de sucesso
            return redirect()->route('lotacao')
                ->with('success', 'Lotação atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a lotação não for encontrada, aborta com erro 404
            abort(404, "Lotação não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Lotação: ' . $e->getMessage())
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
            // Encontra a lotação pelo ID ou lança uma exceção ModelNotFoundException
            $data = Lotacao::findOrFail($id);
            // Exclui o registro da lotação
            $data->delete();

            // Redireciona para a rota 'lotacao' com uma mensagem de sucesso
            return redirect()->route('lotacao')
                ->with('success', 'Lotação excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a lotação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Lotação não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Lotação: ' . $e->getMessage());
        }
    }
}
