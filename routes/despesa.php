
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\PublicaReceitaController;
use App\Http\Controllers\PublicoDespesasController;
// Despesas
Route::get("/dashboard/despesas",[DespesasController::class, "index"])
->middleware(['auth', 'verified'])->name('despesas');
Route::get('/dashboard/despesas/{id}',[DespesasController::class, "show"])
->middleware(['auth', 'verified'])->name("despesas.show");
Route::get("/dashboard/despesas/{id}/editar",[DespesasController::class, "edit"])
->middleware(['auth', 'verified'])->name("despesas.editar");
Route::put("/dashboard/despesas/{id}/editar", [DespesasController::class, "update"])
->middleware(['auth', 'verified'])->name("despesas.update");
Route::delete('/dashboard/despesas/{id}/delete', [DespesasController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('despesas.destroy');
Route::get("/despesas/create", [DespesasController::class, 'create'])
->middleware(['auth', 'verified'])->name('despesas.create');
Route::post("/despesas/store", [DespesasController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('despesas.store');
//End Despesas


//Tela publica Despesas 
Route::get("/publico/despesas", [PublicoDespesasController::class, "index"])
->name("publico.despesas");

Route::get("/publico/despesas/pessoal", [PublicoDespesasController::class,  "DespesasPessoal"])
->name("publico.despesas.pessoal");

Route::get("/publico/despesas/diarias/viagens", [PublicoDespesasController::class, 
"DespesasDiariaEViagens"])->name("publico.despesas.diario.viagens");

Route::get("/publico/despesas/orcamentaria", [PublicoDespesasController::class, "DespesasOrcamentaria"])
->name("publico.despesas.orcamentaria");

Route::get("publico/despesas/credor",[PublicoDespesasController::class, "Credor"])
->name("despesas.credor");

Route::get("publico/despesas/programas/acoes", [PublicoDespesasController::class, "ProgramasAcaoes"])
->name("publico.despesas.acoes");

Route::get("publico/despesas/execucao/detalhada",[PublicoDespesasController::class, "ExecucaoDetalhadaDedepesas"])
->name("publico.despesas.execucao.detalhada");
//Tela Publica Depesas End