<?php

use App\Http\Controllers\AdminBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', function () {
    return view('admin/dashboard/index');
})->middleware('auth')->middleware('is_admin');

Route::get('/admin/users', [AuthController::class, 'index'])->middleware('auth')->middleware('is_admin');
Route::put('/admin/users/update/{id}', [AuthController::class, 'update']);

Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->middleware('auth')->middleware('is_admin');
Route::get('/admin/blogs/print', [AdminBlogController::class, 'print'])->middleware('auth')->middleware('is_admin');
Route::put('/admin/blogs/status/{id}', [AdminBlogController::class, 'status'])->middleware('auth')->middleware('is_admin');

Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/register', [AuthController::class, 'indexRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::post('/logout', [AuthController::class, 'destroy']);;

Route::get('/blogs/print', [BlogController::class, 'print'])->middleware('auth');
Route::get('/blogs', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/show/{id}', [BlogController::class, 'show']);
Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy']);
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->middleware('auth');
Route::put('/blogs/update/{id}', [BlogController::class, 'update']);

Route::get('/admin/categories/create', [CategoryController::class, 'create']);
Route::post('/admin/categories', [CategoryController::class, 'store']);
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('auth')->middleware('is_admin');
Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth')->middleware('is_admin');
Route::put('/admin/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'destroy']);
// Route::get('/admin/categories/show/{id}', [CategoryController::class, 'show']);
