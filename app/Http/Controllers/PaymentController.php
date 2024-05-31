<?php

namespace App\Http\Controllers;

use Stripe;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function stripe(Request $request){
        // dd($request->all());
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        // dd($cartarray[0]['quantity']);
        
        // dd($total_qty);
        $alldata = $request->all();
        $customername = $request->fname .' '. $request->lname;
        // dd($totalpurchase);
        return view('customer_pages.payment',compact('customername','cartarray','alldata'));
   }

   public function stripePost(Request $request){
    //
    $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
    $alldata = $request->alldata;
    // dd($alldata);
    $total_price = $alldata['Total_paynow'];
    // $total_price = 0;
    //     foreach($cartarray as $item)
    //     {
    //         $total_price += $item['price'];
    //     }
    // dd($total_price);
    $shippingfees = $alldata['delivery_fee'];
        // dd($shippingfees);

    $total_qty = 0;
        foreach($cartarray as $item)
        {
            $total_qty += $item['quantity'];
        }
    // dd($total_qty);       
    $OTP = false;

    //cart store
    if($alldata['customer_id'] != null)
    {

        //payment from registered user
        $OTP = false;

        //add data to cart table
        foreach ($cartarray as $key => &$value) {
            $uuid = Str::uuid()->toString(); //uuid to string
            $cartdata = new Cart();
            $cartdata->product_id = $value['product'];
            $cartdata->customer_id = $alldata['customer_id'];
            $cartdata->uuid = $uuid;
            $cartdata->status = 'Active';
            $cartdata->totalprice = $value['price'] * $value['quantity'];
            $cartdata->save();
        }
    }
    else
    {
        //one time payment from guest
        $OTP = true;
        // dd($OTP);
        //create new user for cart store
        $uuid = Str::uuid()->toString();
        $newuser = new Customer();
        $newuser->fname = $alldata['fname'];
        $newuser->lname = $alldata['lname'];
        $newuser->email = $alldata['email'];
        $newuser->address = $alldata['address'];
        $newuser->dob = Carbon::now();
        $newuser->joining_date = Carbon::now();
        $newuser->phonenumber = $alldata['phonenumber'];
        $newuser->image = '-';
        $newuser->password = bcrypt('Welc0me!Guest');
        $newuser->status = 'Active';
        $newuser->uuid = $uuid;
        $newuser->state = $alldata['state'];
        $newuser->zipcode = $alldata['zipcode'];
        $newuser->save();

        //read new user data from customer table
        $newuser_id = Customer::where('email','=', $alldata['email'])
                    ->where('status','=','Active')
                    ->select('id')->get();
        // dd($newuser_id[0]->id);

        //add data to cart table
        foreach ($cartarray as $key => &$value) {
            $uuid = Str::uuid()->toString(); //uuid to string
            $cartdata = new Cart();
            $cartdata->product_id = $value['product'];
            $cartdata->customer_id = $newuser_id[0]->id;
            $cartdata->uuid = $uuid;
            $cartdata->status = 'Active';
            $cartdata->totalprice = $value['price'] * $value['quantity'];
            $cartdata->save();
        }
    }


    //order store
    $latestCustomerID = Customer::max('id');
    // dd($latestID);
    $order = new Order();
    $uuid = Str::uuid()->toString();
    $order->customer_id = $latestCustomerID;
    if($OTP == true)
    {
        $order->paymentmethod = 'OTP';
        // dd($order->paymentmethod);
    }
    else{
        $order->paymentmethod = 'CARD';
    }
    $order->total_qty = $total_qty;
    $order->total_price = $total_price;
    $order->shippingfees = $shippingfees;
    $order->uuid = $uuid;
    $order->status = 'Pending';
    $order->save();

    //order product store
    foreach ($cartarray as $key => &$value) {
        $LatestOrderID = Order::max('id');
        $orderproduct = new OrderProduct();
        $orderproduct->product_id = $value['product'];
        $orderproduct->order_id = $LatestOrderID;
        $orderproduct->qty = $value['quantity'];
        $orderproduct->price = $value['price'];
        $orderproduct->uuid = Str::uuid()->toString();
        $orderproduct->status = 'Pending';
        $orderproduct->save();
    }
    // dd($orderproduct);


    //inventory qty
    foreach ($cartarray as $key => &$value) {
        $product = Product::find($value['product']);
        if ($value['size'] == 'S') {
                $product->small_qty -= $value['quantity'];
        }
        elseif ($value['size'] == 'M') {
                $product->medium_qty -= $value['quantity'];
        }
        elseif ($value['size'] == 'L') {
                $product->large_qty -= $value['quantity'];
        }
        $product->update();
    }


    // payment
       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       Stripe\Charge::create([
           "amount" => $total_price* 100,
           "currency" => "USD",
           "source" => $request->stripeToken,
           "description" => "Test Payment From Bravis"
       ]);
       
    //empty cart session



    return view('customer_pages.successful',compact('cartarray'))->with('success', 'Payment successful','alldata');
   }

}

