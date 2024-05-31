<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Supplier;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $ProductRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->ProductRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function productlist(Request $request)
    {
        //
        // dd($request);
        $productlists = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('suppliers','suppliers.id','=','supplier_id')
                        ->join('admins','admins.id','=','products.admin_id')
                        ->where('products.status','=','Active')
                        ->select('products.*','categories.name as categoryname','admins.name as adminname','suppliers.name as suppliername','suppliers.brand_name as brand')
                        ->orderBy('products.id','desc')
                       ->paginate(4);
        
        $categories = DB::table('categories')
                    ->where('status','=','Active')
                    ->select('id','name')
                    ->get();
        // dd($categories);
        return view('product.list',compact('productlists','categories'));
    }

    public function search(Request $request)
    {
        $response = $this->ProductRepository->search($request);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productcreate()
    {
        //
        $categories = DB::table('categories')
                ->select('id','name')
                ->where('status','=','Active')
                ->get();
        $suppliers = DB::table('suppliers')
                ->where('status','=','Active')
                ->get();
        return view('product.create',compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' =>'required|image',            
            'price' =>'required', 
            'small'=> 'required',
            'medium'=> 'required',
            'large'=> 'required',
        ]);
        // dd($request);
        $uuid = Str::uuid()->toString(); //uuid to string
        $image = $uuid . '.' . $request->image->extension(); //change image name
        $request->image->move(public_path('image/admin/products_info'), $image);//move img under this dir
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $image;
        $product->category_id = $request->category_id;
        $product->admin_id = $request->admin_id;
        $product->supplier_id = $request->supplier_id;
        $product->gender = $request->gender;
        $product->price = $request->price;
        $product->small_qty = $request->small;
        $product->medium_qty = $request->medium;
        $product->large_qty = $request->large;
        $product->uuid =$uuid;
        $product->status = "Active";
        $product->save();
        return redirect()->route('ProductList');


    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function productedit($id)
    {
        //
        // dd($id);
        $categories = DB::table('categories')
                ->select('id','name')
                ->where('status','=','Active')
                ->get();
        $suppliers = DB::table('suppliers')
                ->where('status','=','Active')
                ->get();
        $productdata=Product::find($id);
        // dd($productdata);
        return view('product.create',compact('categories','suppliers','productdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function productupdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' =>'required|image',            
            'price' =>'required', 
            'small'=> 'required',
            'medium'=> 'required',
            'large'=> 'required',
        ]);
        //
        $uuid = Str::uuid()->toString(); //uuid to string
        $productupdate = Product::find($request->id);
        $productupdate->name = $request->name;
        $productupdate->description = $request->description;
        $productupdate->category_id = $request->category_id;
        $productupdate->supplier_id = $request->supplier_id;
        $productupdate->gender = $request->gender;
        $productupdate->price = $request->price;
        $productupdate->small_qty = $request->small;
        $productupdate->medium_qty = $request->medium;
        $productupdate->large_qty = $request->large;
        $productupdate->uuid =$uuid;
        $productupdate->status = "Active";
        if($request->image == null){
            $productupdate->update();
        }
        else{
            $image = $uuid . '.' . $request->image->extension(); //change image name
            $request->image->move(public_path('image/admin/products_info'), $image);//move img under this dir
            $productupdate->image = $image;
            $productupdate->update();
        }
        return redirect()->route('ProductList');
    }
    public function productdelete(Request $request){
        // dd($id);
        $productdel = Product::find($request->product_id);
        $productdel->status = 'Inactive';
        $productdel->update();
        return redirect()->route('ProductList')->with('success','Product Deleted Successfully');
        
    }

    // public function productdetails($id){
    //     // dd($id);
    //     $productdetails = Product ::find($id);
    //     $category = Category::where('id','=',$productdetails->category_id)->select('name')->get();
    //     $supplier = Supplier::where('id','=',$productdetails->supplier_id)->select('name','brand_name')->get();
    //     $admin = Admin::where('id','=',$productdetails->admin_id)->select('name')->get();

    //     // dd($productdetails);
    //     return view('product.details',compact('productdetails','category','supplier','admin'));

    // }
}
