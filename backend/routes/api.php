<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\AuthController;
use \App\Http\Controllers\API\TodoController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/register', [AuthController::class, 'register' ]);

Route::get("todo/show", [TodoController::class, 'index']);
Route::post("todo/create", [TodoController::class, 'create']);
Route::put("todo/update/{id}", [TodoController::class, 'update']);
Route::delete("todo/delete/{id}", [TodoController::class, 'delete']);



