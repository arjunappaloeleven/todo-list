<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Route for the home page after login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Protected resource routes for managing todos
Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class); // This includes create, store, edit, update, destroy

    // Profile edit route
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes with admin middleware
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // User management routes
    Route::resource('users', UserController::class); // This includes create, store, edit, update, destroy

    // Route for the admin homepage
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Admin routes for managing todos
    Route::get('/admin/todos', [TodoController::class, 'index'])->name('admin.todos.index'); // View all todos
    Route::get('/admin/todos/{todo}/edit', [TodoController::class, 'editAdmin'])->name('admin.todos.edit'); // Edit a todo
    Route::put('/admin/todos/{todo}', [TodoController::class, 'updateAdmin'])->name('admin.todos.update'); // Update a todo
    Route::delete('/admin/todos/{todo}', [TodoController::class, 'destroyAdmin'])->name('admin.todos.destroy'); // Delete a todo
});

// Additional routes can be added here as needed
