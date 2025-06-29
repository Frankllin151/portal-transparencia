<?php

use App\Http\Controllers\ModalidadeLicitacaoController;
use Illuminate\Support\Facades\Route;


// Rota para listar todas as modalidades de licitação
Route::get("/dashboard/modalidade/licitacao", [ModalidadeLicitacaoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao');

// Rota para exibir o formulário de criação de nova modalidade de licitação
Route::get('/dashboard/modalidade/licitacao/novo', [ModalidadeLicitacaoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao.novo');

// Rota para armazenar uma nova modalidade de licitação
Route::post("/dashboard/modalidade/licitacao/post", [ModalidadeLicitacaoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao.store');

// Rota para exibir o formulário de edição de uma modalidade de licitação existente
Route::get("/dashboard/modalidade/edit/licitacao/{id}", [ModalidadeLicitacaoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao.edit');

// Rota para atualizar uma modalidade de licitação existente
Route::put("/dashboard/modalidade/{id}/put/licitacao/", [ModalidadeLicitacaoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao.update');

// Rota para deletar uma modalidade de licitação
Route::delete("/dashboard/modalidade/delete/{id}/licitacao/", [ModalidadeLicitacaoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('modalidadelicitacao.destroy');

