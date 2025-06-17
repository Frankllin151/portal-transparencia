<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Support\Str;
class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Despesa::orderBy("id" , "desc")->get();

        return view("despesa" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("despesas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
         $validatedData = $request->validate([
            // Campos obrigatórios (NOT NULL no schema)
            
            'ano_exercicio' => 'required|integer|min:1900|max:' . (date('Y') + 10), // Ano atual + 10 anos como limite superior
            'numero_empenho' => 'required|string|max:255',
            'tipo_empenho' => 'required|string|max:255', // Ajuste conforme os valores permitidos (e.g., in:Ordinário,Estimativo,Global)
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
            'credor_cnpj_cpf' => 'required|string|max:255', // Pode adicionar regex para CNPJ/CPF
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
            'tipo_poder' => 'required|string|max:255', // Ajuste conforme os valores permitidos (e.g., in:Executivo,Legislativo,Judiciário)

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
        $id = Str::uuid()->toString();
       $validatedData = ['id' => $id] + $validatedData;

        
         $despesa = Despesa::create($validatedData);

        // Redireciona para a página de visualização ou lista com uma mensagem de sucesso
        return redirect()->route('despesas.show', $despesa->id)
                         ->with('success', 'Despesa criada com sucesso!');
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
       return view("showdespesa", ["despesa" => $despesa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $editarDespesa = Despesa::find($id);
      if(!$editarDespesa){
        abort(404, "Despesa não encontrada");
      }
      return view("despesas.edit" , ["editarDespesa" => $editarDespesa]);
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
   return redirect()->route('despesas.editar', ["id" => $id])->with('success', 'Despesa atualizada com sucesso.');
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
