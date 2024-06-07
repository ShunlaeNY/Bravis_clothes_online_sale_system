<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function search(Request $request)
    {
        $name = 'products.name';
        $category = 'products.category_id';
        $price = 'products.price';
        // $min_price = $request->min_price;
        // $max_price = $request->max_price;
        $data = array();
        if(!empty($request->name)){
            $data[count($data)] = [$name, 'LIKE','%' .$request->name.'%'];
        }
        if(!empty($request->category) && $request->category != 'category'){
            $data[count($data)] = [$category, '=', $request->category];
        }
        if(!empty($request->min_price)){
            $data[count($data)] = [$price, '>=', $request->min_price];
        }
        if(!empty($request->max_price)){
            $data[count($data)] = [$price, '<=', $request->max_price];
        }
        if((!empty($request->min_price)) && (!empty($request->max_price)))
        {
            $data[count($data)] = [$price, '>=', $request->min_price];
            $data[count($data)] = [$price, '<=', $request->max_price];
        }
        // if((!empty($request->min_price)) && (!empty($request->max_price))){
        //     $data[count($data)] = [$price, 'BETWEEN', $request->min_price,'AND',$request->max_price];
        // }
       $productlists = DB::table('products')
       ->join('categories', 'products.category_id', '=', 'categories.id')
       ->join('suppliers','suppliers.id','=','supplier_id')
       ->join('admins','admins.id','=','products.admin_id')
       ->where('products.status','=','Active')
       ->where($data)
       ->select('products.*','categories.name as categoryname','admins.name as adminname','suppliers.name as suppliername','suppliers.brand_name as brand')
       ->orderBy('products.id','desc')
       ->paginate(4);

        $categories = DB::table('categories')
                    ->where('status','=','Active')
                    ->select('id','name')
                    ->get();
       return view('product.list',compact('productlists','categories'));
        
        
    }
}