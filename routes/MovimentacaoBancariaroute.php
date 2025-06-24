<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovimentacaoBancariaController;

Route::get("/movimentacao/bancaria", [MovimentacaoBancariaController::class, "index"])
->middleware(['auth', 'verified'])->name('movimentacao');

Route::get("/dashboard/movimentacao/bancaria/{id}", [MovimentacaoBancariaController::class, "show"])
    ->middleware(['auth', 'verified'])->name('movimentacaobancaria.show');

Route::get("/dashboard/movimentacao/bancaria/{id}/edit", [MovimentacaoBancariaController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('movimentacaobancaria.edit');

Route::delete("/dashboard/movimentacao/bancaria/{id}", [MovimentacaoBancariaController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('movimentacaobancaria.delete');

Route::put("/dashboard/movimentacao/bancaria/{id}", [MovimentacaoBancariaController::class, "update"])
    ->middleware(['auth', 'verified'])->name('movimentacaobancaria.update');

Route::get("/movimentacao/bancaria/create", [MovimentacaoBancariaController::class, "create"])
->middleware(['auth', 'verified'])->name('movimentacaobancaria.novo');

Route::post("/dashboard/movimentacao/bancaria/create/post", [MovimentacaoBancariaController::class, "store"])
    ->middleware(['auth', 'verified'])->name('movimentacaobancaria.store');