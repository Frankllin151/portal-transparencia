<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaIngressoController; // Certifique-se de que este controlador exista ou crie um.


// Rota para listar todas as formas de ingresso
Route::get("/dashboard/forma/ingresso", [FormaIngressoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('formaingresso');

// Rota para exibir o formulário de criação de nova forma de ingresso
Route::get('/dashboard/forma/ingresso/novo', [FormaIngressoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('formaingresso.novo');

// Rota para armazenar uma nova forma de ingresso
Route::post("/dashboard/forma/ingresso/post", [FormaIngressoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('formaingresso.store');

// Rota para exibir o formulário de edição de uma forma de ingresso existente
Route::get("/dashboard/forma/edit/ingresso/{id}", [FormaIngressoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('formaingresso.edit');

// Rota para atualizar uma forma de ingresso existente
Route::put("/dashboard/forma/{id}/put/ingresso/", [FormaIngressoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('formaingresso.update');

// Rota para deletar uma forma de ingresso
Route::delete("/dashboard/forma/delete/{id}/ingresso/", [FormaIngressoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('formaingresso.destroy');

