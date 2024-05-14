<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CustomerpageController extends Controller
{
    //
    public function index(){
        $productlists = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->join('admins','admins.id','=','products.admin_id')
                        ->join('suppliers','suppliers.id','=','products.supplier_id')
                        ->select('products.*','categories.name as categoryname','admins.name as adminname','suppliers.name as suppliername')
                        ->where('products.status','=','Active')
                        ->get();
        return view('customer_pages.homepage',compact('productlists'));
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
        $productlists = DB::table('products')
                        ->where('status','=','Active')
                        ->get();
        return view('customer_pages.products',compact('productlists'));
    }
    public function productdetailspage($id){
        // dd($id);
        $productdata = Product::find($id);
        // dd($productdata);
        return view('customer_pages.details',compact('productdata'));
    }


}
