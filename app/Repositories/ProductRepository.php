<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function searchrecords(Request $request)
    {
        $name = 'products.name';
        $category = 'products.category_id';
        // $price = 'products.price';
        // $min_price = $request->min_price;
        // $max_price = $request->max_price;
        $data = array();
        if(!empty($request->name)){
            $data[count($data)] = [$name, 'LIKE','%' .$request->name.'%'];
        }
        if(!empty($request->category) && $request->category != 'category'){
            $data[count($data)] = [$category, '=', $request->category];
        }
     
       $productlists = DB::table('products')
       ->join('categories', 'products.category_id', '=', 'categories.id')
       ->join('suppliers','suppliers.id','=','supplier_id')
       ->join('admins','admins.id','=','products.admin_id')
       ->where('products.status','=','Active')
       ->where($data)
       ->select('products.*','categories.name as categoryname','admins.name as adminname','suppliers.name as suppliername','suppliers.brand_name as brand')
       ->orderBy('products.id','desc')
       ->paginate(10);
             $categories = DB::table('categories')
                    ->where('status','=','Active')
                    ->select('id','name')
                    ->get();
       return view('product.list',compact('productlists','categories'));
        
        
    }
}