<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;


Route::get("/dashboard/receita", [ReceitaController::class, "index"])
->middleware(['auth', 'verified'])->name('receita');