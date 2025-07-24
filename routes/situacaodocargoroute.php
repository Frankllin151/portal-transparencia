<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SituacaoCargoController; // Certifique-se de que este controlador exista ou crie um.


// Rota para listar todas as situações de cargo
Route::get("/dashboard/situacao/cargo", [SituacaoCargoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('situacaocargo');

// Rota para exibir o formulário de criação de nova situação de cargo
Route::get('/dashboard/situacao/cargo/novo', [SituacaoCargoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('situacaocargo.novo');

// Rota para armazenar uma nova situação de cargo
Route::post("/dashboard/situacao/cargo/post", [SituacaoCargoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('situacaocargo.store');

// Rota para exibir o formulário de edição de uma situação de cargo existente
Route::get("/dashboard/situacao/edit/cargo/{id}", [SituacaoCargoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('situacaocargo.edit');

// Rota para atualizar uma situação de cargo existente
Route::put("/dashboard/situacao/{id}/put/cargo/", [SituacaoCargoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('situacaocargo.update');

// Rota para deletar uma situação de cargo
Route::delete("/dashboard/situacao/delete/{id}/cargo/", [SituacaoCargoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('situacaocargo.destroy');

