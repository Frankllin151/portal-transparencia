<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formaingresso; // Certifique-se de que este caminho esteja correto para o seu modelo FormaIngresso
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FormaIngressoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todas as formas de ingresso ordenadas pela data de atualização em ordem decrescente
        $data = Formaingresso::orderBy("updated_at", "desc")->get();
        // Retorna a view 'formaingresso.showAll' passando os dados
        return view("formaingresso.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'formaingresso.create'
        return view("formaingresso.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a forma de ingresso
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de FormaIngresso no banco de dados
            Formaingresso::create($validatedData);

            // Redireciona para a rota 'formaingresso' com uma mensagem de sucesso
            return redirect()->route('formaingresso')
                ->with('success', 'Forma de Ingresso cadastrada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Forma de Ingresso: ' . $e->getMessage())
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
        //     $data = FormaIngresso::findOrFail($id);
        //     return view("formaingresso.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Forma de Ingresso não encontrada.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra a forma de ingresso pelo ID ou lança uma exceção ModelNotFoundException
            $data = Formaingresso::findOrFail($id);
            // Retorna a view 'formaingresso.edit' passando os dados da forma de ingresso
            return view("formaingresso.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a forma de ingresso não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Forma de Ingresso não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a forma de ingresso pelo ID ou lança uma exceção ModelNotFoundException
            $formaIngresso = Formaingresso::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para a forma de ingresso
            ]);

            // Atualiza o registro da forma de ingresso com os dados validados
            $formaIngresso->update($validatedData);

            // Redireciona para a rota 'formaingresso' com uma mensagem de sucesso
            return redirect()->route('formaingresso')
                ->with('success', 'Forma de Ingresso atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a forma de ingresso não for encontrada, aborta com erro 404
            abort(404, "Forma de Ingresso não encontrada.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Forma de Ingresso: ' . $e->getMessage())
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
            // Encontra a forma de ingresso pelo ID ou lança uma exceção ModelNotFoundException
            $data = Formaingresso::findOrFail($id);
            // Exclui o registro da forma de ingresso
            $data->delete();

            // Redireciona para a rota 'formaingresso' com uma mensagem de sucesso
            return redirect()->route('formaingresso')
                ->with('success', 'Forma de Ingresso excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a forma de ingresso não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Forma de Ingresso não encontrada.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Forma de Ingresso: ' . $e->getMessage());
        }
    }
}
