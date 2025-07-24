<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaEmpenhoController;


Route::get("/dashboard/categoria/empenho", [CategoriaEmpenhoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho');

Route::get('/dashboard/categoria/empenho/novo', [CategoriaEmpenhoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho.novo');

Route::post("/dashboard/categoria/empenho/post", [CategoriaEmpenhoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho.store');

Route::get("/dashboard/categoria/edit/empenho/{id}", [CategoriaEmpenhoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho.edit');

Route::put("/dashboard/categoria/{id}/put/empenho/", [CategoriaEmpenhoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho.update');

Route::delete("/dashboard/categoria/delete/{id}/empenho/", [CategoriaEmpenhoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('categoriaempenho.destroy');