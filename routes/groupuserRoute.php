<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerGroup;
use App\Http\Controllers\ControllerPermission;
use App\Http\Controllers\GroupUserController; // Adicione esta linha


// Rotas para Associações de Usuário-Grupo (group_user)
Route::get('/dashboard/group_users', [GroupUserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('group_users');

Route::get('/dashboard/group_users/novo', [GroupUserController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('group_users.novo');

Route::post('/dashboard/group_users/n', [GroupUserController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('group_users.store');

// Para deletar, precisamos de ambos os IDs na rota
Route::delete('/dashboard/group_users/{user_id}/{group_id}/delete', [GroupUserController::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('group_users.destroy');