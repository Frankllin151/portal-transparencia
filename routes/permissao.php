<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerPermission; // Adicione esta linha


// Rotas para Permissão
Route::get('/dashboard/permissoes', [ControllerPermission::class, 'index'])
    ->middleware(['auth', 'verified'])->name('permissoes');

Route::get('/dashboard/permissoes/novo', [ControllerPermission::class, 'create'])
    ->middleware(['auth', 'verified'])->name('permissoes.novo');

Route::post('/dashboard/permissoes/n', [ControllerPermission::class, 'store'])
    ->middleware(['auth', 'verified'])->name('permissoes.store');

Route::get('/dashboard/permissoes/{id}/edit', [ControllerPermission::class, 'edit'])
    ->middleware(['auth', 'verified'])->name('permissoes.edit');

Route::put('/dashboard/permissoes/{id}/edit', [ControllerPermission::class, 'update'])
    ->middleware(['auth', 'verified'])->name('permissoes.update');

Route::delete('/dashboard/permissoes/{id}/delete', [ControllerPermission::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('permissoes.destroy');