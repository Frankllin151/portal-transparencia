<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntidadeController;
use App\Models\Entidade;

Route::get("/dashboard/entidade", [EntidadeController::class, "index"])
->middleware(['auth', 'verified'])->name('entidade');

Route::get("/dashboard/entidade/novo", [EntidadeController::class, "create"])
->middleware(['auth', 'verified'])->name('entidade.novo');

Route::post("/dashboard/entidade/novo/post", [EntidadeController::class, "store"])
->middleware(['auth', 'verified'])->name('entidade.store');

Route::get("/dashboard/entidade/{id}", [EntidadeController::class, "edit"])
->middleware(['auth', 'verified'])->name('entidade.edit');

Route::put("/dashboard/entidade/{id}/put", [EntidadeController::class, "update"])
->middleware(['auth', 'verified'])->name('entidade.update');

Route::delete("/dashboard/entidade/{id}/delete", [EntidadeController::class, "destroy"])
->middleware(['auth', 'verified'])->name('entidade.destroy');