<?php

namespace App\Http\Controllers;

use App\Models\NaturezaReceitum;
use App\Models\Receitum;
use App\Models\Finalidade;
use App\Models\Formaingresso;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Receitum::orderBy("created_at", "desc")->get();
        return view("receita.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataNatureza = NaturezaReceitum::orderBy("created_at", "desc")->get();
        $dataFinalidade = Finalidade::orderBy("created_at", "desc")->get();
        $dataFormaIngresso = Formaingresso::orderBy("created_at", "desc")->get();
        return view("receita.create", [
        "dataNatureza" => $dataNatureza,
        "dataFinalidade" => $dataFinalidade, 
        "dataFormaIngresso" => $dataFormaIngresso
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    try {
        $input = $request->all();

        // Lista de campos a converter
        $decimalFields = [
            'valor_orcado_inicial',
            'valor_orcado_atualizado',
            'valor_deducoes_orcado',
            'valor_arrecadado_mes',
            'valor_arrecadado_acumulado',
            'valor_deducoes_mes',
            'valor_lancado_mes',
            'valor_lancado_periodo',
            'realizado_percentual'
        ];

        // Função para converter valor brasileiro para decimal
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

        // Aplicar conversão
        foreach ($decimalFields as $field) {
            $input[$field] = isset($input[$field]) ? $convertToDecimal($input[$field]) : null;
        }

        // Validação com os dados já convertidos
        $validatedData = validator($input, [
            'data' => 'required|date',
            'natureza_id' => 'required|uuid|exists:natureza_receita,id',
            'finalidade' => 'required|string|max:255',
            'forma_ingresso' => 'required|string|max:255',
            'valor_orcado_inicial' => 'nullable|numeric|min:0',
            'valor_orcado_atualizado' => 'nullable|numeric|min:0',
            'valor_deducoes_orcado' => 'nullable|numeric|min:0',
            'valor_arrecadado_mes' => 'nullable|numeric|min:0',
            'valor_arrecadado_acumulado' => 'nullable|numeric|min:0',
            'valor_deducoes_mes' => 'nullable|numeric|min:0',
            'valor_lancado_mes' => 'nullable|numeric|min:0',
            'valor_lancado_periodo' => 'nullable|numeric|min:0',
            'receita_corrente_liquida' => 'boolean',
            'realizado_percentual' => 'nullable|numeric|min:0|max:100',
            'observacoes' => 'nullable|string',
        ])->validate();

        // Adiciona ID manualmente
        $validatedData['id'] = Str::uuid()->toString();

        // Cria o registro
        $novaReceita = Receitum::create($validatedData);

        return redirect()->route('receita.show', ['id' => $novaReceita->id])
                         ->with('success', 'Receita cadastrada com sucesso!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        $erro = $e->getMessage();
        return redirect()->back()->with('error', 'Erro ao cadastrar a receita: ' . $erro)->withInput();
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $receitaId = Receitum::with("NaturezaReceitum")->findOrFail($id);
         if(!$receitaId){
             abort(404, "Receita não encontrada");
         }
        return view("receita.showid", ["receita" => $receitaId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $receitaId = Receitum::with("NaturezaReceitum")->findOrFail($id);
      $dataNatureza = NaturezaReceitum::orderBy("created_at", "desc")->get();
      $dataFinalidade = Finalidade::orderBy("created_at", "desc")->get();
        $dataFormaIngresso = Formaingresso::orderBy("created_at", "desc")->get();
    
      if(!$receitaId){
             abort(404, "Receita não encontrada");
         }
     return view("receita.edit", [ 
    "receita"=>$receitaId, 
    "dataNatureza" => $dataNatureza,
    "dataFinalidade" => $dataFinalidade, 
    "dataFormaIngresso" => $dataFormaIngresso
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $receita = Receitum::find($id);

    if (!$receita) {
        abort(404, "Receita não encontrada");
    }

    try {
        $input = $request->all();

        // Lista de campos a converter
        $decimalFields = [
            'valor_orcado_inicial',
            'valor_orcado_atualizado',
            'valor_deducoes_orcado',
            'valor_arrecadado_mes',
            'valor_arrecadado_acumulado',
            'valor_deducoes_mes',
            'valor_lancado_mes',
            'valor_lancado_periodo',
            'realizado_percentual'
        ];

        // Função para converter valores brasileiros para float
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

        // Aplica a conversão nos campos
        foreach ($decimalFields as $field) {
            $input[$field] = isset($input[$field]) ? $convertToDecimal($input[$field]) : null;
        }

        // Validação com os dados convertidos
        $validatedData = validator($input, [
            'data' => 'required|date',
            'natureza_id' => 'required|uuid|exists:natureza_receita,id',
            'finalidade' => 'required|string|max:255',
            'forma_ingresso' => 'required|string|max:255',
            'valor_orcado_inicial' => 'nullable|numeric|min:0',
            'valor_orcado_atualizado' => 'nullable|numeric|min:0',
            'valor_deducoes_orcado' => 'nullable|numeric|min:0',
            'valor_arrecadado_mes' => 'nullable|numeric|min:0',
            'valor_arrecadado_acumulado' => 'nullable|numeric|min:0',
            'valor_deducoes_mes' => 'nullable|numeric|min:0',
            'valor_lancado_mes' => 'nullable|numeric|min:0',
            'valor_lancado_periodo' => 'nullable|numeric|min:0',
            'receita_corrente_liquida' => 'boolean',
            'realizado_percentual' => 'nullable|numeric|min:0|max:100',
            'observacoes' => 'nullable|string',
        ])->validate();

        // Atualiza os dados
        $receita->update($validatedData);

        return redirect()->route('receita.show', $receita->id)
                         ->with('success', 'Receita atualizada com sucesso!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Ocorreu um erro ao atualizar a Receita: ' . $e->getMessage())
            ->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $receita= Receitum::find($id);
          if(!$receita){
             abort(404, "Receita não encontrada");
         }

       $receita->delete();

    return redirect()->route('receita')->with('success', 'Receita deletada com sucesso.');
    }
}
