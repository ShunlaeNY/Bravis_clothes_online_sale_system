<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    protected $CustomerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->CustomerRepository = $customerRepository; 
    }

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

    public function search(Request $request)
    {
        $response = $this->CustomerRepository->search($request);
        return $response;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' =>'required|email|max:255',            
            'dob' =>'required',            
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
            'phonenumber' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:100',
            'zipcode' => 'required|string|max:6',
            'image' => 'required|image'
        ]);
        // dd($validatedData);
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension(); //change image name
        $request->image->move(public_path('image/customer/customers_info'), $image);//move img under this dir
        $name = $request->fname . ' '. $request->lname;
        // dd($name);
        $customer = new Customer();
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
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
     * Show the form for editing the specified resource.
     */
    public function customeredit($id)
    {
        //
        $customerdata = Customer::find($id);
        // dd($customerdata);
        return view('customer.update',compact('customerdata'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function customerupdate(Request $request){
        //
        // dd($request);
        $uuid = Str::uuid()->toString(); //uuid to string
        $customerupdate = Customer::find($request->id);
        // $customerupdate->fname = $request->fname;
        // $customerupdate->lname = $request->lname;
        // $customerupdate->email = $request->email;
        // $customerupdate->uuid = $request->$uuid;
        $customerupdate->status = $request->status;
        if($request->password == null || $customerupdate->fname == null || $customerupdate->lname == null){
            
            $customerupdate->update();
        }
        else{
            $customerupdate->password = bcrypt($request->password);
            $customerupdate->update();
        }

        return redirect()->route('CustomerList')->with('success','Customer Updated Successfully');

    }

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
