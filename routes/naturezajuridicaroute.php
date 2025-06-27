<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\NaturezaJuridicaController;


// Rota para listar todas as naturezas jurídicas
Route::get("/dashboard/natureza/juridica", [NaturezaJuridicaController::class, "index"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica');

// Rota para exibir o formulário de criação de nova natureza jurídica
Route::get('/dashboard/natureza/juridica/novo', [NaturezaJuridicaController::class, "create"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica.novo');

// Rota para armazenar uma nova natureza jurídica
Route::post("/dashboard/natureza/juridica/post", [NaturezaJuridicaController::class, "store"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica.store');

// Rota para exibir o formulário de edição de uma natureza jurídica existente
Route::get("/dashboard/natureza/edit/juridica/{id}", [NaturezaJuridicaController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica.edit');

// Rota para atualizar uma natureza jurídica existente
Route::put("/dashboard/natureza/{id}/put/juridica/", [NaturezaJuridicaController::class, "update"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica.update');

// Rota para deletar uma natureza jurídica
Route::delete("/dashboard/natureza/delete/{id}/juridica/", [NaturezaJuridicaController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('naturezajuridica.destroy');

