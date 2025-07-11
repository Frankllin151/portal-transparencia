<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processoslicitatorio;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    $Modalidade= Processoslicitatorio::with("cargo")->
    where('modalidade', ["convite" , "Concorrência" , "Convite"])->count();
    $pregao = Processoslicitatorio::with("cargo")->
    where('modalidade', "Pregão")->count();
    return view("processolct.processoslicitacoe", [
        "data" => $data, 
        "total" => $total, 
        "modalidade" =>  $Modalidade, 
        "pregao" => $pregao
    ]);
    }

    public function finalizados()
    {
          $Modalidade= Processoslicitatorio::with("cargo")->
    where('modalidade', ["convite" , "Concorrência" , "Convite"])->count();
    $pregao = Processoslicitatorio::with("cargo")->
    where('modalidade', "Pregão")->count();
         $data = Processoslicitatorio::where('situacao', 'Concluído')->get();
         $total =  Processoslicitatorio::where('situacao', 'Concluído')->count();
         return view("processolct.finalizados" , ["data" => $data, "total" => $total, 
        "modalidade" =>  $Modalidade, 
        "pregao" => $pregao
        ]); 
    }
    public function show($id)
    {
         try {
            // Tenta encontrar o servidor pelo ID, incluindo o relacionamento com Cargo
            $data = Processoslicitatorio::findOrFail($id);
            // Retorna a view 'servidores.showid' passando os dados
            
            return view("processolct.showpublicoid", ["processo" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado.');
        }
    }
}
