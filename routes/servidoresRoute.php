<?php

use App\Http\Controllers\ServidoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicoServidoresController;

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


//Tela publico  
Route::get("/publico/servidores", [PublicoServidoresController::class,"index"])
->name("publico.servidores");
// 1. Cargos e Vencimentos
Route::get("/publico/servidores/cargos-vencimentos", [PublicoServidoresController::class, "cargosVencimentos"])
->name("publico.servidores.cargos-vencimentos");

// 2. Servidores Remunerações
Route::get("/publico/servidores/remuneracoes", [PublicoServidoresController::class, "remuneracoes"])
->name("publico.servidores.remuneracoes");

// 3. Servidores Públicos
Route::get("/publico/servidores/publicos", [PublicoServidoresController::class, "servidoresPublicos"])
->name("publico.servidores.publicos");

// 4. Servidores Públicos Ativos
Route::get("/publico/servidores/publicos-ativos", [PublicoServidoresController::class, "servidoresPublicosAtivos"])
->name("publico.servidores.publicos-ativos");
// Tela end