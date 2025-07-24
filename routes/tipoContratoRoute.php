<?php

use App\Http\Controllers\TipoContratoController;
use Illuminate\Support\Facades\Route;



// Rota para listar todos os tipos de contrato
Route::get("/dashboard/tipo/contrato", [TipoContratoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('tipocontrato');

// Rota para exibir o formulário de criação de novo tipo de contrato
Route::get('/dashboard/tipo/contrato/novo', [TipoContratoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('tipocontrato.novo');

// Rota para armazenar um novo tipo de contrato
Route::post("/dashboard/tipo/contrato/post", [TipoContratoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('tipocontrato.store');

// Rota para exibir o formulário de edição de um tipo de contrato existente
Route::get("/dashboard/tipo/edit/contrato/{id}", [TipoContratoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tipocontrato.edit');

// Rota para atualizar um tipo de contrato existente
Route::put("/dashboard/tipo/{id}/put/contrato/", [TipoContratoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('tipocontrato.update');

// Rota para deletar um tipo de contrato
Route::delete("/dashboard/tipo/delete/{id}/contrato/", [TipoContratoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tipocontrato.destroy');
