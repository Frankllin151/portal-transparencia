<?php

use App\Http\Controllers\ContratoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicoContratoController;

// Rota para listar todos os contratos
Route::get("/dashboard/contratos", [ContratoController::class, "index"])
    ->middleware(['auth', 'verified'])
    ->name('contratos');

// Rota para mostrar o formulário de criação de contrato
Route::get("/contratos/create", [ContratoController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('contratos.create');

// Rota para armazenar um novo contrato
Route::post("/contratos/store", [ContratoController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('contratos.store');

// Rota para exibir um contrato específico
Route::get('/dashboard/contratos/{id}', [ContratoController::class, "show"])
    ->middleware(['auth', 'verified'])
    ->name("contratos.show");

// Rota para mostrar o formulário de edição de contrato
Route::get("/dashboard/contratos/{id}/editar", [ContratoController::class, "edit"])
    ->middleware(['auth', 'verified'])
    ->name("contratos.edit");

// Rota para atualizar um contrato existente
Route::put("/dashboard/contratos/{id}/editar", [ContratoController::class, "update"])
    ->middleware(['auth', 'verified'])
    ->name("contratos.update");

// Rota para excluir um contrato
Route::delete('/dashboard/contratos/{id}/delete', [ContratoController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('contratos.destroy');



//Tela publica
Route::get("/publico/contrato",
 [PublicoContratoController::class, "index"] )->name("pulico.contrato");


// 2. Contratos
Route::get("/publico/contrato/lista", [PublicoContratoController::class, "contratos"])
    ->name("publico.contrato.lista");

// 3. Fiscais dos Contratos
Route::get("/publico/contrato/fiscais", [PublicoContratoController::class, "fiscais"])
    ->name("publico.contrato.fiscais");
// Tela publica end