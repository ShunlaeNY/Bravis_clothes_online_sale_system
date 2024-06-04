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
        $productCount = count(Product::where('status' ,'=', 'Active')->get());
        $supplierCount = count(Supplier::where('status' ,'=', 'Active')->get());
        $userCount = count(Customer::where('status' ,'=', 'Active')->get());
        
        $TotalOrder = Order::sum('total_qty');
        $TotalOrderPending = OrderProduct::where('status','=','Pending')->count('qty');
        $TotalOrderProcessing = OrderProduct::where('status','=','Processing')->count('qty');
        $TotalOrderDelivered = OrderProduct::where('status','=','Delivered')->count('qty');

        $women_fashion_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Women Fashion')
                            ->select('order_products.*')
                            ->get();
        $women_fashion_order = count($women_fashion_order);
        // dd($women_fashion_order);

        $men_fashion_order = DB::table('order_products')
                            ->join('products','products.id','order_products.product_id')
                            ->join('categories','categories.id','products.category_id')
                            ->where('categories.name','=','Men Fashion')
                            ->get();
        $men_fashion_order = count($men_fashion_order);
        // dd($men_fashion_order);

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

        $salesData = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as total_amount'))
            ->groupBy('month')
            ->get();
        // dd($salesData);

        // array_fill(start_index, count, value)
        $monthlySales = array_fill(0, 12, 0);

        foreach ($salesData as $data) {
            $monthlySales[$data->month - 1] = $data->total_amount;
        }
        // dd($monthlySales);
        
        return view('dashboard',compact('userCount','supplierCount','TotalEarning','productCount','TotalOrder','TotalOrderPending','TotalOrderProcessing','TotalOrderDelivered','sport_wear_order','women_fashion_order','men_fashion_order','accessories_order','monthlySales'));
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
