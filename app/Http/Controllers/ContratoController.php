<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Entidade; 
use App\Models\ModalidadeLicitacao;
use App\Models\TipoContrato;
use App\Models\Situacaocargo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContratoController extends Controller
{
    /**
     * Exibe uma lista de todos os contratos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todos os contratos, ordenados pela data de criação mais recente
        $data = Contrato::orderBy("created_at", "desc")->get();
        // Retorna a view 'contratos.showAll' passando os dados
   
        return view("contratos.showAll", ["data" => $data]);
    }

    /**
     * Exibe o formulário para criar um novo contrato.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       $Entidade = Entidade::orderBy("created_at", "desc")->get();
       $ModalidadeLicitacao =  ModalidadeLicitacao::orderBy("created_at", "desc")->get();
       $TipoContrato = TipoContrato::orderBy("created_at", "desc")->get();
       $SituacaoCargo = Situacaocargo::orderBy("created_at", "desc")->get();
        // Retorna a view 'contratos.create'.
        return view("contratos.create", [
            "Entidade"=> $Entidade,
            "ModalidadeLicitacao"  => $ModalidadeLicitacao,
            "TipoContrato" => $TipoContrato, 
            "SituacaoCargo"  => $SituacaoCargo
        ]
    );
    }

    /**
     * Armazena um novo contrato no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Validação dos dados de entrada baseada na sua migration 'contratos'
            $validatedData = $request->validate([
                'entidade' => 'required|string|max:255',
                'data_assinatura' => 'required|date',
                'numero_contrato' => 'required|string|max:255|unique:contratos,numero_contrato', // Garante número de contrato único
                'numero_processo' => 'required|integer',
                'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Ano válido, até o próximo ano
                'modalidade_licitacao' => 'required|string|max:255',
                'tipo_contrato' => 'required|string|max:255',
                'contratado' => 'required|string|max:255',
                'data_vigencia_inicial' => 'required|date',
                'data_vigencia_final' => 'required|date|after_or_equal:data_vigencia_inicial', // Vigência final deve ser igual ou depois da inicial
                'situacao' => 'required|string|max:255',
                'valor_inicial' => 'required|numeric|between:0,9999999999999.99', // Formato decimal (15,2)
                'valor_final' => 'required|numeric|between:0,9999999999999.99|gte:valor_inicial', // Formato decimal (15,2) e maior ou igual ao valor inicial
                'competencia' => 'required|string|max:255',
                'instrumento_contrato' => 'required|string|max:255',
                'codigo_fornecedor' => 'required|string|max:255',
                'codigo_processo' => 'required|string|max:255',
                'numero_licitacao' => 'required|integer',
                'subcontratacao' => 'required|string|max:255',
            ]);
            
            // Gera um UUID para o ID do novo contrato
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id;

            // Cria um novo registro de Contrato no banco de dados
            $novoContrato = Contrato::create($validatedData);

            // Redireciona para a página de exibição do novo contrato com mensagem de sucesso
            return redirect()->route('contratos.show', ['id' => $novoContrato->id])
                ->with('success', 'Contrato cadastrado com sucesso!');

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
                ->with('error', 'Ocorreu um erro ao cadastrar o contrato: ' . $e->getMessage());
        }
    }

    /**
     * Exibe os detalhes de um contrato específico.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id)
    {
        try {
            // Tenta encontrar o contrato pelo ID
            $data = Contrato::findOrFail($id);
            // Retorna a view 'contratos.showid' passando os dados
            
            return view("contratos.showid",  
            ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Contrato não encontrado.');
        }
    }

    /**
     * Exibe o formulário para editar um contrato existente.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(string $id)
    {
        try {
            // Tenta encontrar o contrato pelo ID
            $data = Contrato::findOrFail($id);
            // Retorna a view 'contratos.edit' passando os dados do contrato
            $Entidade = Entidade::orderBy("created_at", "desc")->get();
       $ModalidadeLicitacao =  ModalidadeLicitacao::orderBy("created_at", "desc")->get();
       $TipoContrato = TipoContrato::orderBy("created_at", "desc")->get();
       $SituacaoCargo = Situacaocargo::orderBy("created_at", "desc")->get();
            return view("contratos.edit",  ["data" => $data, 
        "Entidade"=> $Entidade,
            "ModalidadeLicitacao"  => $ModalidadeLicitacao,
            "TipoContrato" => $TipoContrato, 
            "SituacaoCargo"  => $SituacaoCargo
        ]);
        } catch (ModelNotFoundException $e) {
            // Caso o contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Contrato não encontrado para edição.');
        }
    }

    /**
     * Atualiza um contrato existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        try {
            // Tenta encontrar o contrato pelo ID
            $contrato = Contrato::findOrFail($id);

            // Validação dos dados de entrada para atualização
            $validatedData = $request->validate([
                'entidade' => 'required|string|max:255',
                'data_assinatura' => 'required|date',
                'numero_contrato' => 'required|string|max:255|unique:contratos,numero_contrato,' . $id, // Garante número de contrato único, exceto para o próprio contrato
                'numero_processo' => 'required|integer',
                'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
                'modalidade_licitacao' => 'required|string|max:255',
                'tipo_contrato' => 'required|string|max:255',
                'contratado' => 'required|string|max:255',
                'data_vigencia_inicial' => 'required|date',
                'data_vigencia_final' => 'required|date|after_or_equal:data_vigencia_inicial',
                'situacao' => 'required|string|max:255',
                'valor_inicial' => 'required|numeric|between:0,9999999999999.99',
                'valor_final' => 'required|numeric|between:0,9999999999999.99|gte:valor_inicial',
                'competencia' => 'required|string|max:255',
                'instrumento_contrato' => 'required|string|max:255',
                'codigo_fornecedor' => 'required|string|max:255',
                'codigo_processo' => 'required|string|max:255',
                'numero_licitacao' => 'required|integer',
                'subcontratacao' => 'required|string|max:255',
            ]);

            // Atualiza os atributos do contrato com os dados validados
            $contrato->update($validatedData);

            // Redireciona para a página de exibição do contrato atualizado com mensagem de sucesso
            return redirect()->route('contratos.show', $contrato->id)
                             ->with('success', 'Contrato atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Contrato não encontrado para atualização.');
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
                ->with('error', 'Ocorreu um erro ao atualizar o contrato: ' . $e->getMessage());
        }
    }

    /**
     * Remove um contrato do banco de dados.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        try {
            // Tenta encontrar o contrato pelo ID
            $data = Contrato::findOrFail($id);
            // Deleta o registro do contrato
            $data->delete();

            // Redireciona para a rota 'contratos.index' (ou a rota principal de listagem) com mensagem de sucesso
            return redirect()->route('contratos.index')
                ->with('success', 'Contrato excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o contrato não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Contrato não encontrado para exclusão.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona de volta com mensagem de erro genérica
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o contrato: ' . $e->getMessage());
        }
    }
}
