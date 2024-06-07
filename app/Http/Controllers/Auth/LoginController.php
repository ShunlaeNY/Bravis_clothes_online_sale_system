<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $validateData = $request->validate([
            'email'=> 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email field is required.',
            'password.required' => 'Password field is required.',
        ]);
        // dd($request->all());
        $validateData['password'] = bcrypt($validateData['password']);
        // dd($validateData['password']);
        // dd($request->all());
        $input = $request->all();
        $userdata = array('email' => $input['email'], 'password' => $input['password']);
        // dd($userdata);
        if($input['usertype'] == 'admin'){
            // dd('reach');
            if(auth('admin')->attempt($userdata)){
                $user = auth('admin')->user();
                // dd($user);
                if($user->status == "Active"){
                    return redirect()->route('Dashboard');

                }
                else{
                    Auth::logout();
                    return redirect()->route('AdminLogin')->with('error','You don\'t have Admin Account Access!');
                }

            }else{
                Auth::logout();
                return redirect()->route('AdminLogin')->with('error','Wrong Email and Password');

            }

        }
        if($input['usertype'] == 'customer'){
            if(auth('customer')->attempt($userdata)){
                $user = auth('customer')->user();
                if($user->status == "Active"){
                    if ($request->session()->has('cartdata')) {
                        return redirect()->route('CheckOut');
                    } else {
                        return redirect()->route('Home');
                    }
                    
                   

                }
                else{
                    Auth::logout();
                    return redirect()->route('CustomerLogin')->with('error','You don\'t have Customer Account Access!');
                }

            }else{
                Auth::logout();
                return redirect()->route('CustomerLogin')->with('error','Wrong Email and Password');

            }

        }
        else{
            return redirect('CustomerLogin')->with('error','You don\'t have Account Access!');

        }

    }
    public function customerlogout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('Home');
    }
    public function adminlogout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect()->route('AdminLogin');
    }
}
