<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', function () {
    return view('layouts/second');
});

Route::get('/users', [AuthController::class, 'index'])->middleware('auth');
Route::get('/register', [AuthController::class, 'indexRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::get('/login', [AuthController::class, 'indexLogin'])->middleware('guest');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::post('/logout', [AuthController::class, 'destroy']);;

Route::get('/blogs/print', [BlogController::class, 'print'])->middleware('auth');
Route::get('/blogs', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/show/{id}', [BlogController::class, 'show']);
Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy']);
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit']);
Route::put('/blogs/update/{id}', [BlogController::class, 'update']);

Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');;
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/categories/show/{id}', [CategoryController::class, 'show']);
