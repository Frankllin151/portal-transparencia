<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processoslicitatorio;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
class ProcessosLicitatoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = Processoslicitatorio::orderBy("created_at", "desc")->get(); 
        return view("processolct.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("processolct.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'entidade' => 'required|string',
                'numero_processo' => 'required|integer',
                'ano_processo' => 'required|integer',
                'numero_licitacao' => 'required|integer',
                'ano_licitacao' => 'required|integer',
                'modalidade' => 'required|string',
                'tipo_objeto' => 'required|string',
                'forma_julgamento' => 'required|string',
                'situacao' => 'required|string',
                'data_homologacao' => 'required|date',
                'cidade_certame' => 'required|string',
                'estado_certame' => 'required|string',
                'data_hora_abertura_envelopes' => 'required|date_format:Y-m-d\TH:i',
                'inicio_recebimento_envelopes' => 'required|date_format:Y-m-d\TH:i',
                'termino_recebimento_envelopes' => 'required|date_format:Y-m-d\TH:i',
                'data_criacao' => 'required|date', // Assuming this is a separate date field
                'forma_contratacao' => 'required|string',
                'registro_precos' => 'required|string',
                'nome_contato' => 'required|string',
            ]);
             $id = Str::uuid()->toString();
       $validatedData = ['id' => $id] + $validatedData;
             $processo= Processoslicitatorio::create($validatedData);

            return redirect()->route('processo.show', ['id' =>$processo->id])
            ->with('success', 'Processo licitatório cadastrado com sucesso!');

        } catch (ValidationException $e) {
           
            return redirect()->back()->with('error', 'Erros nos inputs: ' . $e->errors())->withInput();
        } catch (\Exception $e) {
          
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o processo licitatório: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataId = Processoslicitatorio::find($id);
          if(!$dataId){
        abort(404, "Processos não encontrada");
      }
        ///dd($dataId);
       return view("processolct.showid" , ["processo"=> $dataId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

         $dataId = Processoslicitatorio::find($id);
          if(!$dataId){
         abort(404, "Processos não encontrada");
      }
     /// dd($dataId);
        return view("processolct.edit" , ["processo"=> $dataId]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $dataId = Processoslicitatorio::find($id);
          if(!$dataId){
         abort(404, "Processos não encontrada");
      }
      
      $dataId->update($request->all());
   return redirect()->route('processo.show', ["id" => $id])->with('success', 'Processo atualizada com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $processo = Processoslicitatorio::find($id);

    if (!$processo) {
        return redirect()->back()->with('error', 'Processo não encontrada.');
    }

    $processo->delete();

    return redirect()->route('processo')->with('success', 'Processo deletada com sucesso.');
    }
}
