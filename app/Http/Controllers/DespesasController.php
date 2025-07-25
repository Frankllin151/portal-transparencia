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
        $input = $request->all();

        // Lista de campos numéricos com vírgula/ponto
        $decimalFields = [
            'valor_empenho', 'valor_liquidado', 'valor_pago',
            'valor_orcado', 'valor_atualizado', 'valor_alterado',
            'porcentagem_empenhado_sobre_orcado', 'porcentagem_liquidado_sobre_orcado',
            'porcentagem_pago_sobre_orcado'
        ];

        // Função de conversão para float (padrão brasileiro)
        $convertToDecimal = function ($valor) {
            $valor = trim((string) $valor);
            $valor = preg_replace('/[^0-9,\.]/', '', $valor);

            if (str_contains($valor, ',') && str_contains($valor, '.')) {
                // Ex: 84.458,41 => remove milhar e troca vírgula por ponto
                $valor = str_replace('.', '', $valor);
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, ',')) {
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, '.')) {
                // Se tiver só ponto, assume que é separador de milhar e remove
                if (substr_count($valor, '.') > 1) {
                    $valor = str_replace('.', '', $valor);
                }
            }

            return ($valor === '' || !is_numeric($valor)) ? null : (float) $valor;
        };

        // Converte os campos
        foreach ($decimalFields as $field) {
            $input[$field] = isset($input[$field]) ? $convertToDecimal($input[$field]) : null;
        }

        // Gera UUID
        $input['id'] = Str::uuid()->toString();

        // Validação com os valores já convertidos
        $validatedData = validator($input, [
            'id' => 'required|uuid',
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
            'descricao_funcao' => 'required|string',
            'codigo_subfuncao' => 'required|string|max:255',
            'descricao_subfuncao' => 'required|string',
            'codigo_programa' => 'required|string|max:255',
            'descricao_programa' => 'required|string',
            'codigo_acao' => 'required|string|max:255',
            'descricao_acao' => 'required|string',
            'codigo_elemento' => 'required|string|max:255',
            'descricao_elemento' => 'required|string',
            'mascara_natureza' => 'required|string|max:255',
            'natureza_despesa' => 'required|string|max:255',
            'codigo_recurso' => 'required|string|max:255',
            'descricao_recurso' => 'required|string',
            'tipo_recurso' => 'required|string|max:255',
            'modalidade_aplicacao' => 'required|string|max:255',
            'tipo_poder' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'valor_empenho' => 'nullable|numeric|min:0',
            'valor_liquidado' => 'nullable|numeric|min:0',
            'valor_pago' => 'nullable|numeric|min:0',
            'valor_orcado' => 'nullable|numeric|min:0',
            'valor_atualizado' => 'nullable|numeric|min:0',
            'valor_alterado' => 'nullable|numeric|min:0',
            'porcentagem_empenhado_sobre_orcado' => 'nullable|numeric|min:0|max:100',
            'porcentagem_liquidado_sobre_orcado' => 'nullable|numeric|min:0|max:100',
            'porcentagem_pago_sobre_orcado' => 'nullable|numeric|min:0|max:100',
            'data_empenho' => 'nullable|date',
            'data_liquidacao' => 'nullable|date',
            'data_pagamento' => 'nullable|date',
        ])->validate();

        // Criação da despesa
        Despesa::create($validatedData);

        return redirect()->route('despesas.show', $input['id'])
                         ->with('success', 'Despesa criada com sucesso!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Erro ao cadastrar Despesa: ' . $e->getMessage())
            ->withInput();
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
        $despesa = Despesa::find($id);

        if (!$despesa) {
            return redirect()->back()->with('error', 'Despesa não encontrada.');
        }

        try {
            // 1. Validar os dados
            // Remova as regras de validação para os campos numéricos que serão convertidos aqui,
            // ou valide-os após a conversão, se necessário um formato específico.
            $validatedData = $request->validate([
                'ano_exercicio' => 'required|integer',
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
                'descricao_funcao' => 'required|string',
                'codigo_subfuncao' => 'required|string|max:255',
                'descricao_subfuncao' => 'required|string',
                'codigo_programa' => 'required|string|max:255',
                'descricao_programa' => 'required|string',
                'codigo_acao' => 'required|string|max:255',
                'descricao_acao' => 'required|string',
                'codigo_elemento' => 'required|string|max:255',
                'descricao_elemento' => 'required|string',
                'mascara_natureza' => 'required|string|max:255',
                'natureza_despesa' => 'required|string|max:255',
                'codigo_recurso' => 'required|string|max:255',
                'descricao_recurso' => 'required|string',
                'tipo_recurso' => 'required|string|max:255',
                'modalidade_aplicacao' => 'required|string|max:255',
                // 'tipo_poder' => 'required|string|max:255', // Verifique se esta coluna existe no seu formulário
                'observacoes' => 'nullable|string', // A coluna observacoes é um TEXT, string é suficiente
                // Regras para os campos decimais, após a conversão, você pode querer 'numeric'
                // Por agora, aceitamos como string para a conversão
                'valor_empenho' => 'required|string',
                'valor_liquidado' => 'required|string',
                'valor_pago' => 'required|string',
                'valor_orcado' => 'required|string',
                'valor_atualizado' => 'required|string',
                'valor_alterado' => 'required|string',
                'porcentagem_empenhado_sobre_orcado' => 'required|string',
                'porcentagem_liquidado_sobre_orcado' => 'required|string',
                'porcentagem_pago_sobre_orcado' => 'required|string',
                'data_empenho' => 'nullable|date',
                'data_liquidacao' => 'nullable|date',
                'data_pagamento' => 'nullable|date',
            ]);

            // 2. Pré-processar os campos numéricos
            $numericFields = [
                'valor_empenho', 'valor_liquidado', 'valor_pago',
                'valor_orcado', 'valor_atualizado', 'valor_alterado',
                'porcentagem_empenhado_sobre_orcado', 'porcentagem_liquidado_sobre_orcado',
                'porcentagem_pago_sobre_orcado'
            ];

            foreach ($numericFields as $field) {
                if (isset($validatedData[$field]) && is_string($validatedData[$field])) {
                    // Remove o ponto de milhar e troca a vírgula por ponto decimal
                    $validatedData[$field] = str_replace(['.', ','], ['', '.'], $validatedData[$field]);
                }
            }

            // 3. Atualizar o modelo com os dados já tratados
            $despesa->update($validatedData);

            return redirect()->route('despesas.show', ["id" => $id])->with('success', 'Despesa atualizada com sucesso.');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log do erro para depuração
          
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a despesa: ' . $e->getMessage())->withInput();
        }
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
