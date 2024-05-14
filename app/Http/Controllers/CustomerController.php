<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function customerlogin(){
        return view('login.customerlogin');
    }
    public function customerregister(){
        return view('login.customersignup');
    }
    /**
     * Display a listing of the resource.
     */
    public function customerlist()
    {
        //
        $customerlists = DB::table('customers')
                        ->get();
        // dd($customerlist);
        return view('customer.list',compact('customerlists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension(); //change image name
        $request->image->move(public_path('image/customer/customers_info'), $image);//move img under this dir
        $name = $request->fname . ' '. $request->lname;
        // dd($name);
        $customer = new Customer();
        $customer->name = $name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->dob = $request->dob;
        $customer->joining_date = Carbon::now();
        $customer->phonenumber = $request->phonenumber;
        $customer->state = $request->state;
        $customer->zipcode = $request->zipcode;
        $customer->password = bcrypt($request->password);
        $customer->image = $image;
        $customer->uuid = $uuid;
        $customer->status = 'Active';
        $customer->save();
        return view('login.customerlogin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function customeredit($id)
    // {
    //     //
    //     $customerdata = Customer::find($id);
    //     return view('login.customersignup',compact('customerdata'));

    // }

    /**
     * Update the specified resource in storage.
     */
    // public function customerupdate(Request $request){
    //     //
    //     $uuid = Str::uuid()->toString();
    //     $image = $uuid . '.' . $request->image->extension(); //change image name
    //     $request->image->move(public_path('image/customer/customers_info'), $image);//move img under this dir
    //     $name = $request->fname . ' '. $request->lname;
    //     $fname='aaaaa';
    //     $lname='fffffff';
    //     // dd($name);
    //     $customer = new Customer();
    //     $customer->name = $name;
    //     $customer->email = $request->email;
    //     $customer->address = $request->address;
    //     $customer->dob = $request->dob;
    //     $customer->joining_date = Carbon::now();
    //     $customer->phonenumber = $request->phonenumber;
    //     $customer->state = $request->state;
    //     $customer->zipcode = $request->zipcode;
    //     $customer->password = bcrypt($request->password);
    //     $customer->image = $image;
    //     $customer->uuid = $uuid;
    //     $customer->status = 'Active';
    //     $customer->update();
    //     return redirect()->route('CustomerList',compact(['fname','lname']))->with('success','Customer Updated Successfully');

    // }

    /**
     * Remove the specified resource from storage.
     */
    public function customerdelete($id)
    {
        //
        $customerdel = Customer::find($id);
        $customerdel->status = 'Inactive';
        $customerdel->update();
        return redirect()->route('CustomerList')->with('success','Customer Deleted Successfully');

    }
}
