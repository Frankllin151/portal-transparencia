<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use App\Models\Receitum;
use App\Models\Despesa;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class publicoExecucaoExtraOrcamentariaController extends Controller
{
    public function  index()
    {
       $extraorcametaria = Pagamentosreceitasdespesasextraorcamentarium::with("receitasdespesasextraorcamentarium")->get();

        // Calcula o total de registros
        $quantidadeRegistro = $extraorcametaria->count();

        // Calcula o valor total pago
        // O campo 'valor' é string, então precisamos convertê-lo para float para somar.
        // Assumindo que o formato é "1.234,56" ou "1234,56", substituímos o ponto por nada e a vírgula por ponto.
        $valorPagoTotal = $extraorcametaria->sum(function($item) {
            return (float)str_replace(',', '.', str_replace('.', '', $item->valor));
        });
        $valorDespesa = Despesa::sum("valor_pago") - $valorPagoTotal;
        $valorReceita = Receitum::sum("valor_orcado_inicial") - $valorPagoTotal;

        return view("ReceitasDespesasExtraorcamentaria.execucaoExtraorcamentaria",
    ["extraorcametariaPagamento" => $extraorcametaria,
            "QuantidadeRegistro" => $quantidadeRegistro,
            "ValorPagoTotal" => $valorPagoTotal,
          "valorDespesa" => $valorPagoTotal , 
          "valorReceita" => $valorReceita
        ]);
    }


    public function show($id){
 try {
            // Tenta encontrar o servidor pelo ID, incluindo o relacionamento com Cargo
            $data = Pagamentosreceitasdespesasextraorcamentarium::
            with("receitasdespesasextraorcamentarium")->findOrFail($id);

            // Retorna a view 'servidores.showid' passando os dados
            
            return view("ReceitasDespesasExtraorcamentaria.showpublicoid", ["data" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado.');
        }
    }
}
