<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CustomerpageController extends Controller
{
    //
    public function index(Request $request){
        if(!$request->session()->has('cartdata')){
            $request->session()->put('cartdata',[]);
        }
        $cartarray = $request->session()->get('cartdata')??[];
        $productlists = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->join('admins','admins.id','=','products.admin_id')
                        ->join('suppliers','suppliers.id','=','products.supplier_id')
                        ->select('products.*','categories.name as categoryname','admins.name as adminname','suppliers.name as suppliername')
                        ->where('products.status','=','Active')
                        ->orderByDesc('products.id')
                        ->take(10)
                        ->get();
        return view('customer_pages.homepage',compact('productlists','cartarray'));
    }

    public function about(){
        return view('customer_pages.about');
    }

    public function contact(){
        return view('customer_pages.contact');
    }

    public function policy(){
        return view('customer_pages.policy');
    }

    public function checkout(){
        return view('customer_pages.checkout');
    }

    public function successful(){
        return view('customer_pages.successful');
    }

    public function alllist(Request $request){
        // dd($request);
        $categoryname = $request->category;
        // dd($categoryname);
        if($categoryname != null){
           
            $products = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->where('products.status','=','Active')
                        ->where('categories.name','=',$categoryname)
                        ->select('products.*','categories.name as categoryname')
                        ->get();
                        // dd($products);
        }else{
            $products = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->where('products.status','=','Active')
                        ->select('products.*','categories.name as categoryname')
                        ->get();
                        // dd($products);
        }
        return view('customer_pages.products',compact('products','categoryname'));
    }
    public function productdetailspage($id){
        // dd($id);
        $productdata = Product::find($id);
        // dd($productdata);
        $productGender = $productdata->gender;
        // dd($productGender);
        $productByGender = Product::where('gender', '=', $productGender)    ->where('status','=','Active')->take(5)->get();
        // dd($productByGender);
        return view('customer_pages.details',compact('productdata','productByGender'));
    }


}
