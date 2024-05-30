<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierController extends Controller
{
    protected $SupplierRepository;
    public function __construct(SupplierRepository $supplierRepository){
        $this->SupplierRepository = $supplierRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function supplierlist()
    {
        //
        $supplierlists = DB::table('suppliers')
                        ->where('status','Active')
                        ->paginate(5);
        return view('supplier.list',compact('supplierlists'));
    }

    public function search(Request $request){
        $response = $this->SupplierRepository->search($request);
        return $response;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function suppliercreate()
    {
        //
        return view('supplier.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            
        ]);
        $uuid = Str::uuid()->toString(); //uuid to string
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->brand_name = $request->brand_name;
        $supplier->uuid = $uuid;
        $supplier->status = "Active";
        $supplier->save();
        return redirect()->route('SupplierList')->with('success','Supplier created successfully');

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
    public function supplieredit(string $id)
    {
        //
        $supplierdata = Supplier::find($id);
        return view('supplier.create',compact('supplierdata'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function supplierupdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            
        ]);
        //
        $uuid = Str::uuid()->toString(); //uuid to string
        $supplierupdate = Supplier::find($request->id);
        $supplierupdate->name = $request->name;
        $supplierupdate->brand_name = $request->brand_name;
        $supplierupdate->uuid = $uuid;
        $supplierupdate->update();
        return redirect()->route('SupplierList')->with('success','Supplier updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function supplierdelete(string $id)
    {
        //
        $supplierdel = Supplier::find($id);
        $supplierdel->status = "Inactive";
        $supplierdel->update();
        // $categorydelete->delete();
        return redirect()->route('SupplierList')->with('success','Supplier deleted successfully');

    }
}
