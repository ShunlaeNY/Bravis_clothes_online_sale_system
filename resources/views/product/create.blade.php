@extends('layouts.adminlayout')

@section('title')
    Product List
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/pages/admin/product/add_product.css')}}">
@endsection

@section('main')
    <div class="main">
        <h3><b>Add product</b></h3>
        <p>Add your product and necessary information here</p>
        <div class="add_product_form">
            <h3>Basic Information</h3>
            <form class="add_product_grid grid" action="" method="">
                <label>Product Title/Name</label>
                <input type="text" placeholder="Product Title/Name">

                <label>Product Description</label>
                <img src="/image/summbernote.png" alt="" style="width: 100%; height: 150px;">

                <label>Product image</label>
                <img src="/image/file_drag.png" alt="" style="width: 100%; height: 150px;">

                <label>Category</label>
                <div>
                    <select name="" id="">
                        <option value="">Select Category</option>
                    </select><br><br>
                    <select name="" id="">
                        <option value="">Select Sub Category</option>
                    </select>
                </div>

                <label>Product Price</label>
                <div class="product_price flex_row">
                    <div>MMK</div>
                    <input type="text" placeholder="0">
                </div>
                <label>Product Quantity</label>
                <input type="text" placeholder="0">
                <label>Size</label>
                <div class="size flex_row">
                    <input type="checkbox">S
                    <input type="checkbox">M
                    <input type="checkbox">L
                    <input type="checkbox">XL
                    <input type="checkbox">XXL
                </div>
                <button class="buttons">Cancel</button>
                <button class="buttons">Add Product</button>
            </form>
            
        </div>
    </div>
@endsection

