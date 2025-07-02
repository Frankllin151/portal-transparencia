<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
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

        return view("ReceitasDespesasExtraorcamentaria.execucaoExtraorcamentaria",
    ["extraorcametariaPagamento" => $extraorcametaria,
            "QuantidadeRegistro" => $quantidadeRegistro,
            "ValorPagoTotal" => $valorPagoTotal,]);
    }
}
