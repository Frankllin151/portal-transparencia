<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoContrato; // Certifique-se de que este caminho esteja correto para o seu modelo TipoContrato
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todos os tipos de contrato ordenados pela data de atualização em ordem decrescente
        $data = TipoContrato::orderBy("updated_at", "desc")->get();
        // Retorna a view 'tipocontrato.showAll' passando os dados
        return view("tipocontrato.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'tipocontrato.create'
        return view("tipocontrato.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o tipo de contrato
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de TipoContrato no banco de dados
            TipoContrato::create($validatedData);

            // Redireciona para a rota 'tipocontrato' com uma mensagem de sucesso
            return redirect()->route('tipocontrato')
                ->with('success', 'Tipo de Contrato cadastrado com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Tipo de Contrato: ' . $e->getMessage())
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
        //     $data = TipoContrato::findOrFail($id);
        //     return view("tipocontrato.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Tipo de Contrato não encontrado.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra o tipo de contrato pelo ID ou lança uma exceção ModelNotFoundException
            $data = TipoContrato::findOrFail($id);
            // Retorna a view 'tipocontrato.edit' passando os dados do tipo de contrato
            return view("tipocontrato.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se o tipo de contrato não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Tipo de Contrato não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra o tipo de contrato pelo ID ou lança uma exceção ModelNotFoundException
            $tipoContrato = TipoContrato::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o tipo de contrato
            ]);

            // Atualiza o registro do tipo de contrato com os dados validados
            $tipoContrato->update($validatedData);

            // Redireciona para a rota 'tipocontrato' com uma mensagem de sucesso
            return redirect()->route('tipocontrato')
                ->with('success', 'Tipo de Contrato atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o tipo de contrato não for encontrado, aborta com erro 404
            abort(404, "Tipo de Contrato não encontrado.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro do Tipo de Contrato: ' . $e->getMessage())
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
            // Encontra o tipo de contrato pelo ID ou lança uma exceção ModelNotFoundException
            $data = TipoContrato::findOrFail($id);
            // Exclui o registro do tipo de contrato
            $data->delete();

            // Redireciona para a rota 'tipocontrato' com uma mensagem de sucesso
            return redirect()->route('tipocontrato')
                ->with('success', 'Tipo de Contrato excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o tipo de contrato não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Tipo de Contrato não encontrado.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o Tipo de Contrato: ' . $e->getMessage());
        }
    }
}
