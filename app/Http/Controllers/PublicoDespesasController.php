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
        $valorpago   = Despesa::sum("valor_pago");
        return  view("despesas.DepesasDiariaViagens", ["valorpago" => $valorpago]);
    }
    public function DespesasOrcamentaria()
    {
        $valorEmpenho = Despesa::sum("valor_empenho");
        $valorLiquidado = Despesa::sum("valor_liquidado");
        $valorpago   = Despesa::sum("valor_pago");
        return view("despesas.DespesasOrcamentaria", 
    [ "valorEmpenho" => $valorEmpenho,
        "valorLiquidado" => $valorLiquidado,
        "valorPago" => $valorpago]
    );
    }
    public function Credor()
    {
        $valorpago = Despesa::sum("valor_pago");
         return view("despesas.DespesasCredor", 
         ["valorPago" => $valorpago]
        );
    }
    public function ProgramasAcaoes()
    {
 $todosRegistros = Despesa::all();
         $valorAtualizadoTotal = $todosRegistros->sum('valor_atualizado');
        $valorEmpenhoTotal = $todosRegistros->sum('valor_empenho');
        $valorEmpenhoAtualizado = $valorAtualizadoTotal  - $valorEmpenhoTotal;

        return view("despesas.DespesasProgramasAcoes", ["valorEmpenhoAtualizado" =>$valorEmpenhoAtualizado]);
    }

    public function ExecucaoDetalhadaDedepesas()
    {
     $valorEmpenho = Despesa::sum("valor_empenho");
    return view("despesas.DespesasExecucao" ,["valorEmpenho" => $valorEmpenho ]);
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
