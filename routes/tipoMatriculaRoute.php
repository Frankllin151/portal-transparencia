<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoMatriculaController; // Certifique-se de que esta linha está presente
// use App\Http\Controllers\TipoPoderController; // Mantenha esta linha se você ainda usa TipoPoderController

/*
|--------------------------------------------------------------------------
| Rotas para TipoMatricula
|--------------------------------------------------------------------------
*/

// Rota para listar todos os Tipos de Matrícula (equivalente ao index)
Route::get("/dashboard/tipo/matricula",[TipoMatriculaController::class, "index"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.index'); // Alterado para .index para clareza

// Rota para exibir o formulário de criação de um novo Tipo de Matrícula
Route::get('/dashboard/tipo/matricula/novo', [TipoMatriculaController::class, "create"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.novo');

// Rota para armazenar um novo Tipo de Matrícula
Route::post("/dashboard/tipo/matricula/post", [TipoMatriculaController::class, "store"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.store');

// Rota para exibir o formulário de edição de um Tipo de Matrícula existente
Route::get("/dashboard/tipo/edit/matricula/{id}", [TipoMatriculaController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.edit');

// Rota para atualizar um Tipo de Matrícula existente
Route::put("/dashboard/tipo/{id}/put/matricula/", [TipoMatriculaController::class, "update"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.update');

// Rota para excluir um Tipo de Matrícula
Route::delete("/dashboard/tipo/delete/{id}/matricula/", [TipoMatriculaController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tipomatricula.delete');