<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FonteRecursoController; // Certifique-se de que este controlador exista ou crie um.

// Rota para listar todas as fontes de recurso
Route::get("/dashboard/fonte/recurso", [FonteRecursoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('fonterecurso');

// Rota para exibir o formulário de criação de nova fonte de recurso
Route::get('/dashboard/fonte/recurso/novo', [FonteRecursoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('fonterecurso.novo');

// Rota para armazenar uma nova fonte de recurso
Route::post("/dashboard/fonte/recurso/post", [FonteRecursoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('fonterecurso.store');

// Rota para exibir o formulário de edição de uma fonte de recurso existente
Route::get("/dashboard/fonte/edit/recurso/{id}", [FonteRecursoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('fonterecurso.edit');

// Rota para atualizar uma fonte de recurso existente
Route::put("/dashboard/fonte/{id}/put/recurso/", [FonteRecursoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('fonterecurso.update');

// Rota para deletar uma fonte de recurso
Route::delete("/dashboard/fonte/delete/{id}/recurso/", [FonteRecursoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('fonterecurso.destroy');

