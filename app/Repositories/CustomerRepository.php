<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    // public function search(Request $request)
    // {
        
    //     $fname = 'fname';
    //     $lname = 'lname';
    //     $email = 'email';
    //     $address = 'customers.address';
    //     $phonenumber = 'phonenumber';
    //     $columns = array($fname,$lname,$address,$email,$phonenumber);
    //     $data = array();
    //     if(!empty($request->search)){
    //         switch ($request->search) {
    //             case '1':
    //                 $data[count($data)] = [$fname, 'LIKE','%' .$request->search.'%'];
    //                 break;
    //             case '2':
    //                 $data[count($data)] = [$lname, 'LIKE','%' .$request->search.'%'];
    //                 break;
    //             case '3':
    //                 $data[count($data)] = [$email, 'LIKE','%' .$request->search.'%'];
    //                 break;
    //             case '4':
    //                 $data[count($data)] = [$phonenumber, 'LIKE','%' .$request->search.'%'];
    //                 break;    
    //             default:
    //                 $data[count($data)] = [$address, 'LIKE','%' .$request->search.'%'];
    //                 break;
    //             }
    //     }
    //     dd($data);
    //    $customerlists = DB::table('customers')
    //    ->where('status','=','Active')
    //    ->where($data)
    //    ->select('customers.*')
    //    ->orderBy('id','desc')
    //    ->paginate(10);
    //    return view('customer.list',compact('customerlists'));
        
        
    // }
    public function search(Request $request)
    {
        $columns = [
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'phonenumber' => 'Phone Number'
        ];
        
        $query = DB::table('customers')->where('status', '=', 'Active');

        if (!empty($request->search)) {
            $searchInput = $request->search;
            $query->where(function ($subQuery) use ($columns, $searchInput) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
                }
            });
        }

        $customerlists = $query
            ->select('customers.*')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('customer.list', compact('customerlists'));
    }
}