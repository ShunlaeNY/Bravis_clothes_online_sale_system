<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function __invoke(Request $request)
    // {
    //     // Your controller logic here
    // }
    public function adminlogin(){
        // echo "hello";dd();
        return view('login.adminlogin');
    }

    public function index(){
        $TotalEarning = Order::sum('total_price');
        // dd($TotalEarning);  
        // $TotalProductsPrice = Product::where('status','=','Active')->sum('price');
        // $TotalExpenses = $TotalProductsPrice * 0.5;//all products from this page's purchase price is 50% than Sale Price
        $supplierCount = count(Supplier::where('status' ,'=', 'Active')->get());
        $userCount = count(Customer::where('status' ,'=', 'Active')->get());
        $productCount = count(Product::where('status' ,'=', 'Active')->get());
        $TotalOrder = Order::sum('total_qty');
        $TotalOrderPending = Order::where('status','=','Pending')->count('total_qty');
        $TotalOrderProcessing = Order::where('status','=','Processing')->count('total_qty');
        $TotalOrderDelivered = Order::where('status','=','Delivered')->count('total_qty');

        $women_fashion_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Women Fashion')
                            ->select('order_products.qty')->get();
        $women_fashion_order = count($women_fashion_order);

        $men_fashion_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Men Fashion')
                            ->select('order_products.qty')->get();
        $men_fashion_order = count($men_fashion_order);

        $accessories_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Accessories')
                            ->select('order_products.qty')->get();
        $accessories_order = count($accessories_order);

        $sport_wear_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Sport Wears')
                            ->select('order_products.qty')->get();
        $sport_wear_order = count($sport_wear_order);

        // dd($women_fashion_order);
        return view('dashboard',compact('userCount','supplierCount','TotalEarning','productCount','TotalOrder','TotalOrderPending','TotalOrderProcessing','TotalOrderDelivered','sport_wear_order','women_fashion_order','men_fashion_order','accessories_order'));
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
