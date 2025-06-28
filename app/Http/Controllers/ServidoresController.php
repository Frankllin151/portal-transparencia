<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use  App\Models\Servidore;
use App\Models\Situacaocargo;
use App\Models\Entidade;
use App\Models\ClassificacaoAfastamento;
use App\Models\Nomeorgao;
use App\Models\Lotacao;
use App\Models\Vinculoempregaticio;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    { // nome_servidor ,  vinculo_empregaticio , situacao , entidade
        // Recupera todos os servidores, ordenados pela data de criação mais recente
        $data = Servidore::orderBy("updated_at", "desc")->get();
     
        return view("servidores.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera todos os cargos para preencher um dropdown no formulário
        $cargos = Cargo::orderBy("updated_at", "desc")->get();
            $situacaoCargo = Situacaocargo::orderBy("updated_at", "desc")->get();
            $classificacaoAfastamento = ClassificacaoAfastamento::orderBy("updated_at", "desc")->get();
            $vinculoEmpregaticio = Vinculoempregaticio::orderBy("updated_at", "desc")->get();
            $Entidade = Entidade::orderBy("updated_at", "desc")->get();
            $Orgao = Nomeorgao::orderBy("updated_at", "desc")->get(); 
            $lotacao = Lotacao::orderBy("updated_at", "desc")->get(); 
        // Retorna a view 'servidores.create' passando os cargos disponíveis
        return view("servidores.create", ["cargos" => $cargos,
     "situacaoCargo" => $situacaoCargo  , 
                "classificacaoAfastamento" => $classificacaoAfastamento, 
                "vinculoEmpregaticio" => $vinculoEmpregaticio, 
                "Entidade" => $Entidade, 
                "Orgao" => $Orgao, 
                "lotacao" => $lotacao
    ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validação dos dados de entrada
            $validatedData = $request->validate([
                'entidade' => 'required|string|max:255',
                'matricula' => 'required|string|max:255|unique:servidores,matricula', // Garante matrícula única
                'cargo_id' => 'required|uuid|exists:cargos,id', // Valida que o cargo_id é um UUID e existe na tabela 'cargos'
                'nome_servidor' => 'nullable|string|max:255',
                'lotacao' => 'nullable|string|max:255',
                'orgao' => 'nullable|string|max:255',
                'vinculo_empregaticio' => 'nullable|string|max:255',
                'data_admissao' => 'required|date',
                'situacao' => 'required|string|max:255',
                'classificacao_cargo' => 'required|string|max:255',
                'classificacao_afastamento' => 'nullable|string|max:255',
                'remuneracao_contratual' => 'required|numeric|between:0,9999999999999.99', // 15,2 decimal
                'contribuicao_empregado_rgps' => 'nullable|numeric|between:0,9999999999999.99',
                'contribuicao_empregado_rat_fat' => 'nullable|numeric|between:0,9999999999999.99',
                'contribuicao_patronal_rgps' => 'nullable|numeric|between:0,9999999999999.99',
                'efetivo_em_cargo_comissionado' => 'nullable|string|max:255',
                'carga_horaria_semanal' => 'required|numeric|between:0,999.99', // 5,2 decimal
                'carga_horaria_mensal' => 'nullable|numeric|between:0,999.99',
                'organograma' => 'nullable|string|max:255',
            ]);

            // Gera um UUID para o ID do novo servidor
            $id = Str::uuid()->toString();
            $validatedData['id'] = $id;

            // Cria um novo registro de Servidore no banco de dados
            $novoServidor = Servidore::create($validatedData);

            // Redireciona para a página de exibição do novo servidor com mensagem de sucesso
            return redirect()->route('servidores.show', ['id' => $novoServidor->id])
                ->with('success', 'Servidor cadastrado com sucesso!');

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
                ->with('error', 'Ocorreu um erro ao cadastrar o servidor: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Tenta encontrar o servidor pelo ID, incluindo o relacionamento com Cargo
            $data = Servidore::with('cargo')->findOrFail($id);
            // Retorna a view 'servidores.showid' passando os dados
            
            return view("servidores.showid",  ["servidor" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Tenta encontrar o servidor pelo ID
            $data = Servidore::findOrFail($id);
            // Recupera todos os cargos para preencher um dropdown no formulário de edição
            $cargos = Cargo::orderBy("updated_at", "desc")->get();
            $situacaoCargo = Situacaocargo::orderBy("updated_at", "desc")->get();
            $classificacaoAfastamento = ClassificacaoAfastamento::orderBy("updated_at", "desc")->get();
            $vinculoEmpregaticio = Vinculoempregaticio::orderBy("updated_at", "desc")->get();
            $Entidade = Entidade::orderBy("updated_at", "desc")->get();
            $Orgao = Nomeorgao::orderBy("updated_at", "desc")->get(); 
            $lotacao = Lotacao::orderBy("updated_at", "desc")->get(); 
            // Retorna a view 'servidores.edit' passando os dados do servidor e os cargos
            return view("servidores.edit",  [
                "data" => $data,
                "cargos" => $cargos, 
                "situacaoCargo" => $situacaoCargo  , 
                "classificacaoAfastamento" => $classificacaoAfastamento, 
                "vinculoEmpregaticio" => $vinculoEmpregaticio, 
                "Entidade" => $Entidade, 
                "Orgao" => $Orgao, 
                "lotacao" => $lotacao
            ]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado para edição.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Tenta encontrar o servidor pelo ID
            $servidor = Servidore::findOrFail($id);

            // Validação dos dados de entrada para atualização
            $validatedData = $request->validate([
                'entidade' => 'required|string|max:255',
                'matricula' => 'required|string|max:255|unique:servidores,matricula,' . $id, // Garante matrícula única, exceto para o próprio servidor
                'cargo_id' => 'required|uuid|exists:cargos,id',
                'nome_servidor' => 'nullable|string|max:255',
                'lotacao' => 'nullable|string|max:255',
                'orgao' => 'nullable|string|max:255',
                'vinculo_empregaticio' => 'nullable|string|max:255',
                'data_admissao' => 'required|date',
                'situacao' => 'required|string|max:255',
                'classificacao_cargo' => 'required|string|max:255',
                'classificacao_afastamento' => 'nullable|string|max:255',
                'remuneracao_contratual' => 'required|numeric|between:0,9999999999999.99',
                'contribuicao_empregado_rgps' => 'nullable|numeric|between:0,9999999999999.99',
                'contribuicao_empregado_rat_fat' => 'nullable|numeric|between:0,9999999999999.99',
                'contribuicao_patronal_rgps' => 'nullable|numeric|between:0,9999999999999.99',
                'efetivo_em_cargo_comissionado' => 'nullable|string|max:255',
                'carga_horaria_semanal' => 'required|numeric|between:0,999.99',
                'carga_horaria_mensal' => 'nullable|numeric|between:0,999.99',
                'organograma' => 'nullable|string|max:255',
            ]);

            // Atualiza os atributos do servidor com os dados validados
            $servidor->update($validatedData);

            // Redireciona para a página de exibição do servidor atualizado com mensagem de sucesso
            return redirect()->route('servidores.show', $servidor->id)
                             ->with('success', 'Servidor atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado para atualização.');
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
                ->with('error', 'Ocorreu um erro ao atualizar o servidor: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        try {
            // Tenta encontrar o servidor pelo ID
            $data = Servidore::findOrFail($id);
            // Deleta o registro do servidor
            $data->delete();

            // Redireciona para a rota 'servidores.index' (ou a rota principal de listagem) com mensagem de sucesso
            return redirect()->route('servidores.index')
                ->with('success', 'Servidor excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado para exclusão.');
        } catch (\Exception $e) {
            // Captura outras exceções e redireciona de volta com mensagem de erro genérica
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o servidor: ' . $e->getMessage());
        }
    }
}
