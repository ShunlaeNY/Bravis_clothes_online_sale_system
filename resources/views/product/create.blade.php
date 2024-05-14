@extends('layouts.adminlayout')

@section('title')
     Bravis | Product List
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/add_product.css')}}">
@endsection

@php
    $updatestatus = false;
    if(isset($productdata)){
        $updatestatus = true;
    }
@endphp

@section('main')
    <div class="main">
        <h3><b>{{$updatestatus == true ? 'Edit' : 'Add'}} product</b></h3>
        <p>{{$updatestatus == true ? 'Edit' : 'Add'}} your product and necessary information here</p>
        <div class="add_product_form">
            <h3>Basic Information</h3>
            <form class="add_product_grid grid" action="{{$updatestatus == true ? route('ProductUpdateProcess') : route('ProductCreateProcess')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($updatestatus == true)
                    @method('PATCH')
                @endif

            <input type="hidden" name="id" value="{{$updatestatus == true ? $productdata->id :''}}">

                <input type="hidden" name="admin_id" id="admin_id" value="{{auth('admin')->user()->id}}">

                <label for="name">Product Title/Name</label>
                <input type="text" name="name" placeholder="Product Title/Name" value="{{$updatestatus == true ? $productdata->name :''}}">

                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description">{{$updatestatus == true ? $productdata->description :''}}</textarea>

                <label for="image">Product image</label>
                <input type="file" name="image" value="{{$updatestatus == true ? $productdata->image :''}}">

                {{-- <label for="supplier_id">Supplier Name</label>
                <select name="supplier_id" id="supplier_id">
                    @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select> --}}

                <label for="supplier_id">Brand Name</label>
                <select name="supplier_id" id="supplier_id">
                    @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->brand_name}}</option>
                    @endforeach
                </select>

                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>

                <label for="price">Product Price</label>
                <div class="flex_row">
                    <div>MMK</div>
                    <input type="text" name="price" id="price" value="{{$updatestatus == true ? $productdata->price :''}}">
                </div>

                <label>Sizes</label>
                <div class="size flex_row">
                    <div>
                        <label for="small">S</label>
                        <input type="text" name="small" id="small" value="{{$updatestatus == true ? $productdata->small_qty :''}}">
                    </div>
                    <div>
                        <label for="medium">M</label>
                        <input type="text" name="medium" id="medium" value="{{$updatestatus == true ? $productdata->medium_qty :''}}">
                    </div>
                    <div>
                        <label for="large">L</label>
                        <input type="text" name="large" id="large" value="{{$updatestatus == true ? $productdata->large_qty :''}}">
                    </div>
                </div>
                <button class="buttons"><a href="{{route('ProductList')}}">Cancel</a></button>
                <button type="submit" class="buttons">{{$updatestatus == true ? 'Update' : 'Add'}}</button>
            </form>
            
        </div>
    </div>
@endsection

