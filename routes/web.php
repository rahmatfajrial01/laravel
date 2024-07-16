<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/admin', function () {
    return view('layouts/second');
});


Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/show/{id}', [BlogController::class, 'show']);
Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy']);
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit']);



// Route::resource('/categories', CategoryController::class);


Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/categories/show/{id}', [CategoryController::class, 'show']);
