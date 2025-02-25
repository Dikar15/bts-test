<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('checklists', ChecklistController::class);
    Route::apiResource('checklists.items', ChecklistItemController::class)->shallow();
    Route::post('/logout', [AuthController::class, 'logout']);
});
