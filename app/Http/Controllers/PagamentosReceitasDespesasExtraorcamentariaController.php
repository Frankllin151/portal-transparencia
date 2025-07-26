<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use App\Models\Receitasdespesasextraorcamentarium;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class PagamentosReceitasDespesasExtraorcamentariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $data = Pagamentosreceitasdespesasextraorcamentarium::orderBy("id", "desc")->get();
     return view("PagamentosReceitasDespesasExtraorcamentaria.showAll",["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $receitaDespesasOrcamentaria = Receitasdespesasextraorcamentarium::orderBy("id", "desc")->get();
        return view('PagamentosReceitasDespesasExtraorcamentaria.create',[
            "receitasDespesasExtraOrcamentarias" => $receitaDespesasOrcamentaria
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    try {
        $input = $request->all();

        // Converte valor brasileiro para float
        $convertToDecimal = function ($valor) {
            $valor = trim((string) $valor);
            $valor = preg_replace('/[^0-9,\.]/', '', $valor);

            if (str_contains($valor, ',') && str_contains($valor, '.')) {
                $valor = str_replace('.', '', $valor);
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, ',')) {
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, '.')) {
                if (substr_count($valor, '.') > 1) {
                    $valor = str_replace('.', '', $valor);
                }
            }

            return ($valor === '' || !is_numeric($valor)) ? null : (float) $valor;
        };

        // Aplica a conversão ao campo "valor"
        $input['valor'] = isset($input['valor']) ? $convertToDecimal($input['valor']) : null;

        // Validação
        $validatedData = validator($input, [
            'cpf_cnpj_beneficiario' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
            'historico' => 'required|string|max:255',
            'nome_beneficiario' => 'required|string|max:255',
            'numero_pagamento' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'receita_depesa_extraorcamentaria_id' => [
                'required',
                'string',
                Rule::exists('receitasdespesasextraorcamentaria', 'id')
            ],
            'observacoes' => 'nullable|string',
        ])->validate();

        // Adiciona UUID
        $validatedData['id'] = Str::uuid()->toString();

        // Cria o pagamento
        $payment = Pagamentosreceitasdespesasextraorcamentarium::create($validatedData);

        return redirect()->route('pagamentosdespesasreceita.show', $payment->id)
                         ->with('success', 'Pagamento extra orçamentário adicionado com sucesso!');
    } catch (ValidationException $e) {
        dd($request->all()); // Apenas para debug, pode remover
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
                         ->withErrors(['error' => 'Erro ao adicionar o pagamento Receita/Despesa Extra: ' . $e->getMessage()])
                         ->withInput();
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pagamentosreceitasdespesasextraorcamentarium::with("Receitasdespesasextraorcamentarium")->findOrFail($id);


        return view("PagamentosReceitasDespesasExtraorcamentaria.showid", ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $receitaDespesasOrcamentaria = Receitasdespesasextraorcamentarium::orderBy("id", "desc")->get();
        $data = Pagamentosreceitasdespesasextraorcamentarium::findOrFail($id);
        return view('PagamentosReceitasDespesasExtraorcamentaria.edit',[
            "data" => $data,
            "receitasDespesasExtraOrcamentarias" => $receitaDespesasOrcamentaria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $rules = [
        'cpf_cnpj_beneficiario' => 'required|string|max:255',
        'data_pagamento' => 'required|date',
        'historico' => 'required|string|max:255',
        'nome_beneficiario' => 'required|string|max:255',
        'numero_pagamento' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
        'receita_depesa_extraorcamentaria_id' => [
            'required',
            'string',
            Rule::exists('receitasdespesasextraorcamentaria', 'id')
        ],
        'observacoes' => 'nullable|string',
    ];

    try {
        $input = $request->all();

        // Conversão de valor em formato brasileiro para float
        $convertToDecimal = function ($valor) {
            $valor = trim((string) $valor);
            $valor = preg_replace('/[^0-9,\.]/', '', $valor);

            if (str_contains($valor, ',') && str_contains($valor, '.')) {
                $valor = str_replace('.', '', $valor);
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, ',')) {
                $valor = str_replace(',', '.', $valor);
            } elseif (str_contains($valor, '.')) {
                if (substr_count($valor, '.') > 1) {
                    $valor = str_replace('.', '', $valor);
                }
            }

            return ($valor === '' || !is_numeric($valor)) ? null : (float) $valor;
        };

        // Aplica a conversão ao campo "valor"
        $input['valor'] = isset($input['valor']) ? $convertToDecimal($input['valor']) : null;

        // Validação com o dado já convertido
        $validatedData = validator($input, $rules)->validate();

        // Atualiza o pagamento
        $payment = Pagamentosreceitasdespesasextraorcamentarium::findOrFail($id);
        $payment->update($validatedData);

        return redirect()->route('pagamentosdespesasreceita.show', $payment->id)
                         ->with('success', 'Pagamento extra orçamentário atualizado com sucesso!');

    } catch (ValidationException $e) {
        return redirect()->back()
                         ->withErrors($e->errors())
                         ->withInput();
    } catch (ModelNotFoundException $e) {
        return redirect()->back()
                         ->withErrors(['error' => 'Pagamento extra orçamentário não encontrado.'])
                         ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
                         ->withErrors(['error' => 'Erro ao atualizar o pagamento: ' . $e->getMessage()])
                         ->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        try {
            $payment = Pagamentosreceitasdespesasextraorcamentarium::findOrFail($id);

            $payment->delete();

            return redirect()->route('pagamentosdespesasreceita')
                             ->with('success', 'Pagamento extra orçamentário excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                             ->with('error', 'Pagamento Receita extra orçamentário não encontrado.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Ocorreu um erro ao excluir o pagamento Receita extra orçamentário: ' . $e->getMessage());
        }
    }
}
