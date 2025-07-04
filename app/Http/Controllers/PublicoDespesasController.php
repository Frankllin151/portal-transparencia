<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;

class PublicoDespesasController extends Controller
{
    public function index()
    {
        return view("despesas.TelapublicaDespesas");
    }
    public  function DespesasPessoal()
    {
       $valorEmpenho = Despesa::sum("valor_empenho");
      
        return view("despesas.DepesasPessoal", ["valorEmpenho" => $valorEmpenho]);
    }
    public function DespesasDiariaEViagens( )
    {
        return  view("despesas.DepesasDiariaViagens");
    }
    public function DespesasOrcamentaria()
    {
        return view("despesas.DespesasOrcamentaria");
    }
    public function Credor()
    {
         return view("despesas.DespesasCredor");
    }
    public function ProgramasAcaoes()
    {
        return view("despesas.DespesasProgramasAcoes");
    }

    public function ExecucaoDetalhadaDedepesas()
    {
    return view("despesas.DespesasExecucao");
    }
}
