<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassificacaoController; 


// Rota para listar todas as classificações
Route::get("/dashboard/classificacao", [ClassificacaoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('classificacao');

// Rota para exibir o formulário de criação de nova classificação
Route::get('/dashboard/classificacao/novo', [ClassificacaoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('classificacao.novo');

// Rota para armazenar uma nova classificação
Route::post("/dashboard/classificacao/post", [ClassificacaoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('classificacao.store');

// Rota para exibir o formulário de edição de uma classificação existente
Route::get("/dashboard/classificacao/edit/{id}", [ClassificacaoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('classificacao.edit');

// Rota para atualizar uma classificação existente
Route::put("/dashboard/classificacao/{id}/put/", [ClassificacaoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('classificacao.update');

// Rota para deletar uma classificação
Route::delete("/dashboard/classificacao/delete/{id}/", [ClassificacaoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('classificacao.destroy');

