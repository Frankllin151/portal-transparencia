<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VinculoEmpregaticioController; // Certifique-se de que este controlador exista ou crie um.


// Rota para listar todos os vínculos empregatícios
Route::get("/dashboard/vinculo/empregaticio", [VinculoEmpregaticioController::class, "index"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio');

// Rota para exibir o formulário de criação de novo vínculo empregatício
Route::get('/dashboard/vinculo/empregaticio/novo', [VinculoEmpregaticioController::class, "create"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio.novo');

// Rota para armazenar um novo vínculo empregatício
Route::post("/dashboard/vinculo/empregaticio/post", [VinculoEmpregaticioController::class, "store"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio.store');

// Rota para exibir o formulário de edição de um vínculo empregatício existente
Route::get("/dashboard/vinculo/edit/empregaticio/{id}", [VinculoEmpregaticioController::class, "edit"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio.edit');

// Rota para atualizar um vínculo empregatício existente
Route::put("/dashboard/vinculo/{id}/put/empregaticio/", [VinculoEmpregaticioController::class, "update"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio.update');

// Rota para deletar um vínculo empregatício
Route::delete("/dashboard/vinculo/delete/{id}/empregaticio/", [VinculoEmpregaticioController::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('vinculoempregaticio.destroy');

