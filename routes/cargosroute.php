<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\CargosController;

Route::get("/dashboard/cargos", [CargosController::class, "index"])
->middleware(['auth', 'verified'])->name('cargos');

Route::get("/dashboard/cargos/{id}", [CargosController::class, "show"])
    ->middleware(['auth', 'verified'])
    ->name('cargos.show');


Route::get("/dashboard/cargos/{id}/edit", [CargosController::class, "edit"])
    ->middleware(['auth', 'verified'])
    ->name('cargos.edit');


Route::put("/dashboard/cargos/{id}", [CargosController::class, "update"])
    ->middleware(['auth', 'verified'])
    ->name('cargos.update');

Route::delete("/dashboard/cargos/{id}", [CargosController::class, "destroy"])
    ->middleware(['auth', 'verified'])
    ->name('cargos.delete');