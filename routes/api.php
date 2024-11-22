<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::prefix('usuarios')->group(function() {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
    Route::post('/login', [UsuarioController::class, 'login']);
});
