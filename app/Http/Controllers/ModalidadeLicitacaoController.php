<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalidadeLicitacao; // Certifique-se de que este caminho esteja correto para o seu modelo ModalidadeLicitacao
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModalidadeLicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as modalidades de licitação ordenadas pela data de atualização em ordem decrescente
        $data = ModalidadeLicitacao::orderBy("updated_at", "desc")->get();
        // Retorna a view 'modalidadelicitacao.showAll' passando os dados
        return view("modalidadelicitacao.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'modalidadelicitacao.create'
        return view("modalidadelicitacao.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a modalidade de licitação
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de ModalidadeLicitacao no banco de dados
            ModalidadeLicitacao::create($validatedData);

            // Redireciona para a rota 'modalidadelicitacao' com uma mensagem de sucesso
            return redirect()->route('modalidadelicitacao')
                ->with('success', 'Modalidade de Licitação cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Modalidade de Licitação: ' . $e->getMessage())
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
        //     $data = ModalidadeLicitacao::findOrFail($id);
        //     return view("modalidadelicitacao.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Modalidade de Licitação não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a modalidade de licitação pelo ID ou lança uma exceção ModelNotFoundException
            $data = ModalidadeLicitacao::findOrFail($id);
            // Retorna a view 'modalidadelicitacao.edit' passando os dados da modalidade de licitação
            return view("modalidadelicitacao.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a modalidade de licitação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Modalidade de Licitação não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a modalidade de licitação pelo ID ou lança uma exceção ModelNotFoundException
            $modalidadeLicitacao = ModalidadeLicitacao::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a modalidade de licitação
            ]);

            // Atualiza o registro da modalidade de licitação com os dados validados
            $modalidadeLicitacao->update($validatedData);

            // Redireciona para a rota 'modalidadelicitacao' com uma mensagem de sucesso
            return redirect()->route('modalidadelicitacao')
                ->with('success', 'Modalidade de Licitação atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a modalidade de licitação não for encontrada, aborta com erro 404
            abort(404, "Modalidade de Licitação não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Modalidade de Licitação: ' . $e->getMessage())
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
            // Encontra a modalidade de licitação pelo ID ou lança uma exceção ModelNotFoundException
            $data = ModalidadeLicitacao::findOrFail($id);
            // Exclui o registro da modalidade de licitação
            $data->delete();

            // Redireciona para a rota 'modalidadelicitacao' com uma mensagem de sucesso
            return redirect()->route('modalidadelicitacao')
                ->with('success', 'Modalidade de Licitação excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a modalidade de licitação não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Modalidade de Licitação não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Modalidade de Licitação: ' . $e->getMessage());
        }
    }
}
