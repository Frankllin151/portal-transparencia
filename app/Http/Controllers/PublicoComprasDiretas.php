<?php

namespace App\Http\Controllers;

use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $Valor= Pagamentosreceitasdespesasextraorcamentarium::sum("valor");
       $total = Pagamentosreceitasdespesasextraorcamentarium::count();
        return view("comprasdiretas.listacompras", ["data" => $data, 
        "total" => $total, "Valor" => $Valor]);
    }
    public function  show($id)
    {
         try{
    $data = Pagamentosreceitasdespesasextraorcamentarium::
    with("Receitasdespesasextraorcamentarium")->findOrFail($id);
return view("comprasdiretas.showpublicoid", ["data" => $data]);
    }
    catch(ModelNotFoundException $e)
    {
 return redirect()->back()
                ->with('error', 'Compra  direta  não encontrado');
    }
    }
}
