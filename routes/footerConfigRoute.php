<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooterController;


Route::get("/dashboard/footer-config", [FooterController::class, "show"])->
middleware(['auth', 'verified'])->name('footer.config');

Route::post("/dashboard/footer-config/edit-and-store", [FooterController::class, "DadosCreate"])->
middleware(['auth', 'verified'])->name('footer.store');


Route::get("/dashboard/footer-config/edit/{id}", [FooterController::class, "show"])->
middleware(['auth', 'verified'])->name('footer.editar');

Route::put("/dashboard/footer-config/update/{id}", [FooterController::class, "update"])
->middleware(['auth', 'verified'])->name('footer.update');