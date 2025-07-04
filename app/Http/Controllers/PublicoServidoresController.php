<?php

namespace App\Http\Controllers;

use App\Models\Servidore;
use Illuminate\Http\Request;

class PublicoServidoresController extends Controller
{
    public function index()
    {
        return view("servidores.servidoreslink");
    }
    public function cargosVencimentos()
    {
        $data= Servidore::with('cargo')->get();
     
        $total = Servidore::count();
        return view("servidores.cargovencimentos", [
          "data" => $data, "total" => $total,]);
    }
    public function remuneracoes()
    {
      $data = Servidore::with("cargo")->get();
      $total  = Servidore::count();
        $remuneracao  = Servidore::sum("remuneracao_contratual");
      return view("servidores.remuneracaoes", ["data" => $data, "total" => $total, 
     "remuneracao" => $remuneracao]);
      // nome_servidor , cargo->competencia , matricula , orgao
      // organograma , data_admissao , situacao , remuneracao_contratual 
      

    }
    public function servidoresPublicos()
    {
        $data = Servidore::with("cargo")
    ->where('vinculo_empregaticio', 'Comissionado')
    ->get();
    $remuneracao  = Servidore::with("cargo")->where('vinculo_empregaticio', 'Comissionado')->sum("remuneracao_contratual");
         $total  = Servidore::with("cargo")
    ->where('vinculo_empregaticio', 'Comissionado')->count();
    
         return view("servidores.servidorpublico", ["data" => $data, "total"
          => $total,  "remuneracao" => $remuneracao]);
    }
    
   public function servidoresPublicosAtivos()
   {
     $data = Servidore::with("cargo")
    ->where('situacao', 'Ativo')
    ->get();
    $remuneracao  = Servidore::with("cargo")->where('situacao', 'Ativo')->sum("remuneracao_contratual");
      $total  = Servidore::with("cargo")
    ->where('situacao', 'Ativo')->count();
    return view("servidores.servidorespublicoativos", ["data" => $data, 
    "total" => $total,  "remuneracao" => $remuneracao]);
   }
}
