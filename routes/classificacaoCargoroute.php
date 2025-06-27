<?php

use App\Http\Controllers\ClassifiCacaoCargoController;
use Illuminate\Support\Facades\Route;


// Rota para listar todas as classificações de cargo
Route::get("/dashboard/classificacao/cargo", [ClassifiCacaoCargoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo');

// Rota para exibir o formulário de criação de nova classificação de cargo
Route::get('/dashboard/classificacao/cargo/novo', [ClassifiCacaoCargoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo.novo');

// Rota para armazenar uma nova classificação de cargo
Route::post("/dashboard/classificacao/cargo/post", [ClassifiCacaoCargoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo.store');

// Rota para exibir o formulário de edição de uma classificação de cargo existente
Route::get("/dashboard/classificacao/edit/cargo/{id}", [ClassifiCacaoCargoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo.edit');

// Rota para atualizar uma classificação de cargo existente
Route::put("/dashboard/classificacao/{id}/put/cargo/", [ClassifiCacaoCargoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo.update');

// Rota para deletar uma classificação de cargo
Route::delete("/dashboard/classificacao/delete/{id}/cargo/", [ClassifiCacaoCargoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('classificacaocargo.destroy');
