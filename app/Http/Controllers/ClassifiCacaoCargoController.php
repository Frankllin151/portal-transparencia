<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classificacaocargo; // Certifique-se de que este caminho esteja correto para o seu modelo ClassificacaoCargo
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClassificacaoCargoController extends Controller // Corrigido o nome do controller para ClassificacaoCargoController
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as classificações de cargo ordenadas pela data de atualização em ordem decrescente
        $data = ClassificacaoCargo::orderBy("updated_at", "desc")->get();
        // Retorna a view 'classificacaocargo.showAll' passando os dados
        return view("classificacaocargo.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'classificacaocargo.create'
        return view("classificacaocargo.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a classificação de cargo
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de ClassificacaoCargo no banco de dados
            ClassificacaoCargo::create($validatedData);

            // Redireciona para a rota 'classificacaocargo' com uma mensagem de sucesso
            return redirect()->route('classificacaocargo')
                ->with('success', 'Classificação de Cargo cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Classificação de Cargo: ' . $e->getMessage())
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
        //     $data = ClassificacaoCargo::findOrFail($id);
        //     return view("classificacaocargo.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Classificação de Cargo não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a classificação de cargo pelo ID ou lança uma exceção ModelNotFoundException
            $data = ClassificacaoCargo::findOrFail($id);
            // Retorna a view 'classificacaocargo.edit' passando os dados da classificação de cargo
            return view("classificacaocargo.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a classificação de cargo não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Classificação de Cargo não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a classificação de cargo pelo ID ou lança uma exceção ModelNotFoundException
            $classificacaoCargo = ClassificacaoCargo::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a classificação de cargo
            ]);

            // Atualiza o registro da classificação de cargo com os dados validados
            $classificacaoCargo->update($validatedData);

            // Redireciona para a rota 'classificacaocargo' com uma mensagem de sucesso
            return redirect()->route('classificacaocargo')
                ->with('success', 'Classificação de Cargo atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a classificação de cargo não for encontrada, aborta com erro 404
            abort(404, "Classificação de Cargo não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Classificação de Cargo: ' . $e->getMessage())
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
            // Encontra a classificação de cargo pelo ID ou lança uma exceção ModelNotFoundException
            $data = ClassificacaoCargo::findOrFail($id);
            // Exclui o registro da classificação de cargo
            $data->delete();

            // Redireciona para a rota 'classificacaocargo' com uma mensagem de sucesso
            return redirect()->route('classificacaocargo')
                ->with('success', 'Classificação de Cargo excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a classificação de cargo não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Classificação de Cargo não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Classificação de Cargo: ' . $e->getMessage());
        }
    }
}
