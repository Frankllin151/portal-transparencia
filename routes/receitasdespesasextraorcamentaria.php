<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceiDesPexTraController;

Route::get("/dashboard/receita/despesa/extra/orcamentaria", 
[ReceiDesPexTraController::class, "index"])
->middleware(['auth', 'verified'])->name('despreceitaex');

Route::get("/dashboard/extra/receita/{id}/orcamentaria", 
[ReceiDesPexTraController::class, "show"])
->middleware(['auth', 'verified'])->name('despreceitaex.show');


Route::get("/dashboard/extra/novo/receita/despesa", 
[ReceiDesPexTraController::class, "create"])
->middleware(['auth', 'verified'])->name('despreceitaex.novo');
Route::post("/dashboard/extra/novo/receita/despesa", [ReceiDesPexTraController::class, "store"])
->middleware(['auth', 'verified'])->name('despreceitaex.store');

Route::get("/dashboard/extra/orcamentaria/{id}/receita", 
[ReceiDesPexTraController::class, "edit"])
->middleware(['auth', 'verified'])->name('despreceitaex.edit');
Route::put("/dashboard/extra/orcamentaria/{id}/receita", 
[ReceiDesPexTraController::class, "update"])
->middleware(['auth', 'verified'])->name('despreceitaex.update');


Route::delete("/dashboard/extra/{id}/orcamentaria/receita", 
[ReceiDesPexTraController::class, "destroy"])
->middleware(['auth', 'verified'])->name('despreceitaex.destroy');