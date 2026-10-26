<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);