<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessosLicitatoriosController;
use App\Http\Controllers\PublicoProcessosLicitatoriosController;

Route::get('/processo/licitatorio',[ProcessosLicitatoriosController::class, 'index'])
->middleware(['auth', 'verified'])->name('processo');
Route::get("/processo/{id}/licitatorio", [ProcessosLicitatoriosController::class, 'show'])
->middleware(['auth', 'verified'])->name('processo.show');
Route::get('/processo/{id}/editar', [ProcessosLicitatoriosController::class, "edit"])
->middleware(['auth', 'verified'])->name('processo.edit');
Route::put('/processo/{id}/update', [ProcessosLicitatoriosController::class, "update"])
->middleware(['auth', 'verified'])->name('processo.update');
Route::get("/processo/create",[ProcessosLicitatoriosController::class, 'create'])
->middleware(['auth', 'verified'])->name('processo.create');
Route::post("/processo/create",[ProcessosLicitatoriosController::class, 'store'])
->middleware(['auth', 'verified'])->name('processo.store');
Route::delete('/processo/delete/{id}', [ProcessosLicitatoriosController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('processo.delete');



/// Telas publicas 
Route::get("publico/processos", [PublicoProcessosLicitatoriosController::class, "index"])
->name("publico.processos");


// 1. Dispensa de Licitação
Route::get("publico/processos/dispensa", [PublicoProcessosLicitatoriosController::class, "dispensa"])
    ->name("publico.processos.dispensa");

// 2. Processos Licitatórios (ativos ou em andamento)
Route::get("publico/processos/licitacoes", [PublicoProcessosLicitatoriosController::class, "licitacoes"])
    ->name("publico.processos.licitacoes");

// 3. Processos Licitatórios Finalizados
Route::get("publico/processos/finalizados", [PublicoProcessosLicitatoriosController::class, "finalizados"])
    ->name("publico.processos.finalizados");
// Telas publicas end