<?php

namespace App\Http\Controllers;

use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\CompraDireta;
class PublicoComprasDiretas extends Controller
{
    public function index()
    {
        //numero_pagamento , data_pagamento,
        // nome_beneficiario, cpf_cnpj_beneficiario, historico 
        //valor
       $data = CompraDireta::orderBy("created_at", "desc")->get(); 
      
        $Valor= CompraDireta::sum("valor_rs");
      $total = CompraDireta::count();
        return view("comprasdiretas.listacompras", ["data" => $data, 
        "total" => $total, "Valor" => $Valor]);
    }
    public function  show($id)
    {
         try{
    $data = CompraDireta::findOrFail($id);


return view("comprasdiretas.showpublicoid", ["compraDireta" => $data]);
    }
    catch(ModelNotFoundException $e)
    {
 return redirect()->back()
                ->with('error', 'Compra  direta  não encontrado');
    }
    }
}
