<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicoDespesasController extends Controller
{
    public function index()
    {
        return view("despesas.TelapublicaDespesas");
    }
    public  function DespesasPessoal()
    {
        return view("despesas.DepesasPessoal");
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
