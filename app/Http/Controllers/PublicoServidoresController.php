<?php

namespace App\Http\Controllers;

use App\Models\Servidore;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Situacaocargo;

class PublicoServidoresController extends Controller
{
    public function index()
    {
        return view("servidores.servidoreslink");
    }
    public function cargosVencimentos()
    {
        $data= Servidore::with('cargo')->get();
     $CaargoContagemEfetivo = Servidore::with('cargo')->
     where('classificacao_cargo', 'Efetivo')->count();

      $situacao = Servidore::with('cargo')->
     where('situacao', 'ativo')->count();

     
        $total = Servidore::count();
        return view("servidores.cargovencimentos", [
          "data" => $data, "total" => $total,
        "CaargoContagemEfetivo" => $CaargoContagemEfetivo, 
        "situacao" =>  $situacao
        ]);
    }
    public function remuneracoes()
    {
      $data = Servidore::with("cargo")->get();
      $total  = Servidore::count();
      $MatriculaType = Servidore::sum("matricula");
      $trabalhando = Servidore::with('cargo')->
     where('situacao', 'trabalhando')->count();
     $Afastado = Servidore::with('cargo')->
     where('situacao', ["afastado" , "doente" , "exonerado" , "demitido"])->count();
        $remuneracao  = Servidore::sum("remuneracao_contratual");
      return view("servidores.remuneracaoes", ["data" => $data, "total" => $total, 
     "remuneracao" => $remuneracao,
     "matricula" => 2, 

     "afastado" => $Afastado

    
    ]);
     

    }
    public function servidoresPublicos()
    {
        $data = Servidore::with("cargo")->get();
     $contagemVinculoEmpregaticio = Servidore::with("cargo")
    ->where('vinculo_empregaticio', 'Comissionado')
    ->count();
   
     $situacao = Servidore::with('cargo')->
     where('situacao',"ativo")->count();


    $remuneracao  = Servidore::with("cargo")->sum("remuneracao_contratual");
         $total  = Servidore::with("cargo")->count();
    
         return view("servidores.servidorpublico", ["data" => $data, "total"
          => $total,  "remuneracao" => $remuneracao, 
          "contagemVinculoEmpregaticio" => $contagemVinculoEmpregaticio , 
          "situacao" => $situacao 
        
        ]);
    }
    
   public function servidoresPublicosAtivos()
   {
     $data = Servidore::with("cargo")
    ->where('situacao', 'Ativo')
    ->get();
    
    $remuneracao  = Servidore::with("cargo")->where('situacao', 'Ativo')->sum("remuneracao_contratual");
      $total  = Servidore::with("cargo")
    ->where('situacao', 'Ativo')->count();

    $contagemVinculoEmpregaticio = Servidore::with("cargo")
    ->where('vinculo_empregaticio', 'Comissionado')
    ->count();
   
     $situacao = Servidore::with('cargo')->
     where('situacao',"ativo")->count();



    return view("servidores.servidorespublicoativos", ["data" => $data, 
    "total" => $total,  "remuneracao" => $remuneracao, 
      "contagemVinculoEmpregaticio" => $contagemVinculoEmpregaticio , 
          "situacao" => $situacao 
  ]);
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
