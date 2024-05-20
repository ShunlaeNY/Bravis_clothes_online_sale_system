<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SupplierRepository
{
    public function search(Request $request)
    {
        // dd($request->all());
        $supplier = 'name';
        $brand = 'brand_name';
        $data = array();
        if(!empty($request->supplier_name)){
            $data[count($data)] = [$supplier, 'LIKE','%' .$request->supplier_name.'%'];
        }
        if(!empty($request->brand_name)){
            $data[count($data)] = [$brand, 'LIKE','%' .$request->brand_name.'%'];
        }
       $supplierlists = DB::table('suppliers')
       ->where('status','=','Active')
       ->where($data)
       ->select('suppliers.*')
       ->orderBy('id','desc')
       ->paginate(10);
       return view('supplier.list',compact('supplierlists'));
        
        
    }
}