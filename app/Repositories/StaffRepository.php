<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StaffRepository
{
    // public function search(Request $request)
    // {
    //     $columns = [
    //         'name' =>'Staff Name',
    //         'email'=> 'Email',
    //         'address'=>'Address',
    //         'phonenumber'=> 'Phone Number'
    //     ];

    //     $name = 'admins.name';
    //     $roles = 'admins.role_id';
    //     $data = array();

    //     if(!empty($request->search)){
    //         $searchInput = $request->search;
    //         $data = Admin::where('status','=','Active')->where(function ($subQuery) use ($columns, $searchInput) {
    //             foreach ($columns as $column => $label) {
    //                 $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
    //             }
    //         });
    //     }

    //     if(!empty($request->role) && $request->role != 'role'){
    //         $data[count($data)] = [$roles, '=', $request->role];
    //     }




    //     $stafflists = DB::table('admins')
    //                 ->join('roles','roles.id','=','admins.role_id')
    //                 ->where('admins.status','=','Active')
    //                 ->where($data)
    //                 ->select('admins.*','roles.name as rolename')
    //                 ->orderBy('admins.id','desc')
    //                 ->paginate(10);
    //     $roles = DB::table('roles')
    //                 ->select('id','name')
    //                 ->where('status','=','Active')
    //                 ->get();
    //    return view('staff.list',compact('stafflists','roles'));
        
        
    // }
    public function search(Request $request)
    {
        // Define an array mapping columns in the database to the human-readable labels
        $columns = [
            'admins.name' => 'Staff Name',
            'admins.email' => 'Email',
            'admins.address' => 'Address',
            'admins.phonenumber' => 'Phone Number'
        ];

        // Start building the query to search the 'admins' table where status is 'Active'
        $query = Admin::query()->where('admins.status', 'Active');

        // Check if the search input is not empty
        if (!empty($request->search)) {
            $searchInput = $request->search;
            
            // Add conditions to the query to search in multiple columns
            $query->where(function ($subQuery) use ($columns, $searchInput) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
                }
            });
        }

        // Add role filtering if the role is specified and not the default 'role'
        if (!empty($request->role) && $request->role != 'role') {
            $query->where('role_id', '=', $request->role);
        }

        // Finalize the query by joining the 'roles' table and selecting the required columns
        $stafflists = $query->join('roles', 'roles.id', '=', 'admins.role_id')
                            ->select('admins.*', 'roles.name as rolename')
                            ->orderBy('admins.id', 'desc')
                            ->paginate(10);

        // Retrieve the active roles for the filter dropdown
        $roles = DB::table('roles')
                    ->select('id', 'name')
                    ->where('status', '=', 'Active')
                    ->get();

        // Return the view 'staff.list' with the paginated staff list data and roles
        return view('staff.list', compact('stafflists', 'roles'));
    }
}