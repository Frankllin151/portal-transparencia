<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\NomeOrgaoController;



// Rota para listar todos os nomes de órgão
Route::get("/dashboard/nome/orgao", [NomeOrgaoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('nomeorgao');

// Rota para exibir o formulário de criação de novo nome de órgão
Route::get('/dashboard/nome/orgao/novo', [NomeOrgaoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('nomeorgao.novo');

// Rota para armazenar um novo nome de órgão
Route::post("/dashboard/nome/orgao/post", [NomeOrgaoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('nomeorgao.store');

// Rota para exibir o formulário de edição de um nome de órgão existente
Route::get("/dashboard/nome/edit/orgao/{id}", [NomeOrgaoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('nomeorgao.edit');

// Rota para atualizar um nome de órgão existente
Route::put("/dashboard/nome/{id}/put/orgao/", [NomeOrgaoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('nomeorgao.update');

// Rota para deletar um nome de órgão
Route::delete("/dashboard/nome/delete/{id}/orgao/", [NomeOrgaoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('nomeorgao.destroy');