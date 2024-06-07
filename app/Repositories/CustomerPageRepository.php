<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PDO;

class CustomerPageRepository
{
    public function search(Request $request)
    {
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        $columns = [
            'products.name' => 'Product Name',
            'gender' => 'Gender',
            'price' => 'Price'
        ];
        $query = DB::table('products')
                ->join('categories','categories.id','=','products.category_id')
                ->where('products.status','=','Active');
        $categoryname = $request->categoryname;
        // dd($request->all());
        if(!empty($request->search))
        {
            if($categoryname == null)
            {
                $searchInput = $request->search;
                $query
                ->where(function ($subQuery) use ($columns,$searchInput)
                {
                    foreach ($columns as $column => $label) {
                        $subQuery
                        ->orWhere($column,'LIKE','%'.$searchInput.'%');
                    }
                });
            }
            else
            {
                $searchInput = $request->search;
                    $query->where(function ($subQuery) use ($columns,$searchInput)
                    {
                        $categoryname = request('categoryname');
                        foreach ($columns as $column => $label) {
                            $subQuery->orWhere($column,'LIKE','%'.$searchInput.'%')->where('categories.name','=',$categoryname);
                        }

                    });

            }
            
        }
        else{
            if($categoryname == null)
            {
                $query;
            }
            else
            {
                $query->where('categories.name','=',$categoryname);

            }
            
        }
        $products = $query
                    ->select('products.*','categories.name as categoryname')
                    ->get();
        return view('customer_pages.products',compact('products','categoryname','cartarray'));

        

    }

    // public function sort(Request $request)
    // {
    //     // $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
    //     // $price = 'products.price';
    //     // $sort = $request->sort;
    //     // $categoryname = $request->categoryname;
    //     // // dd($sort);
    //     // $query = DB::table('products')
    //     //         ->join('categories','categories.id','=','products.category_id')
    //     //          ->where('products.status','=','Active') ;
                 
    //     // if(!empty($request->sort))
    //     // {
    //     //     if($categoryname == null){
    //     //         if($sort != 'sort'){
    //     //             if($sort == 'low_to_high_price'){
    //     //                 $query->orderBy($price,'asc');
    //     //             }
    //     //             else if($sort == 'high_to_low_price'){
    //     //                $query->orderBy($price,'desc');
    //     //             }
    //     //             else
    //     //             {
    //     //                 $query->orderBy('products.id','desc');
    //     //             }
    //     //         }
    //     //         else{
    //     //             $query;
    //     //         }
    //     //     }
    //     //     else
    //     //     {
    //     //         if($sort != 'sort'){
    //     //             $categoryname = $request->categoryname;
    //     //             if($sort == 'low_to_high_price'){
    //     //                 $query->orderBy($price,'asc')->where('categories.name','=',$categoryname);
    //     //             }
    //     //             else if($sort == 'high_to_low_price'){
    //     //                 $query->orderBy($price,'desc')->where('categories.name','=',$categoryname);
    //     //             }
    //     //             else
    //     //             {
    //     //                 $query->orderBy('products.id','desc')->where('categories.name','=',$categoryname);
    //     //             }
    //     //         }
    //     //         else{
    //     //             $query->where('categories.name','=',$categoryname);

    //     //         }
                
    //     //     }
    //     // $products = $query->select('products.*','categories.name as categoryname')->get();
    //     // return view('customer_pages.products',compact('products','categoryname','cartarray'));

    //     $cartarray = $request->session()->get('cartdata') ?? [];
    //     $sort = $request->sort;
    //     $categoryname = $request->categoryname;

    //     $query = DB::table('products')
    //             ->join('categories', 'categories.id', '=', 'products.category_id')
    //             ->join('products', 'products.id', '=', 'order_products.product_id')
    //             ->select('products.*', 'categories.name as categoryname', DB::raw('SUM(order_products.qty) as total_sold'))
    //             ->where('products.status', '=', 'Active')
    //             ->groupBy('products.id', 'categories.name');

    //     if ($categoryname) {
    //         $query->where('categories.name', '=', $categoryname);
    //     }

    //     if ($sort && $sort !== 'sort') {
    //         switch ($sort) {
    //             case 'low_to_high_price':
    //                 $query->orderBy('products.price', 'asc');
    //                 break;
    //             case 'high_to_low_price':
    //                 $query->orderBy('products.price', 'desc');
    //                 break;
    //             case 'most_selling':
    //                 $query->orderBy('total_sold', 'desc');
    //                 break;
    //             case 'latest':
    //                 $query->orderBy('products.id', 'desc');
    //                 break;
    //             default:
    //                 $query->orderBy('products.id', 'asc');
    //                 break;
    //         }
    //     } else {
    //         $query->orderBy('products.id', 'asc');
    //     }

    //     // Get the products with the total sold quantity
    //     // $products = $query->get();


    //     $products = $query->select('products.*', 'categories.name as categoryname')->get();

    //     return view('customer_pages.products', compact('products', 'categoryname', 'cartarray'));
    // }
    public function sort(Request $request)
{
    $cartarray = $request->session()->get('cartdata') ?? [];
    $sort = $request->sort;
    $categoryname = $request->categoryname;

    $query = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('order_products', 'products.id', '=', 'order_products.product_id')
        ->select('products.*', 'categories.name as categoryname', DB::raw('SUM(order_products.qty) as total_sold'))
        ->where('products.status', '=', 'Active')
        ->groupBy('products.id',
        'products.name',
        'products.price',
        'products.description',
        'products.image',
        'products.status',
        'products.category_id',
        'products.admin_id',
        'products.supplier_id',
        'products.small_qty',
        'products.medium_qty',
        'products.large_qty',
        'products.gender',
        'products.uuid',
        'products.created_at',
        'products.updated_at',
        'categories.name');

    if ($categoryname) {
        $query->where('categories.name', '=', $categoryname);
    }

    if ($sort && $sort !== 'sort') {
        switch ($sort) {
            case 'low_to_high_price':
                $query->orderBy('products.price', 'asc');
                break;
            case 'high_to_low_price':
                $query->orderBy('products.price', 'desc');
                break;
            case 'most_selling':
                $query->orderBy('total_sold', 'desc');
                break;
            case 'latest':
                $query->orderBy('products.id', 'desc');
                break;
            default:
                $query->orderBy('products.id', 'asc');
                break;
        }
    } else {
        $query->orderBy('products.id', 'asc');
    }

    // Get the products with the total sold quantity
    $products = $query->get();

    return view('customer_pages.products', compact('products', 'categoryname', 'cartarray'));
}

}

        



