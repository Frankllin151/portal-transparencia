<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vinculoempregaticio; // Certifique-se de que este caminho esteja correto para o seu modelo Vinculoempregaticio
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class VinculoEmpregaticioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma listagem do recurso.
     */
    public function index()
    {
        // Obtém todos os vínculos empregatícios ordenados pela data de atualização em ordem decrescente
        $data = Vinculoempregaticio::orderBy("updated_at", "desc")->get();
        // Retorna a view 'vinculoempregaticio.showAll' passando os dados
        return view("vinculoempregaticio.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Retorna a view 'vinculoempregaticio.create'
        return view("vinculoempregaticio.create");
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
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o vínculo empregatício
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Vinculoempregaticio no banco de dados
            Vinculoempregaticio::create($validatedData);

            // Redireciona para a rota 'vinculoempregaticio' com uma mensagem de sucesso
            return redirect()->route('vinculoempregaticio')
                ->with('success', 'Vínculo Empregatício cadastrado com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs)
            return redirect()->back()
                ->with('error', 'Erros nos inputs: ' . implode(', ', $e->errors())) // Mostra os erros de validação
                ->withInput(); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o Vínculo Empregatício: ' . $e->getMessage())
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
        //     $data = Vinculoempregaticio::findOrFail($id);
        //     return view("vinculoempregaticio.show", ["data" => $data]);
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Vínculo Empregatício não encontrado.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        try {
            // Encontra o vínculo empregatício pelo ID ou lança uma exceção ModelNotFoundException
            $data = Vinculoempregaticio::findOrFail($id);
            // Retorna a view 'vinculoempregaticio.edit' passando os dados do vínculo empregatício
            return view("vinculoempregaticio.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se o vínculo empregatício não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Vínculo Empregatício não encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra o vínculo empregatício pelo ID ou lança uma exceção ModelNotFoundException
            $vinculoEmpregaticio = Vinculoempregaticio::findOrFail($id);

            // Valida os dados da requisição para atualização
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255', // Supondo que 'nome' seja o campo para o vínculo empregatício
            ]);

            // Atualiza o registro do vínculo empregatício com os dados validados
            $vinculoEmpregaticio->update($validatedData);

            // Redireciona para a rota 'vinculoempregaticio' com uma mensagem de sucesso
            return redirect()->route('vinculoempregaticio')
                ->with('success', 'Vínculo Empregatício atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o vínculo empregatício não for encontrado, aborta com erro 404
            abort(404, "Vínculo Empregatício não encontrado.");

        } catch (ValidationException $e) {
            // Captura exceções de validação e redireciona de volta com os erros
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro do Vínculo Empregatício: ' . $e->getMessage())
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
            // Encontra o vínculo empregatício pelo ID ou lança uma exceção ModelNotFoundException
            $data = Vinculoempregaticio::findOrFail($id);
            // Exclui o registro do vínculo empregatício
            $data->delete();

            // Redireciona para a rota 'vinculoempregaticio' com uma mensagem de sucesso
            return redirect()->route('vinculoempregaticio')
                ->with('success', 'Vínculo Empregatício excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se o vínculo empregatício não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Vínculo Empregatício não encontrado.');
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o Vínculo Empregatício: ' . $e->getMessage());
        }
    }
}
