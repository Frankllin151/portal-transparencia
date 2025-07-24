<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Entidade;
use App\Models\TipoPoder;
use App\Models\Tipoacao;
use App\Models\Tiporecurso;
use App\Models\Nomeorgao;
use App\Models\Nomecredor;
use App\Models\Naturezajuridica;
use App\Models\Unidade;
use App\Models\TipoEmpenho;
use App\Models\CategoriaEmpenho;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Despesa::orderBy("id" , "desc")->get();
        return view("despesas.despesa" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataTipoPoder = TipoPoder::orderBy("updated_at", "desc")->get();
        $dataEntidade = Entidade::orderBy("updated_at", "desc")->get();
        $dataUnidade = Unidade::orderBy("updated_at", "desc")->get();
        $dataTipoEmpenho = TipoEmpenho::orderBy("updated_at", "desc")->get();
        $dataCategoriaEmpenho = CategoriaEmpenho::orderBy("updated_at", "desc")->get();
        $dataTipoacao = Tipoacao::orderBy("updated_at", "desc")->get();
        $dataTiporecurso = Tiporecurso::orderBy("updated_at", "desc")->get();
        $dataNomeorgao = Nomeorgao::orderBy("updated_at", "desc")->get();
        $dataNomecredor = Nomecredor::orderBy("updated_at", "desc")->get();
        $dataNaturezajuridica = Naturezajuridica::orderBy("updated_at", "desc")->get();
        return view("despesas.create", [
        "dataTipoPoder" =>  $dataTipoPoder,
        "dataEntidade" => $dataEntidade,
        "dataUnidade"  => $dataUnidade, 
        "dataTipoEmpenho" => $dataTipoEmpenho, 
        "dataCategoriaEmpenho" => $dataCategoriaEmpenho,
         'dataTipoacao' => $dataTipoacao,
            'dataTiporecurso' => $dataTiporecurso,
            'dataNomeorgao' => $dataNomeorgao,
            'dataNomecredor' => $dataNomecredor,
            'dataNaturezajuridica' => $dataNaturezajuridica
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        try {
            // Valida os dados da requisição.
            // Se a validação falhar, o Laravel automaticamente redirecionará de volta
            // com os erros e os dados antigos (old input).
            $validatedData = $request->validate([
                // Campos obrigatórios (NOT NULL no schema)
                'ano_exercicio' => 'required|integer|min:1900|max:' . (date('Y') + 10),
                'numero_empenho' => 'required|string|max:255',
                'tipo_empenho' => 'required|string|max:255',
                'categoria_empenho' => 'required|string|max:255',
                'historico_empenho' => 'required|string',
                'finalidade_programa' => 'required|string|max:255',
                'objetivo_programa' => 'required|string|max:255',
                'tipo_acao_programa' => 'required|string|max:255',
                'entidade' => 'required|string|max:255',
                'orgao' => 'required|string|max:255',
                'codigo_orgao' => 'required|string|max:255',
                'unidade' => 'required|string|max:255',
                'codigo_unidade' => 'required|string|max:255',
                'credor_nome' => 'required|string|max:255',
                'credor_cnpj_cpf' => 'required|string|max:255',
                'credor_natureza_juridica' => 'required|string|max:255',
                'codigo_funcao' => 'required|string|max:255',
                'descricao_funcao' => 'required|string|max:255',
                'codigo_subfuncao' => 'required|string|max:255',
                'descricao_subfuncao' => 'required|string|max:255',
                'codigo_programa' => 'required|string|max:255',
                'descricao_programa' => 'required|string|max:255',
                'codigo_acao' => 'required|string|max:255',
                'descricao_acao' => 'required|string|max:255',
                'codigo_elemento' => 'required|string|max:255',
                'descricao_elemento' => 'required|string|max:255',
                'mascara_natureza' => 'required|string|max:255',
                'natureza_despesa' => 'required|string|max:255',
                'codigo_recurso' => 'required|string|max:255',
                'descricao_recurso' => 'required|string|max:255',
                'tipo_recurso' => 'required|string|max:255',
                'modalidade_aplicacao' => 'required|string|max:255',
                'tipo_poder' => 'required|string|max:255',

                // Campos nulos (NULLABLE no schema)
                'valor_empenho' => 'nullable|numeric|min:0|decimal:0,2',
                'valor_liquidado' => 'nullable|numeric|min:0|decimal:0,2',
                'valor_pago' => 'nullable|numeric|min:0|decimal:0,2',
                'valor_orcado' => 'nullable|numeric|min:0|decimal:0,2',
                'valor_atualizado' => 'nullable|numeric|min:0|decimal:0,2',
                'valor_alterado' => 'nullable|numeric|min:0|decimal:0,2',
                'porcentagem_empenhado_sobre_orcado' => 'nullable|numeric|min:0|max:100|decimal:0,2',
                'porcentagem_liquidado_sobre_orcado' => 'nullable|numeric|min:0|max:100|decimal:0,2',
                'porcentagem_pago_sobre_orcado' => 'nullable|numeric|min:0|max:100|decimal:0,2',
                'data_empenho' => 'nullable|date',
                'data_liquidacao' => 'nullable|date',
                'data_pagamento' => 'nullable|date',
            ]);

            // Gera um UUID para o campo 'id'
            $id = Str::uuid()->toString();
            // Adiciona o 'id' aos dados validados
            $validatedData = ['id' => $id] + $validatedData;

            // Cria um novo registro de Despesa no banco de dados
            $despesa = Despesa::create($validatedData);

            // Redireciona para a rota 'despesas.show' com uma mensagem de sucesso
            return redirect()->route('despesas.show', $despesa->id)
                             ->with('success', 'Despesa criada com sucesso!');

        } catch (ValidationException $e) {
            // Captura exceções de validação (erros nos inputs).
            // O Laravel já lida com o redirecionamento 'back()' e 'withInput()'.
            // Aqui, estamos adicionando uma mensagem 'error' genérica com os detalhes.
            return dd($e->errors()); // Mantém os dados preenchidos no formulário
        } catch (\Exception $e) {
            // Captura quaisquer outras exceções que possam ocorrer durante a criação da despesa
            // (ex: problemas de conexão com o banco de dados, erros de lógica inesperados).
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar a Despesa: ' . $e->getMessage())
                ->withInput(); // Mantém os dados preenchidos no formulário
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $despesa = Despesa::find($id);

      if(!$despesa){
        abort(404, "Despesa não encontrada");
      }
       return view("despesas.showdespesa", ["despesa" => $despesa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $editarDespesa = Despesa::find($id);
       $dataTipoPoder = TipoPoder::orderBy("updated_at", "desc")->get();
        $dataEntidade = Entidade::orderBy("updated_at", "desc")->get();
        $dataUnidade = Unidade::orderBy("updated_at", "desc")->get();
        $dataTipoEmpenho = TipoEmpenho::orderBy("updated_at", "desc")->get();
        $dataCategoriaEmpenho = CategoriaEmpenho::orderBy("updated_at", "desc")->get();
        $dataTipoacao = Tipoacao::orderBy("updated_at", "desc")->get();
        $dataTiporecurso = Tiporecurso::orderBy("updated_at", "desc")->get();
        $dataNomeorgao = Nomeorgao::orderBy("updated_at", "desc")->get();
        $dataNomecredor = Nomecredor::orderBy("updated_at", "desc")->get();
        $dataNaturezajuridica = Naturezajuridica::orderBy("updated_at", "desc")->get();
      if(!$editarDespesa){
        abort(404, "Despesa não encontrada");
      }
      return view("despesas.edit" , ["editarDespesa" => $editarDespesa , 
    "dataTipoPoder" =>  $dataTipoPoder,
        "dataEntidade" => $dataEntidade,
        "dataUnidade"  => $dataUnidade, 
        "dataTipoEmpenho" => $dataTipoEmpenho, 
        "dataCategoriaEmpenho" => $dataCategoriaEmpenho,
         'dataTipoacao' => $dataTipoacao,
            'dataTiporecurso' => $dataTiporecurso,
            'dataNomeorgao' => $dataNomeorgao,
            'dataNomecredor' => $dataNomecredor,
            'dataNaturezajuridica' => $dataNaturezajuridica
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $despesa = Despesa::find($id);
        if(!$despesa){
           return redirect()->back()->with('error', 'Despesa não encontrada.');
        }
           $despesa->update($request->all());
   return redirect()->route('despesas.show', ["id" => $id])->with('success', 'Despesa atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $despesa = Despesa::find($id);

    if (!$despesa) {
        return redirect()->back()->with('error', 'Despesa não encontrada.');
    }

    $despesa->delete();

    return redirect()->route('despesas')->with('success', 'Despesa deletada com sucesso.');
    }
}
