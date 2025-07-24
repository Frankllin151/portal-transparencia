<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoContaController; // Certifique-se de que este controlador exista ou crie um.


// Rota para listar todos os tipos de conta
Route::get("/dashboard/tipo/conta", [TipoContaController::class, "index"])
    ->middleware(['auth', 'verified'])->name('tipoconta');

// Rota para exibir o formulário de criação de novo tipo de conta
Route::get('/dashboard/tipo/conta/novo', [TipoContaController::class, "create"])
    ->middleware(['auth', 'verified'])->name('tipoconta.novo');

// Rota para armazenar um novo tipo de conta
Route::post("/dashboard/tipo/conta/post", [TipoContaController::class, "store"])
    ->middleware(['auth', 'verified'])->name('tipoconta.store');

// Rota para exibir o formulário de edição de um tipo de conta existente
Route::get("/dashboard/tipo/edit/conta/{id}", [TipoContaController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tipoconta.edit');

// Rota para atualizar um tipo de conta existente
Route::put("/dashboard/tipo/{id}/put/conta/", [TipoContaController::class, "update"])
    ->middleware(['auth', 'verified'])->name('tipoconta.update');

// Rota para deletar um tipo de conta
Route::delete("/dashboard/tipo/delete/{id}/conta/", [TipoContaController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tipoconta.destroy');

