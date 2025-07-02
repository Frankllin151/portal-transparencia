<?php

namespace App\Http\Controllers;

use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use Illuminate\Http\Request;

class PublicoComprasDiretas extends Controller
{
    public function index()
    {
        //numero_pagamento , data_pagamento,
        // nome_beneficiario, cpf_cnpj_beneficiario, historico 
        //valor
       $data = Pagamentosreceitasdespesasextraorcamentarium::with("Receitasdespesasextraorcamentarium")
       ->get();
       $total = Pagamentosreceitasdespesasextraorcamentarium::count();
        return view("comprasdiretas.listacompras", ["data" => $data, "total" => $total]);
    }
}
