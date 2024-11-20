<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
Route::middleware('auth:sanctum')->group(function () {
    // Get all tasks for the authenticated user
    Route::get('/tasks', [TaskController::class, 'index']);
    
    // Create a new task
    Route::post('/tasks', [TaskController::class, 'store']);
    
    // Update an existing task
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    
    // Delete a task
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    // GET /api/categories - Retrieve all categories
    Route::get('/categories', [CategoryController::class, 'index']);

    // POST /api/categories - Create a new category
    Route::post('/categories', [CategoryController::class, 'store']);

    // PUT /api/categories/{id} - Update an existing category
    Route::put('/categories/{id}', [CategoryController::class, 'update']);

    // DELETE /api/categories/{id} - Delete a category
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});