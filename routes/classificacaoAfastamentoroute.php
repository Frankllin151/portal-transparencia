<?php

use App\Http\Controllers\ClassificacaoAfastamentoController;
use Illuminate\Support\Facades\Route;


// Rota para listar todas as classificações de afastamento
Route::get("/dashboard/classificacao/afastamento", [ClassificacaoAfastamentoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento');

// Rota para exibir o formulário de criação de nova classificação de afastamento
Route::get('/dashboard/classificacao/afastamento/novo', [ClassificacaoAfastamentoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento.novo');

// Rota para armazenar uma nova classificação de afastamento
Route::post("/dashboard/classificacao/afastamento/post", [ClassificacaoAfastamentoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento.store');

// Rota para exibir o formulário de edição de uma classificação de afastamento existente
Route::get("/dashboard/classificacao/edit/afastamento/{id}", [ClassificacaoAfastamentoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento.edit');

// Rota para atualizar uma classificação de afastamento existente
Route::put("/dashboard/classificacao/{id}/put/afastamento/", [ClassificacaoAfastamentoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento.update');

// Rota para deletar uma classificação de afastamento
Route::delete("/dashboard/classificacao/delete/{id}/afastamento/", [ClassificacaoAfastamentoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('classificacaoafastamento.destroy');
