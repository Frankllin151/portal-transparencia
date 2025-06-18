<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessosLicitatoriosController;

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