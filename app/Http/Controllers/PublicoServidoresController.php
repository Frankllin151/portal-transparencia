<?php

namespace App\Http\Controllers;

use App\Models\Servidore;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

   public function  show($id)
   {
     try {
            // Tenta encontrar o servidor pelo ID, incluindo o relacionamento com Cargo
            $data = Servidore::with('cargo')->findOrFail($id);
           
            
            return view("servidores.showpublicoid",["servidor" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado.');
        }
   }
}
