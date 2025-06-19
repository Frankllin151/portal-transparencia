<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NaturezaReceitum;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
class NaturezaReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = NaturezaReceitum::orderby("created_at" , "desc")->get();
        return view("naturezareceita.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("naturezareceita.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     try{
      $validatedData = $request->validate([
            'codigo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'categoria_economica' => 'required|string|max:255',
            'origem' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'rubrica' => 'required|string|max:255',
            'alinea' => 'required|string|max:255',
            'subalinea' => 'required|string|max:255',
            'desdobramento_nivel_1' => 'required|string|max:255',
            'desdobramento_nivel_2' => 'required|string|max:255',
            'desdobramento_nivel_3' => 'required|string|max:255',
        ]);
        $id = Str::uuid()->toString();
        $validatedData = ['id' => $id] + $validatedData;
         $natureza= NaturezaReceitum::create($validatedData);
         return redirect()->route('naturezareceita.show', ['id' =>$natureza->id])
            ->with('success', 'Receita Natureza cadastrado com sucesso!');

     } catch(ValidationException $e){
 return redirect()->back()->with('error', 'Erros nos inputs: ' . $e->errors())->withInput();
     } catch(\Exception $e){
return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o Receita : ' . $e->getMessage())->withInput();
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $naturezaReceitaid = NaturezaReceitum::findOrFail($id);
       return view("naturezareceita.showid", ["naturezaReceita" => $naturezaReceitaid]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataId = NaturezaReceitum::find($id);
        if(!$dataId){
             abort(404, "Processos não encontrada");
        }
        return view("naturezareceita.edit" , ["naturezaReceita" => $dataId ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
    try{
$naturezaReceita = NaturezaReceitum::findOrFail($id);
    $validatedData = $request->validate([
            'codigo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'categoria_economica' => 'required|string|max:255',
            'origem' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'rubrica' => 'required|string|max:255',
            'alinea' => 'required|string|max:255',
            'subalinea' => 'required|string|max:255',
            'desdobramento_nivel_1' => 'required|string|max:255',
            'desdobramento_nivel_2' => 'required|string|max:255',
            'desdobramento_nivel_3' => 'required|string|max:255',
        ]);

         $naturezaReceita->update($validatedData);
          return redirect()->route('naturezareceita.show', $naturezaReceita->id)
          ->with('success', 'Natureza de Receita atualizada com sucesso!');
    } catch (ValidationException $e){
 return redirect()->back()->with('error', 'Erros nos inputs: ' . $e->errors())->withInput();
    } catch (\Exception $e){
return redirect()->back()->with('error', 'Ocorreu um erro ao Editar o Receita : ' . $e->getMessage())->withInput();
    }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $natureza = NaturezaReceitum::find($id);

    if (!$natureza) {
        return redirect()->back()->with('error', 'Natureza Receita não encontrada.');
    }

    $natureza->delete();

    return redirect()->route('natureza')->with('success', 'Natureza Receita deletada com sucesso.');
    }
}
