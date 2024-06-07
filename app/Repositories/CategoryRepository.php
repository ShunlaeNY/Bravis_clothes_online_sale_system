<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function search(Request $request)
    {
        // dd($request->all());
        $name = 'categories.name';
        $admin_name = 'admins.name';
        $data = array();
        if(!empty($request->name)){
            $data[count($data)] = [$name, 'LIKE','%' .$request->name.'%'];
        }
        if(!empty($request->admin)){
            $data[count($data)] = [$admin_name, 'LIKE','%' .$request->admin_name.'%'];
        }
       $categorylists = DB::table('categories')
       ->join('admins', 'categories.admin_id', '=', 'admins.id')
       ->where('categories.status','=','Active')
       ->where($data)
       ->select('categories.*','admins.name as admin_name')
       ->orderBy('categories.id','desc')
       ->paginate(5);
       return view('category.list',compact('categorylists'));
        
        
    }
}