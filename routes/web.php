<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DespesasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// configuração 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// End configuração 

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

require __DIR__.'/auth.php';
