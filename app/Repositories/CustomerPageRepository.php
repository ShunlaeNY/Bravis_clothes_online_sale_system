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

    public function sort(Request $request)
    {
        // $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        // $price = 'products.price';
        // $sort = $request->sort;
        // $categoryname = $request->categoryname;
        // // dd($sort);
        // $query = DB::table('products')
        //         ->join('categories','categories.id','=','products.category_id')
        //          ->where('products.status','=','Active') ;
                 
        // if(!empty($request->sort))
        // {
        //     if($categoryname == null){
        //         if($sort != 'sort'){
        //             if($sort == 'low_to_high_price'){
        //                 $query->orderBy($price,'asc');
        //             }
        //             else if($sort == 'high_to_low_price'){
        //                $query->orderBy($price,'desc');
        //             }
        //             else
        //             {
        //                 $query->orderBy('products.id','desc');
        //             }
        //         }
        //         else{
        //             $query;
        //         }
        //     }
        //     else
        //     {
        //         if($sort != 'sort'){
        //             $categoryname = $request->categoryname;
        //             if($sort == 'low_to_high_price'){
        //                 $query->orderBy($price,'asc')->where('categories.name','=',$categoryname);
        //             }
        //             else if($sort == 'high_to_low_price'){
        //                 $query->orderBy($price,'desc')->where('categories.name','=',$categoryname);
        //             }
        //             else
        //             {
        //                 $query->orderBy('products.id','desc')->where('categories.name','=',$categoryname);
        //             }
        //         }
        //         else{
        //             $query->where('categories.name','=',$categoryname);

        //         }
                
        //     }
        // $products = $query->select('products.*','categories.name as categoryname')->get();
        // return view('customer_pages.products',compact('products','categoryname','cartarray'));

        $cartarray = $request->session()->get('cartdata') ?? [];
        $sort = $request->sort;
        $categoryname = $request->categoryname;

        $query = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.status', '=', 'Active');
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
                default:
                    $query->orderBy('products.id', 'desc');
                    break;
            }
        } else {
            $query->orderBy('products.id', 'desc');
        }

        $products = $query->select('products.*', 'categories.name as categoryname')->get();

        return view('customer_pages.products', compact('products', 'categoryname', 'cartarray'));
    }
}

        



// namespace App\Repositories;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class CustomerPageRepository
// {
//     protected $columns = [
//         'products.name' => 'Product Name',
//         'gender' => 'Gender',
//         'price' => 'Price'
//     ];

//     public function search(Request $request)
//     {
//         $cartarray = $request->session()->get('cartdata') ?? [];
//         $categoryname = $request->categoryname;
//         $searchInput = $request->search;

//         $query = DB::table('products')
//             ->join('categories', 'categories.id', '=', 'products.category_id')
//             ->where('products.status', '=', 'Active');

//         if ($searchInput) {
//             $query = $this->applySearchFilter($query, $searchInput, $categoryname);
//         } elseif ($categoryname) {
//             $query->where('categories.name', '=', $categoryname);
//         }

//         $products = $query->select('products.*', 'categories.name as categoryname')->get();

//         return view('customer_pages.products', compact('products', 'categoryname', 'cartarray'));
//     }

//     private function applySearchFilter($query, $searchInput, $categoryname)
//     {
//         return $query->where(function ($subQuery) use ($searchInput, $categoryname) {
//             foreach ($this->columns as $column => $label) {
//                 $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
//                 if ($categoryname) {
//                     $subQuery->where('categories.name', '=', $categoryname);
//                 }
//             }
//         });
//     }

//     public function sort(Request $request)
//     {
//         $cartarray = $request->session()->get('cartdata') ?? [];
//         $categoryname = $request->categoryname;
//         $sort = $request->sort;

//         $query = DB::table('products')
//             ->join('categories', 'categories.id', '=', 'products.category_id')
//             ->where('products.status', '=', 'Active');

//         if ($sort && $sort !== 'sort') {
//             $query = $this->applySort($query, $sort, $categoryname);
//         } elseif ($categoryname) {
//             $query->where('categories.name', '=', $categoryname);
//         }

//         $products = $query->select('products.*', 'categories.name as categoryname')->get();

//         return view('customer_pages.products', compact('products', 'categoryname', 'cartarray'));
//     }

//     private function applySort($query, $sort, $categoryname)
//     {
//         $priceColumn = 'products.price';

//         if ($sort === 'low_to_high_price') {
//             $query->orderBy($priceColumn, 'asc');
//         } elseif ($sort === 'high_to_low_price') {
//             $query->orderBy($priceColumn, 'desc');
//         } else {
//             $query->orderBy('products.id', 'desc');
//         }

//         if ($categoryname) {
//             $query->where('categories.name', '=', $categoryname);
//         }

//         return $query;
//     }
// }
