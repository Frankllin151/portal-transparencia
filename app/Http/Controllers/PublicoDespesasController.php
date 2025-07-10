<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicoDespesasController extends Controller
{
    public function index()
    {
        return view("despesas.TelapublicaDespesas");
    }
    public  function DespesasPessoal()
    {
       $valorEmpenho = Despesa::sum("valor_empenho");
      
        return view("despesas.DepesasPessoal", ["valorEmpenho" => $valorEmpenho]);
    }
    public function DespesasDiariaEViagens( )
    {
        return  view("despesas.DepesasDiariaViagens");
    }
    public function DespesasOrcamentaria()
    {
        return view("despesas.DespesasOrcamentaria");
    }
    public function Credor()
    {
         return view("despesas.DespesasCredor");
    }
    public function ProgramasAcaoes()
    {
        return view("despesas.DespesasProgramasAcoes");
    }

    public function ExecucaoDetalhadaDedepesas()
    {
    return view("despesas.DespesasExecucao");
    }

    public function show($id)
    {
    try {
            // Tenta encontrar o servidor pelo ID, incluindo o relacionamento com Cargo
            $data = Despesa::findOrFail($id);
            // Retorna a view 'servidores.showid' passando os dados
            
            return view("despesas.showpublicoid", ["despesa" => $data]);
        } catch (ModelNotFoundException $e) {
            // Caso o servidor não seja encontrado, redireciona de volta com mensagem de erro
            return redirect()->back()
                ->with('error', 'Servidor não encontrado.');
        }
    }
}
