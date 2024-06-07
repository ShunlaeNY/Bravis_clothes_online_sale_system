<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $OrderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->OrderRepository = $orderRepository; 
    }
    /**
     * Display a listing of the resource.
     */
    public function orderlist()
    {
        //
        $orders = DB::table('orders')
                    ->join('customers', 'customers.id', '=', 'orders.customer_id')
                    ->select(
                        'orders.*',
                        'customers.fname as customer_fname',
                        'customers.lname as customer_lname'
                    )
                    ->orderByDesc('orders.id')
                    ->paginate(5);
        // dd($orders);
        $orderitems = DB::table('order_products')
                    ->join('products', 'products.id', '=', 'order_products.product_id')
                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                    ->select('order_products.*','products.name as product_name','products.image as product_image')->get()->groupBy('order_id');
                        // dd($orderitems);
        return view('order.list',compact('orders','orderitems'));
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateOrderStatus(Request $request)
    {
    $order = Order::find($request->input('order_id'));
    if ($order) {
        $order->status = $request->input('update_status');
        $order->update();
    }

    return redirect()->route('OrderList')->with('success', 'Order status updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        // $response = $this->OrderRepository->search($request);
        // return $response;
        $query = DB::table('orders')
        ->join('customers', 'customers.id', '=', 'orders.customer_id')
        ->select(
            'orders.*',
            'customers.fname as customer_fname',
            'customers.lname as customer_lname'
        );

        if ($request->has('orderstartdate') && $request->orderstartdate) {
        $query->where('orders.created_at', '>=', $request->orderstartdate);
        }

        if ($request->has('orderenddate') && $request->orderenddate) {
        $query->where('orders.created_at', '<=', $request->orderenddate);
        }

        if ($request->has('search') && $request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('orders.id', 'like', '%' . $request->search . '%')
                ->orWhere('customers.fname', 'like', '%' . $request->search . '%')
                ->orWhere('customers.lname', 'like', '%' . $request->search . '%')
                ->orWhere('orders.total_qty', 'like', '%' . $request->search . '%')
                ->orWhere('orders.total_price', 'like', '%' . $request->search . '%')
                ->orWhere('orders.paymentmethod', 'like', '%' . $request->search . '%')
                ->orWhere('orders.status', 'like', '%' . $request->search . '%');
        });
        }

        $orders = $query->orderByDesc('orders.id')->paginate(5);

        $orderitems = OrderProduct::join('products', 'products.id', '=', 'order_products.product_id')
                ->select('order_products.*', 'products.name as product_name')
                ->get()
                ->groupBy('order_id');

        return view('order.list', compact('orders', 'orderitems'));
            }
}
