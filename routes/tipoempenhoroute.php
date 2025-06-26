<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoEmpenhoController;

Route::get("/dashboard/tipo/empenho", [TipoEmpenhoController::class, "index"])
    ->middleware(['auth', 'verified'])->name('tipoempenho');

Route::get('/dashboard/tipo/empenho/novo', [TipoEmpenhoController::class, "create"])
    ->middleware(['auth', 'verified'])->name('tipoempenho.novo');

Route::post("/dashboard/tipo/empenho/post", [TipoEmpenhoController::class, "store"])
    ->middleware(['auth', 'verified'])->name('tipoempenho.store');


Route::get("/dashboard/tipo/edit/empenho/{id}", [TipoEmpenhoController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tipoempenho.edit');


Route::put("/dashboard/tipo/{id}/put/empenho/", [TipoEmpenhoController::class, "update"])
    ->middleware(['auth', 'verified'])->name('tipoempenho.update');


Route::delete("/dashboard/tipo/delete/{id}/empenho/", [TipoEmpenhoController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tipoempenho.destroy');


