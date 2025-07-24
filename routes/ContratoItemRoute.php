<?php


use App\Http\Controllers\ContratoItemController;
use Illuminate\Support\Facades\Route;


// Rota para listar todos os itens de contrato
Route::get("/dashboard/contratos-items", [ContratoItemController::class, "index"])
    ->middleware(['auth', 'verified'])
    ->name('contratos_item');

// Rota para mostrar o formulário de criação de item de contrato
Route::get("/dashboard/contratos-items/create", [ContratoItemController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('contratos_item.create');

// Rota para armazenar um novo item de contrato
Route::post("/dashboard/contratos-items/store", [ContratoItemController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('contratos_item.store');

// Rota para exibir um item de contrato específico
Route::get('/dashboard/contratos-items/{id}', [ContratoItemController::class, "show"])
    ->middleware(['auth', 'verified'])
    ->name("contratos_item.show");

// Rota para mostrar o formulário de edição de item de contrato
Route::get("/dashboard/contratos-items/{id}/edit", [ContratoItemController::class, "edit"])
    ->middleware(['auth', 'verified'])
    ->name("contratos_item.edit");

// Rota para atualizar um item de contrato existente
Route::put("/dashboard/contratos-items/{id}/update", [ContratoItemController::class, "update"])
    ->middleware(['auth', 'verified'])
    ->name("contratos_item.update");

// Rota para excluir um item de contrato
Route::delete('/dashboard/contratos-items/{id}/delete', [ContratoItemController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('contratos_item.destroy');
