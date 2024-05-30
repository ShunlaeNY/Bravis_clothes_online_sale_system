<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerPageRepository;
use App\Models\Customer;

class CustomerpageController extends Controller
{
    protected $CustomerPageRepository;
    public function __construct(CustomerPageRepository $customerPageRepository)
    {
        $this->CustomerPageRepository = $customerPageRepository;
    }
    //
    public function index(Request $request){
        // session()->flush();
        //create add to card session if not exist
        if(!$request->session()->has('cartdata')){
            $request->session()->put('cartdata',[]);
        }
        //add cartdata array to session if exist, empty array if not existed
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

    public function about(Request $request){
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        return view('customer_pages.about',compact('cartarray'));
    }

    public function contact(Request $request){
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        return view('customer_pages.contact',compact('cartarray'));
    }

    public function policy(){
        return view('customer_pages.policy');
    }

    public function checkout(Request $request){
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        // dd($request->all());
        $total_price= $request->total_price;
        $total_items = $request->total_items;
        return view('customer_pages.checkout',compact('cartarray','total_items','total_price'));
    }


    public function alllist(Request $request){
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session

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
        return view('customer_pages.products',compact('products','categoryname','cartarray'));
    }

    public function search(Request $request)
    {
        $response = $this->CustomerPageRepository->search($request);
        return $response;
    }
    public function sort(Request $request)
    {
        $response = $this->CustomerPageRepository->sort($request);
        return $response;
    }
    public function productdetailspage(Request $request,$id){
        // dd($id);
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        $productdata = Product::find($id);
        // dd($productdata);
        $productGender = $productdata->gender;
        // dd($productGender);
        $productByGender = Product::where('gender', '=', $productGender)->where('status','=','Active')->take(5)->get();
        // dd($productByGender);
        return view('customer_pages.details',compact('productdata','productByGender','cartarray'));
    }

    //add data to cart table
    public function addtocart(Product $product,Request $request){
    //    dd($request->sizes);
        $size = $request->sizes;
        $addToCart = $request->addToCart;
        $product_id = $request->product_id;
        $productdata = Product::find($product_id);
        // dd($request->addQty);
        $cartarray = [];
        if($addToCart == true){
            if ($request->session()->has('cartdata')) {
                $cartarray = $request->session()->get('cartdata');
                $sameproduct = false;
                foreach ($cartarray as $key => &$value) {
                    // dd($request->all());
                    if ($value['product'] == $product_id && $value['size'] == $size) {
                        if($request->addQty){
                            $value['quantity'] += 1;
                        }
                        elseif($request->removeQty == true && $value['quantity']>1){
                            $value['quantity'] -= 1;
                        }
                        // elseif($request->removeQty == true && $value['quantity']<=1){
                        //     unset($cartarray[$key]);
                        // }
                        elseif($request->removeFromCart){
                            unset($cartarray[$key]);
                        }
                        $sameproduct = true;
                        break;
                    }
                }
                if(!$sameproduct && !$request->removeFromCart){
                    $cartarray[] = ['product' => $product_id,'quantity'=>1,'size'=>$size,'name'=>$productdata->name,'image'=>$productdata->image, 'price' =>$productdata->price];
                    // dd($cartarray);
                }
                $request->session()->put('cartdata',$cartarray);
            }
            else{
                $request->session()->put('cartdata',['product'=>$product_id,'quantity'=>1,'size'=>$size,'name'=>$productdata->name,'image'=>$productdata->image, 'price' =>$productdata->price]);
            }

        }
        $cartarray = $request->session()->get('cartdata')??[];
        // dd($cartarray,$productdata);
        $productGender = $productdata->gender;
        $productByGender = Product::where('gender', '=', $productGender)    ->where('status','=','Active')->take(5)->get();
        return view('customer_pages.details',compact('productdata','cartarray','productByGender'));


        
    }

    public function successful(){
        // $cartarray = session()->flush();
        return view('customer_pages.successful');
    }

    //order and cart create
    // public function create(Request $request)
    // {
    //     $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
    //     // dd($cartarray);
    //     $customer_id = $request->customer_id;
    //     // dd($customer_id);
    //     // store in cart
    //     foreach ($cartarray as $key => &$value) {
    //         $uuid = Str::uuid()->toString(); //uuid to string
    //         $cartdata = new Cart();
    //         $cartdata->product_id = $value['product'];
    //         $cartdata->customer_id = $customer_id;
    //         $cartdata->uuid = $uuid;
    //         $cartdata->status = 'Active';
    //         $cartdata->totalprice = $value['price'] * $value['quantity'];
    //         $cartdata->save();
    //     }
       
    // }

}
