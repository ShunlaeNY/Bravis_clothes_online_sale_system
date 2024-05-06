<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerpageController extends Controller
{
    //
    public function index(){
        return view('customer_pages.homepage');
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
}
