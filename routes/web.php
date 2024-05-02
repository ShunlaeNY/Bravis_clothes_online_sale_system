<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard');
}) ->name('Dashboard');

Route::get('/dashboard/productlist',[ProductController::class,'productlist'])->name('ProductList');
Route::get('/dashboard/productlist/create',[ProductController::class,'productcreate'])->name('ProductCreate');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
