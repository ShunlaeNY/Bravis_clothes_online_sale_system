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
    public function customereditprofile($id){
        // dd($id);
        $customerdata = Customer::find($id);
        return view('login.customersignup',compact('customerdata'));
    }
    public function customerupdateprofile(Request $request){
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'email' =>'required|email|max:255',            
        //     'dob' =>'required',            
        //     'password' => [
        //         'required',
        //         'string',
        //         'min:8',
        //         'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
        //     ],
        //     'phonenumber' => 'required|string|max:20',
        //     'address' => 'required|string|max:255',
        //     'state' => 'required|string|max:100',
        //     'zipcode' => 'required|string|max:6',
        //     'image' => 'required|image'
        // ]);
        $uuid = Str::uuid()->toString(); //uuid to string
        $customerupdate = Customer::find($request->id);
        $customerupdate->fname = $request->fname;
        $customerupdate->lname = $request->lname;
        $customerupdate->email = $request->email;
        $customerupdate->address = $request->address;
        $customerupdate->phonenumber = $request->phonenumber;
        $customerupdate->state = $request->state;
        $customerupdate->zipcode = $request->zipcode;
        $customerupdate->dob = $request->dob;
        $customerupdate->uuid = $uuid;
        $customerupdate->status = 'Active';
        if ($request->password == null && $request->image == null) {
            $customerupdate->update();
        } 
        else {
            if ($request->password != null) {
                // Hash and update the password
                $customerupdate->password = bcrypt($request->password);
            }
    
            if ($request->hasFile('image')) {
                // Handle the image upload
                $image = $uuid . '.' . $request->image->extension(); //change image name
                $request->image->move(public_path('image/customer/customers_info'), $image);//move img under this dir
            }
    
            // Update other fields that are not null in the request
            $customerupdate->update($request->except(['password', 'image']));
            
            // Save the customer with the updated fields
            $customerupdate->save();
        }
        return redirect()->route('Home')->with('success', 'Customer Updated Successfully');
    }


    /**
     * Display a listing of the resource.
     */
    public function customerlist()
    {
        //
        $customerlists = DB::table('customers')
        ->orderBy('status','asc')
        ->paginate(5);
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
        $validateData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'required|date',
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
            'image' => 'required|image',
        ], [
            'fname.required' => 'The first name field is required and cannot be left empty.',
            'fname.string' => 'The first name must be a string.',
            'fname.max' => 'The first name may not be greater than 255 characters.',
            
            'lname.required' => 'The last name field is required and cannot be left empty.',
            'lname.string' => 'The last name must be a string.',
            'lname.max' => 'The last name may not be greater than 255 characters.',
            
            'email.required' => 'The email field is required and cannot be left empty.',
            'email.email' => 'The email provided must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            
            'dob.required' => 'The date of birth field is required and cannot be left empty.',
            'dob.date' => 'The date of birth must be a valid date.',
            
            'password.required' => 'The password field is required and cannot be left empty.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            
            'phonenumber.required' => 'The phone number field is required and cannot be left empty.',
            'phonenumber.string' => 'The phone number must be a string.',
            'phonenumber.max' => 'The phone number may not be greater than 20 characters.',
            
            'address.required' => 'The address field is required and cannot be left empty.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',
            
            'state.required' => 'The state field is required and cannot be left empty.',
            'state.string' => 'The state must be a string.',
            'state.max' => 'The state may not be greater than 100 characters.',
            
            'zipcode.required' => 'The zip code field is required and cannot be left empty.',
            'zipcode.string' => 'The zip code must be a string.',
            'zipcode.max' => 'The zip code may not be greater than 6 characters.',
            
            'image.required' => 'The image field is required and cannot be left empty.',
            'image.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg).',
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
    public function customerdelete(Request $request)
    {
        //
        // dd($request->customer_id);
        $customerdel = Customer::find($request->customer_id);
        $customerdel->status = 'Inactive';
        $customerdel->update();
        return redirect()->route('CustomerList')->with('success','Customer Deleted Successfully');

    }
}
