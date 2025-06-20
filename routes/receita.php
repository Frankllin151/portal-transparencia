<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;


Route::get("/dashboard/receita", [ReceitaController::class, "index"])
->middleware(['auth', 'verified'])->name('receita');
Route::get("/dashboard/receita/{id}/showid", [ReceitaController::class, "show"])
->middleware(['auth', 'verified'])->name("receita.show");
Route::get("/dashboard/receita/{id}/edit", [ReceitaController::class, "edit"])
->middleware(['auth', 'verified'])->name("receita.edit");
Route::put("/dashboard/receita/{id}/update",[ReceitaController::class, "update"])
->middleware(['auth', 'verified'])->name("receita.update");
Route::get("/dashboard/novo/receita", [ReceitaController::class, "create"])
->middleware(['auth', 'verified'])->name("receita.novo");
Route::post("/dashboard/novo/post", [ReceitaController::class, "store"])
->middleware(['auth', 'verified'])->name("receita.store");
Route::delete("/dashboard/delete/{id}/receita",[ReceitaController::class, "destroy"])
->middleware(['auth', 'verified'])->name("receita.delete");