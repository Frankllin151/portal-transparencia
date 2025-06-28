<?php

use App\Http\Controllers\ServidoresController;
use Illuminate\Support\Facades\Route;


// Rota para listar todos os servidores
Route::get("/dashboard/servidores", [ServidoresController::class, "index"])
    ->middleware(['auth', 'verified'])
    ->name('servidores');

// Rota para mostrar o formulário de criação de servidor
Route::get("/servidores/create", [ServidoresController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('servidores.create');

// Rota para armazenar um novo servidor
Route::post("/servidores/store", [ServidoresController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('servidores.store');

// Rota para exibir um servidor específico
Route::get('/dashboard/servidores/{id}', [ServidoresController::class, "show"])
    ->middleware(['auth', 'verified'])
    ->name("servidores.show");

// Rota para mostrar o formulário de edição de servidor
Route::get("/dashboard/servidores/{id}/editar", [ServidoresController::class, "edit"])
    ->middleware(['auth', 'verified'])
    ->name("servidores.edit");

// Rota para atualizar um servidor existente
Route::put("/dashboard/servidores/{id}/editar", [ServidoresController::class, "update"])
    ->middleware(['auth', 'verified'])
    ->name("servidores.update");

// Rota para excluir um servidor
Route::delete('/dashboard/servidores/{id}/delete', [ServidoresController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('servidores.destroy');
