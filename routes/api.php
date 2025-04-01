<?php

use App\Http\Controllers\NotaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']); 
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});

Route::group(['prefix' => 'notas'], function () {
    Route::get('/', [NotaController::class, 'index']);
    Route::post('/', [NotaController::class, 'store']); 
    Route::get('/{id}', [NotaController::class, 'show']);
    Route::put('/{id}', [NotaController::class, 'update']);
    Route::delete('/{id}', [NotaController::class, 'destroy']);
});