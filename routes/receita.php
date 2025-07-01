<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;
use  App\Http\Controllers\TelaHomeController;
use App\Http\Controllers\PublicaReceitaController;

Route::get("/dashboard/receita", [ReceitaController::class, "index"])
->middleware(['auth', 'verified'])->name('receita');
Route::get("/dashboard/receita/{id}/showid", [ReceitaController::class, "show"])
->middleware(['auth', 'verified'])->name("receita.show");
Route::get("/dashboard/receita/{id}/edit", [ReceitaController::class, "edit"])
->middleware(['auth', 'verified'])->name("receita.edit");
Route::put("/dashboard/receita/{id}/update",[ReceitaController::class, "update"])
->middleware(['auth', 'verified'])->name("receita.update");
Route::get("/dashboard/novo/receita", [ReceitaController::class, "create"])
->middleware(['auth', 'verified'])->name("receita.novo");
Route::post("/dashboard/novo/post", [ReceitaController::class, "store"])
->middleware(['auth', 'verified'])->name("receita.store");
Route::delete("/dashboard/delete/{id}/receita",[ReceitaController::class, "destroy"])
->middleware(['auth', 'verified'])->name("receita.delete");



// Tela Publicas
Route::get('/', [TelaHomeController::class, "index"])->name("main");
Route::get("/publica/receitas", [PublicaReceitaController::class,"index"])
->name("receitapublica");
Route::get("/publica/receitas/prevista/x/realizada", [PublicaReceitaController::class, 
"previstaRealizada"])
->name('receita.prevista.x.realizada');
Route::get("/publica/receita/orcamentaria", [PublicaReceitaController::class, 
"ReceitaOrcamentaria"])->name("receita.orcamentaria");
Route::get("/publica/receitas/orcamentaria/diaria", [PublicaReceitaController::class,
"VisualizaDiariaOrcamentaria"])->name("receita.orcamentaria.diaria");
// Tela Publicas end