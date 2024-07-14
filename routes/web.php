<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'home']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/product', function () {
    return view('product');
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
