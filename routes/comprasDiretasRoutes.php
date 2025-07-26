<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicoComprasDiretas;
use App\Http\Controllers\CompraDiretaController;

// Rota para listar todas as compras diretas
Route::get("/dashboard/comprasdiretas", [CompraDiretaController::class, "index"])
    ->middleware(['auth', 'verified'])
    ->name('comprasdiretas');

// Rota para mostrar o formulário de criação de compra direta
Route::get("/comprasdiretas/create", [CompraDiretaController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('comprasdiretas.create');

// Rota para armazenar uma nova compra direta
Route::post("/comprasdiretas/store", [CompraDiretaController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('comprasdiretas.store');

// Rota para exibir uma compra direta específica
Route::get('/dashboard/comprasdiretas/{id}', [CompraDiretaController::class, "show"])
    ->middleware(['auth', 'verified'])
    ->name("comprasdiretas.show");

// Rota para mostrar o formulário de edição de compra direta
Route::get("/dashboard/comprasdiretas/{id}/editar", [CompraDiretaController::class, "edit"])
    ->middleware(['auth', 'verified'])
    ->name("comprasdiretas.edit");

// Rota para atualizar uma compra direta existente
Route::put("/dashboard/comprasdiretas/{id}/editar", [CompraDiretaController::class, "update"])
    ->middleware(['auth', 'verified'])
    ->name("comprasdiretas.update");

// Rota para excluir uma compra direta
Route::delete('/dashboard/comprasdiretas/{id}/delete', [CompraDiretaController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('comprasdiretas.destroy');



/**telas publicas */
Route::get("/publico/compras/diretas", [PublicoComprasDiretas::class, "index"])
->name("publico.compras.diretas");

Route::get("/publico/compras/diretas/{id}", [PublicoComprasDiretas::class, "show"])
->name("publico.compras.diretas.id");