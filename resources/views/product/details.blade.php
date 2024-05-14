@extends('layouts.adminlayout')
@section('title')
    Bravis | Product List
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
@section('main')
{{-- {{dd($categoryname[0]->name)}} --}}
        <div class="main">
            <div class="session1 flex_row">
                <h3>Product Details</h3>
                <a href="{{route('ProductList')}}">Back</a>
            </div>
            <div class="session2">
                <table class="product_details">
                    <tr>
                        <td colspan="3">
                            <img src="{{asset('image/admin/products_info/'.$productdetails->image)}}" alt="image of {{$productdetails->image}}" width="150px" height="auto">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Product Name</b></td>
                        <td>-</td>
                        <td>{{$productdetails->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Product Description</b></td>
                        <td>-</td>
                        <td>{{$productdetails->description}}</td>
                    </tr>
                    <tr>
                        <td><b>Category</b></td>
                        <td>-</td>
                        <td>{{$category[0]->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Supplier</b></td>
                        <td>-</td>
                        <td>{{$supplier[0]->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Brand</b></td>
                        <td>-</td>
                        <td>{{$supplier[0]->brand_name}}</td>
                    </tr>
                    <tr>
                        <td><b>Uploaded By</b></td>
                        <td>-</td>
                        <td>{{$admin[0]->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Price</b></td>
                        <td>-</td>
                        <td>{{$productdetails->price}}</td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td>-</td>
                        <td>{{$productdetails->gender}}</td>
                    </tr>
                    <tr>
                        <td><b>Size</b></td>
                        <td>-</td>
                        <td>Small-{{$productdetails->small_qty}}, 
                            Medium-{{$productdetails->medium_qty}},
                            Large-{{$productdetails->large_qty}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection