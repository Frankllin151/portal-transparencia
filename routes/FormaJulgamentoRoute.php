<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaJulgamentoController;// Certifique-se de que este controlador exista ou crie um.


// Rota para listar todas as formas de julgamento
Route::get("/dashboard/forma/julgamento", [FormaJulgamentoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('formajulgamento');

// Rota para exibir o formulário de criação de nova forma de julgamento
Route::get('/dashboard/forma/julgamento/novo', [FormaJulgamentoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('formajulgamento.novo');

// Rota para armazenar uma nova forma de julgamento
Route::post("/dashboard/forma/julgamento/post", [FormaJulgamentoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('formajulgamento.store');

// Rota para exibir o formulário de edição de uma forma de julgamento existente
Route::get("/dashboard/forma/edit/julgamento/{id}", [FormaJulgamentoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('formajulgamento.edit');

// Rota para atualizar uma forma de julgamento existente
Route::put("/dashboard/forma/{id}/put/julgamento/", [FormaJulgamentoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('formajulgamento.update');

// Rota para deletar uma forma de julgamento
Route::delete("/dashboard/forma/delete/{id}/julgamento/", [FormaJulgamentoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('formajulgamento.destroy');

