<?php

namespace App\Http\Controllers;

use App\Models\ContratosItem;
use App\Models\Contrato;
use App\Models\Unidade;    
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContratoItemController extends Controller
{
    /**
     * Exibe uma lista de todos os itens de contrato.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todos os itens de contrato, ordenados pela data de criação mais recente,
        // e carrega o relacionamento com o contrato ao qual pertencem.
        $data = ContratosItem::with('contrato')->orderBy("updated_at", "desc")->get();
        // Retorna a view 'contratos_item.showAll' passando os dados
        return view("contratos_item.showAll", ["data" => $data]);
    }

    /**
     * Exibe o formulário para criar um novo item de contrato.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Recupera todos os contratos para permitir a seleção do contrato pai no formulário
        $contratos = Contrato::orderBy("updated_at", "desc")->get();
         $Unidade = Unidade::orderBy("updated_at", "desc")->get();
        // Retorna a view 'contratos_item.create' passando os contratos disponíveis
        return  view("contratos_item.create", ["contratos" => $contratos ,  "Unidade" => $Unidade]);
    }

    /**
     * Armazena um novo item de contrato no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Validação dos dados de entrada baseada na sua migration 'contratos_item'
            $validatedData = $request->validate([
                'codigo_item_contrato' => 'required|integer|min:1',
                'descricao_item_contrato' => 'required|string|max:255',
                'unidade_medida' => 'required|string|max:255',
                'quantidade' => 'required|integer|min:0',
                'valor_unitario' => 'required|numeric|between:0,9999999999999.99', // Formato decimal (15,2)
                'valor_total' => 'required|numeric|between:0,9999999999999.99', // Formato decimal (15,2)
                'contrato_id' => 'required|uuid|exists:contratos,id', // Valida que é um UUID e existe na tabela 'contratos'
            ]);

            // Gera um UUID para o ID do novo item de contrato
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id;

            // Cria um novo registro de ContratosItem no banco de dados
            $novoContratoItem = ContratosItem::create($validatedData);

            // Redireciona para a página de exibição do novo item de contrato com mensagem de sucesso
            return redirect()->route('contratos_item.show', ['id' => $novoContratoItem->id])
                ->with('success', 'Item de contrato cadastrado com sucesso!');

        } catch (ValidationException $e) {
            // Captura erros de validação e redireciona de volta com os erros e inputs antigos
            return redirect()->back()
                ->withErrors($e->errors()) // Retorna os erros de validação
                ->withInput()
                ->with('error', 'Erros nos inputs: Por favor, verifique os dados preenchidos.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona de volta com mensagem de erro genérica
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao cadastrar o item de contrato: ' . $e->getMessage());
        }
    }

    /**
     * Exibe os detalhes de um item de contrato específico.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id)
    {
        try {
            // Tenta encontrar o item de contrato pelo ID, incluindo o relacionamento com Contrato
            $data = ContratosItem::with('contrato')->findOrFail($id);
            // Retorna a view 'contratos_item.showid' passando os dados
            return view("contratos_item.showid",  ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o item de contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Item de contrato não encontrado.');
        }
    }

    /**
     * Exibe o formulário para editar um item de contrato existente.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(string $id)
    {
        try {
            // Tenta encontrar o item de contrato pelo ID
            $data = ContratosItem::findOrFail($id);
            // Recupera todos os contratos para permitir a alteração do contrato pai no formulário de edição
            $contratos = Contrato::orderBy("updated_at", "desc")->get();
            $Unidade = Unidade::orderBy("updated_at", "desc")->get();
            // Retorna a view 'contratos_item.edit' passando os dados do item e os contratos
            return view("contratos_item.edit",  [
                "data" => $data,
                "contratos" => $contratos , 
                "Unidade" => $Unidade
            ]);
        } catch (ModelNotFoundException $e) {
            // Caso o item de contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Item de contrato não encontrado para edição.');
        }
    }

    /**
     * Atualiza um item de contrato existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        try {
            // Tenta encontrar o item de contrato pelo ID
            $itemContrato = ContratosItem::findOrFail($id);

            // Validação dos dados de entrada para atualização
            $validatedData = $request->validate([
                'codigo_item_contrato' => 'required|integer|min:1',
                'descricao_item_contrato' => 'required|string|max:255',
                'unidade_medida' => 'required|string|max:255',
                'quantidade' => 'required|integer|min:0',
                'valor_unitario' => 'required|numeric|between:0,9999999999999.99',
                'valor_total' => 'required|numeric|between:0,9999999999999.99',
                'contrato_id' => 'required|uuid|exists:contratos,id',
            ]);

            // Atualiza os atributos do item de contrato com os dados validados
            $itemContrato->update($validatedData);

            // Redireciona para a página de exibição do item de contrato atualizado com mensagem de sucesso
            return redirect()->route('contratos_item.show', $itemContrato->id)
                             ->with('success', 'Item de contrato atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o item de contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Item de contrato não encontrado para atualização.');
        } catch (ValidationException $e) {
            // Captura erros de validação e redireciona de volta com os erros e inputs antigos
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Erros nos inputs: Por favor, verifique os dados preenchidos.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona de volta com mensagem de erro genérica
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao atualizar o item de contrato: ' . $e->getMessage());
        }
    }

    /**
     * Remove um item de contrato do banco de dados.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        try {
            // Tenta encontrar o item de contrato pelo ID
            $data = ContratosItem::findOrFail($id);
            // Deleta o registro do item de contrato
            $data->delete();

            // Redireciona para a rota 'contratos_item.index' com mensagem de sucesso
            return redirect()->route('contratos_item.index')
                ->with('success', 'Item de contrato excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o item de contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Item de contrato não encontrado para exclusão.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona de volta com mensagem de erro genérica
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o item de contrato: ' . $e->getMessage());
        }
    }
}
