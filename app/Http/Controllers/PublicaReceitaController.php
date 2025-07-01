<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicaReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("receita.receitapublica");
    }


   public function previstaRealizada()
   {
    return  view("receita.previstaXrealizada");
   }

  public function ReceitaOrcamentaria()
  {
    return view("receita.receitaOrcamentaria");
  }



    public function  VisualizaDiariaOrcamentaria()
    {
      return view("receita.ReceitaOrcamentariaDiaria");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
