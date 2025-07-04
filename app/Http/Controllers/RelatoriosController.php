<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use App\Models\Movimentacaobancarium;
use App\Models\Receitum;
use Carbon\Carbon;

class RelatoriosController extends Controller
{
public function index()
{
    return view("relatorio.relatoriolink");
}

public function movimentacaoBancaria()
{
    $todasContas = Movimentacaobancarium::all();
     $quantidadeRegistro = $todasContas->count();
    return view('relatorio.movimentacaoBancaria', 
    [ 'QuantidadeRegistro' => $quantidadeRegistro,
            'TodasContas' => $todasContas, ]);
}

public function movimentacaoBancariaMensal()
{
    $mesAtual = Carbon::now()->month;
    $anoAtual = Carbon::now()->year;

    $todasContas = Movimentacaobancarium::whereMonth('updated_at', $mesAtual)
        ->whereYear('updated_at', $anoAtual)
        ->get();

    $quantidadeRegistro = $todasContas->count();

    return view("relatorio.movimentoBaMensal", [
        'QuantidadeRegistro' => $quantidadeRegistro,
        'TodasContas' => $todasContas,
    ]);
}

public function leiResponsabilidadeFiscal()
    {
        $mesAtual = now()->format('m');
        $anoAtual = now()->format('Y');

        // Receita no mês atual
        // Soma o valor arrecadado no mês atual da tabela 'receita'
        $receitaMes = Receitum::whereMonth('data', $mesAtual)
                             ->whereYear('data', $anoAtual)
                             ->sum('valor_arrecadado_mes');

        // Receita acumulada no ano
        // Soma o valor arrecadado acumulado no ano da tabela 'receita'
        $receitaAno = Receitum::whereYear('data', $anoAtual)
                             ->sum('valor_arrecadado_mes');

        // Receita Corrente Líquida
        // Soma o valor arrecadado acumulado para a Receita Corrente Líquida no ano
        $receitaCorrenteLiquida = Receitum::where('receita_corrente_liquida', true)
                                         ->whereYear('data', $anoAtual)
                                         ->sum('valor_arrecadado_acumulado');

        // Despesas do mês atual
        // CORREÇÃO: Busca o valor pago na tabela 'despesa'
        $despesaPagoMes = Despesa::whereMonth('data_pagamento', $mesAtual)
                                 ->whereYear('data_pagamento', $anoAtual)
                                 ->sum('valor_pago');

        // Busca o valor empenhado na tabela 'despesa'
        $despesaEmpenhadoMes = Despesa::whereMonth('data_empenho', $mesAtual)
                                      ->whereYear('data_empenho', $anoAtual)
                                      ->sum('valor_empenho');

        // Busca o valor liquidado na tabela 'despesa'
        $despesaLiquidadoMes = Despesa::whereMonth('data_liquidacao', $mesAtual)
                                      ->whereYear('data_liquidacao', $anoAtual)
                                      ->sum('valor_liquidado');

        // Resultado fiscal do mês
        $resultadoFiscalMes = $receitaMes - $despesaPagoMes;

        return view("relatorio.leiResponsabilidadeFiscal", [
            'receitaMes' => $receitaMes,
            'receitaAno' => $receitaAno,
            'receitaCorrenteLiquida' => $receitaCorrenteLiquida,
            'despesaPagoMes' => $despesaPagoMes,
            'despesaEmpenhadoMes' => $despesaEmpenhadoMes,
            'despesaLiquidadoMes' => $despesaLiquidadoMes,
            'resultadoFiscalMes' => $resultadoFiscalMes
        ]);
    }

}
