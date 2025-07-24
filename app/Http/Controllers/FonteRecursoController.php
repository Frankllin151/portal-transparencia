<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fonterecurso; // Certifique-se de que este caminho esteja correto para o seu modelo Fonterecurso
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FonteRecursoController extends Controller // Corrigido o nome do controller para FonteRecursoController
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as fontes de recurso ordenadas pela data de atualização em ordem decrescente
        $data = Fonterecurso::orderBy("updated_at", "desc")->get();
        // Retorna a view 'fonterecurso.showAll' passando os dados
        return view("fonterecurso.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'fonterecurso.create'
        return view("fonterecurso.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a fonte de recurso
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Fonterecurso no banco de dados
            Fonterecurso::create($validatedData);

            // Redireciona para a rota 'fonterecurso' com uma mensagem de sucesso
            return redirect()->route('fonterecurso')
                ->with('success', 'Fonte de Recurso cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Fonte de Recurso: ' . $e->getMessage())
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
        //     $data = Fonterecurso::findOrFail($id);
        //     return view("fonterecurso.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Fonte de Recurso não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a fonte de recurso pelo ID ou lança uma exceção ModelNotFoundException
            $data = Fonterecurso::findOrFail($id);
            // Retorna a view 'fonterecurso.edit' passando os dados da fonte de recurso
            return view("fonterecurso.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a fonte de recurso não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Fonte de Recurso não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a fonte de recurso pelo ID ou lança uma exceção ModelNotFoundException
            $fonteRecurso = Fonterecurso::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a fonte de recurso
            ]);

            // Atualiza o registro da fonte de recurso com os dados validados
            $fonteRecurso->update($validatedData);

            // Redireciona para a rota 'fonterecurso' com uma mensagem de sucesso
            return redirect()->route('fonterecurso')
                ->with('success', 'Fonte de Recurso atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a fonte de recurso não for encontrada, aborta com erro 404
            abort(404, "Fonte de Recurso não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Fonte de Recurso: ' . $e->getMessage())
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
            // Encontra a fonte de recurso pelo ID ou lança uma exceção ModelNotFoundException
            $data = Fonterecurso::findOrFail($id);
            // Exclui o registro da fonte de recurso
            $data->delete();

            // Redireciona para a rota 'fonterecurso' com uma mensagem de sucesso
            return redirect()->route('fonterecurso')
                ->with('success', 'Fonte de Recurso excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a fonte de recurso não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Fonte de Recurso não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Fonte de Recurso: ' . $e->getMessage());
        }
    }
}
