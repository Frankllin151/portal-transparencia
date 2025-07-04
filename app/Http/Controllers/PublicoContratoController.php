<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
           $valorInicialPorAno = Contrato::select(
                DB::raw('YEAR(updated_at) as ano'), // Seleciona o ano como 'ano'
                DB::raw('SUM(valor_inicial) as total_valor_inicial')
            )
            ->groupBy(DB::raw('YEAR(updated_at)')) // Agrupa diretamente pela função YEAR()
            ->orderBy('ano', 'asc')
            ->get();

        // **CORREÇÃO AQUI:** Usando DB::raw em ambos os lugares para o ano
        $valorFinalPorAno = Contrato::select(
                DB::raw('YEAR(updated_at) as ano'), // Seleciona o ano como 'ano'
                DB::raw('SUM(valor_final) as total_valor_final')
            )
            ->groupBy(DB::raw('YEAR(updated_at)')) // Agrupa diretamente pela função YEAR()
            ->orderBy('ano', 'asc')
            ->get();
         

        return view("contratos.fiscais", ["data" => $data, "total" => $total, 
    "valorInicialPorAno" => $valorInicialPorAno,
            "valorFinalPorAno" => $valorFinalPorAno,
    ]);
    }
}
