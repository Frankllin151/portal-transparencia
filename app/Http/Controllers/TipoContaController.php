<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoConta; // Certifique-se de que este caminho esteja correto para o seu modelo TipoConta
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoContaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todos os tipos de conta ordenados pela data de atualização em ordem decrescente
        $data = TipoConta::orderBy("updated_at", "desc")->get();
        // Retorna a view 'tipoconta.showAll' passando os dados
        return view("tipoconta.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'tipoconta.create'
        return view("tipoconta.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o tipo de conta
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de TipoConta no banco de dados
            TipoConta::create($validatedData);

            // Redireciona para a rota 'tipoconta' com uma mensagem de sucesso
            return redirect()->route('tipoconta')
                ->with('success', 'Tipo de Conta cadastrado com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Tipo de Conta: ' . $e->getMessage())
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
        //     $data = TipoConta::findOrFail($id);
        //     return view("tipoconta.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Tipo de Conta não encontrado.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra o tipo de conta pelo ID ou lança uma exceção ModelNotFoundException
            $data = TipoConta::findOrFail($id);
            // Retorna a view 'tipoconta.edit' passando os dados do tipo de conta
            return view("tipoconta.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se o tipo de conta não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Tipo de Conta não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra o tipo de conta pelo ID ou lança uma exceção ModelNotFoundException
            $tipoConta = TipoConta::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o tipo de conta
            ]);

            // Atualiza o registro do tipo de conta com os dados validados
            $tipoConta->update($validatedData);

            // Redireciona para a rota 'tipoconta' com uma mensagem de sucesso
            return redirect()->route('tipoconta')
                ->with('success', 'Tipo de Conta atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o tipo de conta não for encontrado, aborta com erro 404
            abort(404, "Tipo de Conta não encontrado.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro do Tipo de Conta: ' . $e->getMessage())
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
            // Encontra o tipo de conta pelo ID ou lança uma exceção ModelNotFoundException
            $data = TipoConta::findOrFail($id);
            // Exclui o registro do tipo de conta
            $data->delete();

            // Redireciona para a rota 'tipoconta' com uma mensagem de sucesso
            return redirect()->route('tipoconta')
                ->with('success', 'Tipo de Conta excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o tipo de conta não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Tipo de Conta não encontrado.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o Tipo de Conta: ' . $e->getMessage());
        }
    }
}
