<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processoslicitatorio;
class PublicoProcessosLicitatoriosController extends Controller
{
    public function index()
    {
        return view("processolct.processoslink");
    }
    public function dispensa()
    {
        $data =Processoslicitatorio::all();
        $total = Processoslicitatorio::count();
        // ano_processo , numero_licitacao, tipo_objeto, data_homologacao
        //situacao , registro_precos , forma_contratacao
        return view("processolct.dispensalicitacao", ["data" => $data, "total" => $total]);
    }
    public function licitacoes()
    {
         $data =Processoslicitatorio::all();
        $total = Processoslicitatorio::count();
    return view("processolct.processoslicitacoe", ["data" => $data, "total" => $total]);
    }

    public function finalizados()
    {
         $data = Processoslicitatorio::where('situacao', 'Concluído')->get();
         $total =  Processoslicitatorio::where('situacao', 'Concluído')->count();
         return view("processolct.finalizados" , ["data" => $data, "total" => $total]); 
    }
}
