<?php
use App\Http\Controllers\TipoAcaoControlller;
use Illuminate\Support\Facades\Route;



// Rota para listar todos os tipos de ação
Route::get("/dashboard/tipo/acao", [TipoAcaoControlller::class, "index"])
    ->middleware(['auth', 'verified'])->name('tipoacao');

// Rota para exibir o formulário de criação de novo tipo de ação
Route::get('/dashboard/tipo/acao/novo', [TipoAcaoControlller::class, "create"])
    ->middleware(['auth', 'verified'])->name('tipoacao.novo');

// Rota para armazenar um novo tipo de ação
Route::post("/dashboard/tipo/acao/post", [TipoAcaoControlller::class, "store"])
    ->middleware(['auth', 'verified'])->name('tipoacao.store');

// Rota para exibir o formulário de edição de um tipo de ação existente
Route::get("/dashboard/tipo/edit/acao/{id}", [TipoAcaoControlller::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tipoacao.edit');

// Rota para atualizar um tipo de ação existente
Route::put("/dashboard/tipo/{id}/put/acao/", [TipoAcaoControlller::class, "update"])
    ->middleware(['auth', 'verified'])->name('tipoacao.update');

// Rota para deletar um tipo de ação
Route::delete("/dashboard/tipo/delete/{id}/acao/", [TipoAcaoControlller::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tipoacao.destroy');
