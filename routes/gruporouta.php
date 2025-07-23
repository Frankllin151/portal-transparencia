<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerGroup;

Route::get('/dashboard/grupos', [ControllerGroup::class, 'index'])
    ->middleware(['auth', 'verified'])->name('grupos');

Route::get('/dashboard/grupos/novo', [ControllerGroup::class, 'create'])
    ->middleware(['auth', 'verified'])->name('grupos.novo');

Route::post('/dashboard/grupos/n', [ControllerGroup::class, 'store'])
    ->middleware(['auth', 'verified'])->name('grupos.store');

Route::get('/dashboard/grupos/{id}/edit', [ControllerGroup::class, 'edit'])
    ->middleware(['auth', 'verified'])->name('grupos.edit');

Route::put('/dashboard/grupos/{id}/edit', [ControllerGroup::class, 'update'])
    ->middleware(['auth', 'verified'])->name('grupos.update');

Route::delete('/dashboard/grupos/{id}/delete', [ControllerGroup::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('grupos.destroy');