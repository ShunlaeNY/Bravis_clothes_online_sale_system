@extends('layouts.adminlayout')

@section('title')
    Bravis | SupplierList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/add_staff.css')}}">
@endsection

@php
    $updatestatus = false;
    if(isset($supplierdata)){
        $updatestatus = true;
    }
@endphp

@section('main')
<div class="main">
    <h4><b>{{$updatestatus == true ? 'Update Supplier' : 'Add Supplier'}}</b></h4>
    <p>{{$updatestatus == true ? 'Update' : 'Add'}} your supplier necessary information here</p>
    <form action="{{$updatestatus == true ? route('SupplierUpdateProcess') : route('SupplierCreateProcess')}}" method="post" class="add_staff_form">
        @csrf
        @if ($updatestatus == true)
            @method('PATCH')
        @endif
        <input type="hidden" name="id" value="{{$updatestatus == true ? $supplierdata->id :''}}">
        <div class="grid">
            <label for="name">Supplier Name</label>
            <div>
                <input type="text" name="name" placeholder="Enter Supplier Name" value="{{$updatestatus == true ? $supplierdata->name : ''}}">
                @error('name')
                    <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                @enderror
            </div>
            
            <label for="brand_name">Brand Name</label>
            <div>
                <input type="text" name="brand_name" placeholder="Enter Brand Name" value="{{$updatestatus == true ? $supplierdata->brand_name : ''}}">
                @error('brand_name')
                    <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                @enderror
            </div>
            <input type="hidden" name="admin_id" value="{{auth('admin')->user()->id}}">

            <button><a href="{{route('SupplierList')}}">Cancel</a></button>
            <button type="submit">{{$updatestatus == true ? 'Update' : 'Add'}}</button>
        </div>
    </form>
</div> 
@endsection
