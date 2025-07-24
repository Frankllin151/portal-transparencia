<?php

use App\Http\Controllers\LotacaoController;
use Illuminate\Support\Facades\Route;


// Rota para listar todas as lotações
Route::get("/dashboard/lotacao", [LotacaoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('lotacao');

// Rota para exibir o formulário de criação de nova lotação
Route::get('/dashboard/lotacao/novo', [LotacaoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('lotacao.novo');

// Rota para armazenar uma nova lotação
Route::post("/dashboard/lotacao/post", [LotacaoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('lotacao.store');

// Rota para exibir o formulário de edição de uma lotação existente
Route::get("/dashboard/lotacao/edit/{id}", [LotacaoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('lotacao.edit');

// Rota para atualizar uma lotação existente
Route::put("/dashboard/lotacao/{id}/put/", [LotacaoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('lotacao.update');

// Rota para deletar uma lotação
Route::delete("/dashboard/lotacao/delete/{id}/", [LotacaoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('lotacao.destroy');
