<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function stripe(Request $request){
        $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
        // dd($cartarray);
        $customername = $request->fname .' '. $request->lname;
        $totalpurchase = $request->Total_paynow;
        // dd($totalpurchase);
        return view('customer_pages.payment',compact('customername','cartarray','totalpurchase'));
   }

   public function stripePost(Request $request){
    $cartarray = $request->session()->get('cartdata') ?? []; //get cartdata array from session
    $totalpurchase = $request->totalpurchase;
       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       Stripe\Charge::create([
           "amount" => $totalpurchase* 100,
           "currency" => "USD",
           "source" => $request->stripeToken,
           "description" => "Test Payment From Bravis"
       ]);
       return view('customer_pages.successful',compact('cartarray'))->with('success', 'Payment successful');
   }

}
