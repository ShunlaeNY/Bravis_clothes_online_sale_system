<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categorylist()
    {
        //
        $categorylists = DB::table('categories')
                        ->join('admins','admins.id','=','categories.admin_id')
                        ->where('categories.status','=','Active')
                        ->select('categories.*','admins.name as admin_name')
                        ->get();
                        // dd($categorylists);
        return view('category.list',compact('categorylists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categorycreate()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $uuid = Str::uuid()->toString(); //uuid to string
        $category = new Category();
        $category->name = $request->name;
        $category->uuid = $uuid;
        $category->admin_id = $request->admin_id;
        $category->status = "Active";
        $category->save();
        return redirect()->route('CategoryList')->with('success','Category created successfully');

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
    public function categoryedit($id)
    {
        //
        $categorydata = Category::find($id);
        return view('category.create',compact('categorydata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryupdate(Request $request)
    {
        //
        $uuid = Str::uuid()->toString(); //uuid to string
        $categoryupdate = Category::find($request->id);
        $categoryupdate->name = $request->name;
        $categoryupdate->uuid = $uuid;
        $categoryupdate->update();
        return redirect()->route('CategoryList')->with('success','Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function categorydelete(string $id)
    {
        //
        $categorydel = Category::find($id);
        $categorydel->status = "Inactive";
        $categorydel->update();
        // $categorydelete->delete();
        return redirect()->route('CategoryList')->with('success','Category deleted successfully');
    }
}
