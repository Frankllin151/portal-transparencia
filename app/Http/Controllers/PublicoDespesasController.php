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
}
