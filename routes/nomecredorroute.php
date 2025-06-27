<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\NomeCredorController;


// Rota para listar todos os nomes de credor
Route::get("/dashboard/nome/credor", [NomeCredorController::class, "index"])
    ->middleware(['auth', 'verified'])->name('nomecredor');

// Rota para exibir o formulário de criação de novo nome de credor
Route::get('/dashboard/nome/credor/novo', [NomeCredorController::class, "create"])
    ->middleware(['auth', 'verified'])->name('nomecredor.novo');

// Rota para armazenar um novo nome de credor
Route::post("/dashboard/nome/credor/post", [NomeCredorController::class, "store"])
    ->middleware(['auth', 'verified'])->name('nomecredor.store');

// Rota para exibir o formulário de edição de um nome de credor existente
Route::get("/dashboard/nome/edit/credor/{id}", [NomeCredorController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('nomecredor.edit');

// Rota para atualizar um nome de credor existente
Route::put("/dashboard/nome/{id}/put/credor/", [NomeCredorController::class, "update"])
    ->middleware(['auth', 'verified'])->name('nomecredor.update');

// Rota para deletar um nome de credor
Route::delete("/dashboard/nome/delete/{id}/credor/", [NomeCredorController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('nomecredor.destroy');

