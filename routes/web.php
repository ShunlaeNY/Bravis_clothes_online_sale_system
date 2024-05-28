<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
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
Route::post('/admin/loginprocess',[LoginController::class,'login'])->name('AdminLoginProcess');
Route::middleware('admin')->group(function(){

    Route::get('/admin/logout',[LoginController::class,'adminlogout'])->name('AdminLogout');
    Route::prefix('admin/dashboard')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('Dashboard');

        //search
        Route::post('/productlist/search',[ProductController::class,'search'])->name('SearchProducts');
        Route::post('/categorylist/search',[CategoryController::class,'search'])->name('SearchCategories');
        Route::post('/customerlist/search',[CustomerController::class,'search'])->name('SearchCustomers');
        Route::post('/stafflist/search',[StaffController::class,'search'])->name('SearchStaffs');
        Route::post('/orderlist/search',[OrderController::class,'search'])->name('SearchOrders');
        Route::post('/supplierlist/search',[SupplierController::class,'search'])->name('SearchSuppliers');

        // product
        Route::get('/productlist',[ProductController::class,'productlist'])->name('ProductList');
        Route::get('/productlist/create',[ProductController::class,'productcreate'])->name('ProductCreate');
        Route::post('/productlist/create/process',[ProductController::class,'store'])->name('ProductCreateProcess');
        Route::get('/productlist/edit/{id}',[ProductController::class,'productedit'])->name('ProductEdit');
        Route::get('/productlist/details/{id}',[ProductController::class,'productdetails'])->name('ProductDetails');
        Route::patch('/productlist/edit/process',[ProductController::class,'productupdate'])->name('ProductUpdateProcess');
        Route::get('/productlist/delete/{id}',[ProductController::class,'productdelete'])->name('ProductDelete');

        //category
        Route::get('/categorylist',[CategoryController::class,'categorylist'])->name('CategoryList');
        Route::get('/categorylist/create',[CategoryController::class,'categorycreate'])->name('CategoryCreate');
        Route::post('/categorylist/create/process',[CategoryController::class,'store'])->name('CategoryCreateProcess');
        Route::get('/categorylist/edit/{id}',[CategoryController::class,'categoryedit'])->name('CategoryEdit');
        Route::patch('/categorylist/edit/process',[CategoryController::class,'categoryupdate'])->name('CategoryUpdateProcess');
        Route::get('/categorylist/delete/{id}',[CategoryController::class,'categorydelete'])->name('CategoryDelete');

        // customer
        Route::get('/customerlist',[CustomerController::class,'customerlist'])->name('CustomerList');
        // Route::post('/customerlist/register/process',[CustomerController::class,'store'])->name('CustomerRegisterProcess');
        Route::get('/customerlist/edit/{id}',[CustomerController::class,'customeredit'])->name('CustomerEdit');
        Route::post('/customerlist/edit/process',[CustomerController::class,'customerupdate'])->name('CustomerUpdateProcess');
        Route::get('/customerlist/delete/{id}',[CustomerController::class,'customerdelete'])->name('CustomerDelete');
        //order
        Route::get('/orderlist',[OrderController::class,'orderlist'])->name('OrderList');

        //staff
        Route::get('/stafflist',[StaffController::class,'stafflist'])->name('StaffList');
        Route::get('/stafflist/create',[StaffController::class,'staffcreate'])->name('StaffCreate');
        Route::post('/stafflist/create/process',[StaffController::class,'store'])->name('StaffCreateProcess');
        Route::get('/stafflist/edit/{id}',[StaffController::class,'staffedit'])->name('StaffEdit');
        Route::patch('/stafflist/edit/process',[StaffController::class,'staffupdate'])->name('StaffUpdateProcess');
        Route::get('/stafflist/delete/{id}',[StaffController::class,'staffdelete'])->name('StaffDelete');

        //supplier
        Route::get('/supplierlist',[SupplierController::class,'supplierlist'])->name('SupplierList');
        Route::get('/supplierlist/create',[SupplierController::class,'suppliercreate'])->name('SupplierCreate');
        Route::post('/supplierlist/create/process',[SupplierController::class,'store'])->name('SupplierCreateProcess');
        Route::get('/supplierlist/edit/{id}',[SupplierController::class,'supplieredit'])->name('SupplierEdit');
        Route::patch('/supplierlist/edit/process',[SupplierController::class,'supplierupdate'])->name('SupplierUpdateProcess');
        Route::get('/supplierlist/delete/{id}',[SupplierController::class,'supplierdelete'])->name('SupplierDelete');
    });
});





//////////////////////////////////////////////////////////////////////////////////////
//homepage
Route::get('/',[CustomerpageController::class,'index'])->name('Home');
Route::get('/customer/login',[CustomerController::class,'customerlogin'])->name('CustomerLogin');
Route::post('/customer/loginprocess',[LoginController::class,'login'])->name('CustomerLoginProcess');
Route::get('/customer/logout',[LoginController::class,'customerlogout'])->name('CustomerLogout');
Route::get('/customer/register',[CustomerController::class,'customerregister'])->name('CustomerRegister');
Route::post('/customer/register/process',[CustomerController::class,'store'])->name('CustomerRegisterProcess');


Route::get('/about',[CustomerpageController::class,'about'])->name('AboutUs');
Route::get('/contact',[CustomerpageController::class,'contact'])->name('ContactUs');
Route::get('/policy',[CustomerpageController::class,'policy'])->name('PrivacyPolicy');
Route::get('/checkout',[CustomerpageController::class,'checkout'])->name('Checkout');
Route::get('/checkout/successful',[CustomerpageController::class,'successful'])->name('Successful');
Route::get('/productlist', [ CustomerPageController::class , 'alllist' ])->name('CustomerSideProductList');
Route::get('/productdetails/{id}',[CustomerpageController::class,'productdetailspage'])->name('ProductDetailsPage');
Route::post('/addtocart/show',[CustomerpageController::class,'addtocart'])->name('AddToCart.show');
Route::post('/checkout',[CustomerpageController::class,'checkout'])->name('CheckOut');
Route::post('/orderandcart/create',[CustomerpageController::class,'create'])->name('OrderAndCartCreate');
//search
Route::post('/productlist/search',[CustomerpageController::class,'search'])->name('Search');
// sort
Route::post('/productlist/sort',[CustomerpageController::class,'sort'])->name('Sort');


///////////////////////////////////////////////////////////////////////////////////
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
