<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\StaffRepository;

class StaffController extends Controller
{
    protected $StaffRepository;
    public function __construct(StaffRepository $staffRepository)
    {
        $this->StaffRepository = $staffRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function stafflist()
    {
        //
        $stafflists = DB::table('admins')
                    ->join('roles','roles.id','=','admins.role_id')
                    ->where('admins.status','=','Active')
                    ->select('admins.*','roles.name as rolename')
                    ->get();
        $roles = DB::table('roles')
                    ->select('id','name')
                    ->where('status','=','Active')
                    ->get();
        // dd($roles);
        return view('staff.list',compact('stafflists','roles'));
    }

    public function search(Request $request)
    {
        $response = $this->StaffRepository->search($request);
        return $response;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function staffcreate()
    {
        //
        $roles = DB::table('roles')
                ->select('id','name')
                ->where('status','=','Active')
                ->get();
        // dd($roles);
        return view('staff.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->role_id);
        // dd($request);
        $uuid = Str::uuid()->toString(); //uuid to string
        $image = $uuid . '.' . $request->image->extension(); //change image name
        $request->image->move(public_path('image/admin/staffs_info'), $image);//move img under this dir
        // to save under admin table
        $staff = new Admin();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->phonenumber = $request->phonenumber;
        $staff->role_id = $request->rolename;
        $staff->password = bcrypt($request->password);
        $staff->image = $image;
        $staff->uuid = $uuid;
        $staff->status = "Active";
        $staff->save();
        return redirect()->route('StaffList');
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
    public function staffedit($id)
    {
        //
        // dd($id);
        $roles = DB::table('roles')
                ->select('id','name')
                ->where('status','=','Active')
                ->get();
        $staffdata = Admin::find($id);
        return view('staff.create',compact('roles','staffdata'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function staffupdate(Request $request)
    {
        //
        // dd($request);
        $uuid = Str::uuid()->toString(); //uuid to string
        $staffupdate = Admin::find($request->id);
        $staffupdate->name = $request->name;
        $staffupdate->email = $request->email;
        $staffupdate->address = $request->address;
        $staffupdate->uuid = $uuid;
        $staffupdate->phonenumber = $request->phonenumber;
        $staffupdate->password = bcrypt($request->password);
        if($request->image == null){
            
            $staffupdate->update();
        }
        else{
            $image = $uuid . '.' . $request->image->extension(); //change image name
            $request->image->move(public_path('image/admin/staffs_info'), $image);//move img under this dir    
            $staffupdate->image = $image;
            $staffupdate->update();
        }
        return redirect()->route('StaffList')->with('success','Staff Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function staffdelete($id){
        // dd($id);
        $staffdel = Admin::find($id);
        $staffdel->status = 'Inactive';
        $staffdel->update();
        return redirect()->route('StaffList')->with('success','Staff Deleted Successfully');
        
    }
}
