
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesasController;
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


