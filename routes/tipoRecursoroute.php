<?php

use App\Http\Controllers\TipoRecursoControlller;
use Illuminate\Support\Facades\Route;

Route::get("/dashboard/tipo/recurso", [TipoRecursoControlller::class, "index"])
    ->middleware(['auth', 'verified'])->name('tiporecurso');

Route::get('/dashboard/tipo/recurso/novo', [TipoRecursoControlller::class, "create"])
    ->middleware(['auth', 'verified'])->name('tiporecurso.novo');


Route::post("/dashboard/tipo/recurso/post", [TipoRecursoControlller::class, "store"])
    ->middleware(['auth', 'verified'])->name('tiporecurso.store');


Route::get("/dashboard/tipo/edit/recurso/{id}", [TipoRecursoControlller::class, "edit"])
    ->middleware(['auth', 'verified'])->name('tiporecurso.edit');

Route::put("/dashboard/tipo/{id}/put/recurso/", [TipoRecursoControlller::class, "update"])
    ->middleware(['auth', 'verified'])->name('tiporecurso.update');


Route::delete("/dashboard/tipo/delete/{id}/recurso/", [TipoRecursoControlller::class, "destroy"])
    ->middleware(['auth', 'verified'])->name('tiporecurso.destroy');