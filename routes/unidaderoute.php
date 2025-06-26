<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeController;


Route::get('/dashboard/unidade', [UnidadeController::class, "index"])
->middleware(['auth', 'verified'])->name('unidade');

Route::get("/dashboard/unidade/novo",[UnidadeController::class, "create"])
->middleware(['auth', 'verified'])->name('unidade.novo');

Route::post("/dashboard/unidade/novo/post",[UnidadeController::class, "store"])
->middleware(['auth', 'verified'])->name('unidade.store');

Route::get("/dashboard/unidade/{id}/edit",[UnidadeController::class, "edit"])
->middleware(['auth', 'verified'])->name('unidade.edit');

Route::put("/dashboard/unidade/{id}/edit",[UnidadeController::class, "update"])
->middleware(['auth', 'verified'])->name('unidade.update');

Route::delete("/dashboard/unidade/{id}/delete",[UnidadeController::class, "destroy"])
->middleware(['auth', 'verified'])->name('unidade.destroy');