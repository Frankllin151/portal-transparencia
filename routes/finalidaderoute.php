<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinalidadeController;
// Rota para listar todas as finalidades
Route::get("/dashboard/finalidade", [FinalidadeController::class, "index"])
    ->middleware(['auth', 'verified'])->name('finalidade');

// Rota para exibir o formulário de criação de nova finalidade
Route::get('/dashboard/finalidade/novo', [FinalidadeController::class, "create"])
    ->middleware(['auth', 'verified'])->name('finalidade.novo');

// Rota para armazenar uma nova finalidade
Route::post("/dashboard/finalidade/post", [FinalidadeController::class, "store"])
    ->middleware(['auth', 'verified'])->name('finalidade.store');

// Rota para exibir o formulário de edição de uma finalidade existente
Route::get("/dashboard/finalidade/edit/{id}", [FinalidadeController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('finalidade.edit');

// Rota para atualizar uma finalidade existente
Route::put("/dashboard/finalidade/{id}/put/", [FinalidadeController::class, "update"])
    ->middleware(['auth', 'verified'])->name('finalidade.update');

// Rota para deletar uma finalidade
Route::delete("/dashboard/finalidade/delete/{id}/", [FinalidadeController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('finalidade.destroy');
