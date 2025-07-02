<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;

class PublicoContratoController extends Controller
{
    public function index()
    {
        return view("contratos.contratolink");
    }
    public function contratos()
    {
        //data_assinatura, numero_contrato, tipo_contrato ,  contratado , situacao 
        $data = Contrato::all();
        $total = Contrato::count();
        return view("contratos.contratoslista", ["data" => $data, "total" => $total]);
    }

    public function fiscais()
    {
        //contratado, tipo_contrato, competencia , valor_inicial , valor_final
         $data = Contrato::all();
          $total = Contrato::count();
        return view("contratos.fiscais", ["data" => $data, "total" => $total]);
    }
}
