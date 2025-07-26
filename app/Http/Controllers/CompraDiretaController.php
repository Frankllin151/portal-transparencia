<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompraDireta;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompraDiretaController extends Controller
{
    /**
     * Exibe uma listagem do recurso.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtém todas as compras diretas, ordenadas pela data de atualização mais recente
        $data = CompraDireta::orderBy("updated_at", "desc")->get();

        // Retorna a view com os dados das compras diretas
        return view("ComprasDiretas.showAll", ["data" => $data]);
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retorna a view para o formulário de criação de compra direta
        // Se houver dados adicionais necessários para o formulário (ex: listas de opções), adicione aqui.
        return view("ComprasDiretas.create");
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      
        try {

             $valorRs = $request->input('valor_rs');
              $valorRs = str_replace(['R$', '.', ' ', "\u{A0}"], '', $valorRs);
            $valorRs = str_replace(',', '.', $valorRs);

             $request->merge([
                'valor_rs' => $valorRs,
               
            ]);
            // Valida os dados da requisição com base nos atributos fillable do modelo CompraDireta
            $validatedData = $request->validate([
                'codigo' => [
                    'required',
                    'string',
                    'max:255',
                    // Garante que o código seja único na tabela 'comprasdiretas'
                    Rule::unique('comprasdiretas', 'codigo'),
                ],
                'centro_de_custos' => 'required|string|max:255',
                'data_da_compra' => 'required|date',
                'objeto' => 'required|string|max:255',
                'fornecedor' => 'required|string|max:255',
                'cnpj_cpf_fornecedor' => 'required|string|max:255',
                'fundamentacao' => 'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'valor_rs' => 'required|numeric|min:0', // Valor monetário deve ser numérico e não negativo
            ]);

            // Gera um UUID para o ID antes de criar o registro
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id;

            // Cria uma nova compra direta no banco de dados
            $compraDireta = CompraDireta::create($validatedData);

            // Redireciona para a página de detalhes da compra direta com uma mensagem de sucesso
            return redirect()->route('comprasdiretas.show', $compraDireta->id)
                             ->with('success', 'Compra direta adicionada com sucesso!');

        } catch (ValidationException $e) {
            // Se a validação falhar, redireciona de volta com os erros e os dados antigos
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona com uma mensagem de erro genérica
            return redirect()->back()->with('error', 'Ocorreu um erro ao adicionar a compra direta: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id)
    {
        try {
            // Encontra a compra direta pelo ID ou lança uma exceção
            $data = CompraDireta::findOrFail($id);

            // Retorna a view com os detalhes da compra direta
            return view("ComprasDiretas.showid", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a compra direta não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Compra Direta não encontrada.');
        }
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(string $id)
    {
        try {
            // Encontra a compra direta pelo ID ou lança uma exceção
            $data = CompraDireta::findOrFail($id);

            // Retorna a view para o formulário de edição de compra direta com os dados existentes
            return view("ComprasDiretas.edit", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Se a compra direta não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                ->with('error', 'Compra Direta não encontrada para edição.');
        }
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        try {
            // Encontra a compra direta pelo ID ou lança uma exceção
            $data = CompraDireta::findOrFail($id);
 $valorRs = $request->input('valor_rs');
              $valorRs = str_replace(['R$', '.', ' ', "\u{A0}"], '', $valorRs);
            $valorRs = str_replace(',', '.', $valorRs);

             $request->merge([
                'valor_rs' => $valorRs,
               
            ]);
            // Valida os dados da requisição, ignorando o código atual para garantir a unicidade durante a edição
            $validatedData = $request->validate([
                'codigo' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('comprasdiretas', 'codigo')->ignore($id),
                ],
                'centro_de_custos' => 'required|string|max:255',
                'data_da_compra' => 'required|date',
                'objeto' => 'required|string|max:255',
                'fornecedor' => 'required|string|max:255',
                'cnpj_cpf_fornecedor' => 'required|string|max:255',
                'fundamentacao' => 'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'valor_rs' => 'required|numeric|min:0',
            ]);

            // Atualiza os dados da compra direta
            $data->update($validatedData);

            // Redireciona para a página de detalhes da compra direta com uma mensagem de sucesso
            return redirect()->route('comprasdiretas.show', $data->id)->with('success', 'Compra direta atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a compra direta não for encontrada, retorna um erro 404
            abort(404, "Compra Direta não encontrada para atualização.");
        } catch (ValidationException $e) {
            // Se a validação falhar, redireciona de volta com os erros e os dados antigos
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona com uma mensagem de erro genérica
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a compra direta: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        try {
            // Encontra a compra direta pelo ID ou lança uma exceção
            $compraDireta = CompraDireta::findOrFail($id);

            // Exclui a compra direta do banco de dados
            $compraDireta->delete();

            // Redireciona para a rota de listagem de compras diretas com uma mensagem de sucesso
            return redirect()->route('comprasdiretas')
                             ->with('success', 'Compra direta excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a compra direta não for encontrada, redireciona de volta com uma mensagem de erro
            return redirect()->back()
                             ->with('error', 'Compra Direta não encontrada para exclusão.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona com uma mensagem de erro genérica
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir a compra direta: ' . $e->getMessage());
        }
    }
}
