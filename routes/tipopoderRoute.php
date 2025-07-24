<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TipoPoderController;

Route::get("/dashboard/tipo/poder",[TipoPoderController::class, "index"])
->middleware(['auth', 'verified'])->name('tipopoder');

Route::get('/dashboard/tipo/poder/novo', [TipoPoderController::class, "create"])
->middleware(['auth', 'verified'])->name('tipopoder.novo');

Route::post("/dashboard/tipo/poder/post", [TipoPoderController::class, "store"])
->middleware(['auth', 'verified'])->name('tipopoder.store');

Route::get("/dashboard/tipo/edit/poder/{id}", [TipoPoderController::class, "edit"])
->middleware(['auth', 'verified'])->name('tipopoder.edit');

Route::put("/dashboard/tipo/{id}/put/poder/", [TipoPoderController::class, "update"])
->middleware(['auth', 'verified'])->name('tipopoder.update');

Route::delete("/dashboard/tipo/delete/{id}/poder/", [TipoPoderController::class, "destroy"])
->middleware(['auth', 'verified'])->name('tipopoder.delete');
