<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use  App\Models\Servidore;
use App\Models\Situacaocargo;
use App\Models\Entidade;
use App\Models\ClassificacaoAfastamento;
use App\Models\Classificacaocargo;
use App\Models\Nomeorgao;
use App\Models\Lotacao;
use App\Models\TipoMatricula;
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
        $data = Servidore::with('cargo')
    ->orderBy('updated_at', 'desc')
    ->get();
     
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
            $Tipomatricula = TipoMatricula::orderBy("updated_at", "desc")->get();
            $Orgao = Nomeorgao::orderBy("updated_at", "desc")->get(); 
            $lotacao = Lotacao::orderBy("updated_at", "desc")->get(); 
            $cargoClassisficacao = Classificacaocargo::orderBy("updated_at", "desc")->get(); 
        // Retorna a view 'servidores.create' passando os cargos disponíveis
        return view("servidores.create", ["cargos" => $cargos,
     "situacaoCargo" => $situacaoCargo  , 
                "classificacaoAfastamento" => $classificacaoAfastamento, 
                "vinculoEmpregaticio" => $vinculoEmpregaticio, 
                "Entidade" => $Entidade, 
                "Orgao" => $Orgao, 
                "lotacao" => $lotacao, 
                "cargoClassisficacao" => $cargoClassisficacao , 
                "matricula" =>  $Tipomatricula
    ]);
    }
    
  private function sanitizeDecimal(?string $value): ?float
{
    if (is_null($value)) return null;
    return (float) str_replace(',', '.', str_replace('.', '', $value));
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
            'matricula' => 'required|string|max:255',
            'cargo_id' => 'required|uuid|exists:cargos,id',
            'nome_servidor' => 'nullable|string|max:255',
            'lotacao' => 'nullable|string|max:255',
            'orgao' => 'nullable|string|max:255',
            'vinculo_empregaticio' => 'nullable|string|max:255',
            'data_admissao' => 'required|date',
            'situacao' => 'required|string|max:255',
            'classificacao_cargo' => 'required|string|max:255',
            'classificacao_afastamento' => 'nullable|string|max:255',
            'remuneracao_contratual' => 'required',
            'contribuicao_empregado_rgps' => 'nullable',
            'contribuicao_empregado_rat_fat' => 'nullable',
            'contribuicao_patronal_rgps' => 'nullable',
            'efetivo_em_cargo_comissionado' => 'nullable|string|max:255',
            'carga_horaria_semanal' => 'required',
            'carga_horaria_mensal' => 'nullable',
            'organograma' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        // Converte campos monetários e numéricos do formato BR para decimal
        $validatedData['remuneracao_contratual'] = $this->sanitizeDecimal($request->remuneracao_contratual);
        $validatedData['contribuicao_empregado_rgps'] = $this->sanitizeDecimal($request->contribuicao_empregado_rgps);
        $validatedData['contribuicao_empregado_rat_fat'] = $this->sanitizeDecimal($request->contribuicao_empregado_rat_fat);
        $validatedData['contribuicao_patronal_rgps'] = $this->sanitizeDecimal($request->contribuicao_patronal_rgps);
        $validatedData['carga_horaria_semanal'] = $this->sanitizeDecimal($request->carga_horaria_semanal);
        $validatedData['carga_horaria_mensal'] = $this->sanitizeDecimal($request->carga_horaria_mensal);

        // Gera um UUID para o ID do novo servidor
        $id = Str::uuid()->toString();
        $validatedData['id'] = $id;

        // Cria um novo registro de Servidore no banco de dados
        $novoServidor = Servidore::create($validatedData);

        return redirect()->route('servidores.show', ['id' => $novoServidor->id])
            ->with('success', 'Servidor cadastrado com sucesso!');

    } catch (ValidationException $e) {
        dd($e->errors()); // Debug
       /* return redirect()->back()
            ->withErrors($e->errors())
            ->withInput()
            ->with('error', 'Erros nos inputs: Por favor, verifique os dados preenchidos.');*/
    } catch (\Exception $e) {
dd($e->getMessage());
       
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
             $Tipomatricula = TipoMatricula::orderBy("updated_at", "desc")->get();
             $cargoClassisficacao = Classificacaocargo::orderBy("updated_at", "desc")->get();
            // Retorna a view 'servidores.edit' passando os dados do servidor e os cargos
            return view("servidores.edit",  [
                "data" => $data,
                "cargos" => $cargos, 
                "situacaoCargo" => $situacaoCargo  , 
                "classificacaoAfastamento" => $classificacaoAfastamento, 
                "vinculoEmpregaticio" => $vinculoEmpregaticio, 
                "Entidade" => $Entidade, 
                "Orgao" => $Orgao, 
                "lotacao" => $lotacao, 
                "cargoClassisficacao" => $cargoClassisficacao, 
                "matricula" => $Tipomatricula 
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

              $request->merge([
            'remuneracao_contratual' => $this->sanitizeDecimal($request->remuneracao_contratual),
            'contribuicao_empregado_rgps' => $this->sanitizeDecimal($request->contribuicao_empregado_rgps),
            'contribuicao_empregado_rat_fat' => $this->sanitizeDecimal($request->contribuicao_empregado_rat_fat),
            'contribuicao_patronal_rgps' => $this->sanitizeDecimal($request->contribuicao_patronal_rgps),
            'carga_horaria_semanal' => $this->sanitizeDecimal($request->carga_horaria_semanal),
            'carga_horaria_mensal' => $this->sanitizeDecimal($request->carga_horaria_mensal),
        ]);

            
            // Validação dos dados de entrada para atualização
            $validatedData = $request->validate([
                'entidade' => 'required|string|max:255',
                'matricula' => 'required|string|max:255', // Garante matrícula única, exceto para o próprio servidor
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
                "cpf" => 'nullable|string|max:255',
                'observacoes' => 'nullable|string',
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
