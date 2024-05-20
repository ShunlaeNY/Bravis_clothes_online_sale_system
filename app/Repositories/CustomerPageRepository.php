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
        return view('customer_pages.products',compact('products','categoryname'));

        

    }

    public function sort(Request $request)
    {
        $price = 'products.price';
        $sort = $request->sort;
        $categoryname = $request->categoryname;
        // dd($sort);
        $query = DB::table('products')
                ->join('categories','categories.id','=','products.category_id')
                 ->where('products.status','=','Active') ;
                 
        if(!empty($request->sort))
        {
            if($categoryname == null){
                if($sort != 'sort'){
                    if($sort == 'low_to_high_price'){
                        $query->orderBy($price,'asc');
                    }
                    else if($sort == 'high_to_low_price'){
                        $query->orderBy($price,'desc');
                    }
                    else
                    {
                        $query->orderBy('products.id','desc');
                    }
                }
                else{
                    $query;
                }
            }
            else
            {
                if($sort != 'sort'){
                    $categoryname = $request->categoryname;
                    if($sort == 'low_to_high_price'){
                        $query->orderBy($price,'asc')->where('categories.name','=',$categoryname);
                    }
                    else if($sort == 'high_to_low_price'){
                        $query->orderBy($price,'desc')->where('categories.name','=',$categoryname);
                    }
                    else
                    {
                        $query->orderBy('products.id','desc')->where('categories.name','=',$categoryname);
                    }
                }
                else{
                    $query->where('categories.name','=',$categoryname);

                }
                
            }
        $products = $query->select('products.*','categories.name as categoryname')->get();
        return view('customer_pages.products',compact('products','categoryname'));
    }
    }
        
}