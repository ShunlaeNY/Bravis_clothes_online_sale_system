<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function orderlist()
    {
        //
        $order_items = DB::table('order_products')
                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                    ->join('products', 'products.id', '=', 'order_products.product_id')
                    ->join('customers', 'customers.id', '=', 'orders.customer_id')
                    // ->where('order_products.status', '=', 'Active')
                    ->select(
                        'order_products.*',
                        'products.name as product_name',
                        'customers.fname as customer_fname',
                        'customers.lname as customer_lname',
                        'orders.paymentmethod as paymentmethod'
                    )
    ->paginate(5);
        return view('order.list',compact('order_items'));
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
    public function orderedit(string $id)
    {
        //
        $order_item = OrderProduct::find($id);

        // dd($order_item);
        return view('order.update',compact('order_item'));
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
