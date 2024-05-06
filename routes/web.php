<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerpageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupplierController;

//////////////////////////////////////////////////////////////////////////////////////////
//admin panel
Route::get('/admin',[AdminController::class,'adminlogin'])->name('AdminLogin');
Route::get('/admin/logout',[LoginController::class,'adminlogout'])->name('AdminLogout');
Route::middleware(['admin'])->group(function(){
    Route::prefix('admin/dashboard')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('Dashboard');
        // product
        Route::get('/productlist',[ProductController::class,'productlist'])->name('ProductList');
        Route::get('/productlist/create',[ProductController::class,'productcreate'])->name('ProductCreate');
        //category
        Route::get('/categorylist',[CategoryController::class,'categorylist'])->name('CategoryList');
        // customer
        Route::get('/customerlist',[CustomerController::class,'customerlist'])->name('CustomerList');
        //order
        Route::get('/orderlist',[OrderController::class,'orderlist'])->name('OrderList');
        //staff
        Route::get('/stafflist',[StaffController::class,'stafflist'])->name('StaffList');
        //supplier
        Route::get('/supplierlist',[SupplierController::class,'supplierlist'])->name('SupplierList');
    });
});





//////////////////////////////////////////////////////////////////////////////////////
//homepage
Route::get('/',[CustomerpageController::class,'index'])->name('Home');
Route::get('/customer/login',[CustomerController::class,'customerlogin'])->name('CustomerLogin');
Route::get('/customer/logout',[LoginController::class,'customerlogout'])->name('CustomerLogout');
Route::get('/customer/register',[CustomerController::class,'customerregister'])->name('CustomerRegister');
Route::get('/about',[CustomerpageController::class,'about'])->name('AboutUs');
Route::get('/contact',[CustomerpageController::class,'contact'])->name('ContactUs');
Route::get('/policy',[CustomerpageController::class,'policy'])->name('PrivacyPolicy');
Route::get('/checkout',[CustomerpageController::class,'checkout'])->name('Checkout');
Route::get('/checkout/successful',[CustomerpageController::class,'successful'])->name('Successful');




///////////////////////////////////////////////////////////////////////////////////
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
