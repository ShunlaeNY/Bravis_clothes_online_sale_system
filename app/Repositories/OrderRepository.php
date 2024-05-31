<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository
{
    public function search(Request $request)
    {
        $order_created = 'order_products.created_at';
        $orderstartdate = $request->orderstartdate;
        $orderenddate = $request->orderenddate;

        $columns = [
            'products.name' => 'Product Name',
            'customers.fname' => 'Customer First Name',
            'customers.lname' => 'Customer Last Name',
            'order_products.price' => 'Price',
            'orders.paymentmethod' => 'Payment Info',
            'order_products.status' => 'Status'
        ];
        
        // $query = DB::table('order_products');
        $query = DB::table('order_products')
                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                    ->join('products', 'products.id', '=', 'order_products.product_id')
                    ->join('customers', 'customers.id', '=', 'orders.customer_id');
                    // ->where('order_products.status', '=', 'Active')
                    
        if (!empty($request->search)) {
            $searchInput = $request->search;
            $query->where(function ($subQuery) use ($columns, $searchInput) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
                }
            });
        }
         // Apply date range filter
         if (!empty($orderStartDate) && !empty($orderEndDate)) {
            $query->whereBetween($order_created, [$orderStartDate, $orderEndDate]);
        } elseif (!empty($orderStartDate)) {
            $query->whereDate($order_created, '>=', $orderStartDate);
        } elseif (!empty($orderEndDate)) {
            $query->whereDate($order_created, '<=', $orderEndDate);
        }
        $order_items = $query
                        ->select(
                            'order_products.*',
                            'products.name as product_name',
                            'customers.fname as customer_fname',
                            'customers.lname as customer_lname',
                            'orders.paymentmethod as paymentmethod'
                        )
                        ->paginate(5);


        return view('order.list', compact('order_items'));
    }
}
