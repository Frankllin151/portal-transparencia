<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaturezaReceitaController;


Route::get('/natureza/receita', [NaturezaReceitaController::class, "index"])
->middleware(['auth', 'verified'])->name('natureza');

Route::get("/natureza/{id}/receita" , [NaturezaReceitaController::class, "show"])
->middleware(['auth', 'verified'])->name('naturezareceita.show');

Route::get("/natureza/receita/edit/{id}", [NaturezaReceitaController::class, "edit"])
->middleware(['auth', 'verified'])->name("naturezareceita.edit");

Route::put("/natureza/receita/edit/{id}", [NaturezaReceitaController::class, "update"])
->middleware(['auth', 'verified'])->name("naturezareceita.update");

Route::delete("/natureza/receita/delete/{id}",[NaturezaReceitaController::class, "destroy"])
->middleware(['auth', 'verified'])->name("naturezareceita.delete");

Route::get("/natureza/receita/novo", [NaturezaReceitaController::class, "create"])
->middleware(['auth', 'verified'])
->name("natureza.create");

Route::post("/natureza/receita/novo/post", [NaturezaReceitaController::class, "store"])
->middleware(['auth', 'verified'])->name("natureza.store");


