@extends('layouts.adminlayout')
@section('title')
    Bravis | Product List
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
@section('main')
        <div class="main">
            <div class="session1 flex_row">
                <h3>Products</h3>
                @if (auth('admin')->user()->role_id === 1)
                    <a href="{{route('ProductCreate')}}">+ Add Product</a>
                @endif
            </div>
            <div class="session2">
                <div class="grid">
                    <input type="text" placeholder="Search">
                    <select name="" id="">
                        <option value="">Category</option>
                    </select>
                    <input type="text" placeholder="Price">
                    <div class="buttons flex_row">
                        <button class="filter_button">Filter</button>
                        <button class="reset_button">Reset</button>
                    </div>
                </div>
            </div>
            <div class="session3">
                {{-- <div style="overflow-x: auto;"> --}}
                    <table>
                        <tr>
                            <th class="first_title">Product Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Sizes</th>
                            <th class="last_title">Action</th>
                        </tr>
                        @foreach ($productlists as $productlist)
                            <tr>
                                <td>
                                    <div class="flex_row product_image">
                                        <img src="{{asset('image/admin/products_info/'.$productlist->image)}}" alt="photo of {{$productlist->name}}" width="35px" height="35px">
                                        <p>{{$productlist->name}}</p>
                                    </div>
                                </td>
                                <td>{{$productlist->categoryname}}</td>
                                <td>{{$productlist->brand}}</td>
                                <td>{{$productlist->price}}</td>
                                <td>
                                    <div class="flex_row sizes">
                                        <div class="qty_box">
                                            <p>S-{{$productlist->small_qty}}/{{$productlist->small_qty+$productlist->medium_qty+$productlist->large_qty}}</p>
                                        </div>
                                        <div class="qty_box">
                                            <p>M-{{$productlist->medium_qty}}/{{$productlist->small_qty+$productlist->medium_qty+$productlist->large_qty}}</p>
                                        </div>
                                        <div class="qty_box">
                                            <p>L-{{$productlist->large_qty}}/{{$productlist->small_qty+$productlist->medium_qty+$productlist->large_qty}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{url('admin/dashboard/productlist/details/'.$productlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-circle-info"></i></a>
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/productlist/edit/'.$productlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/productlist/delete/'.$productlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                        
    
                    </table>
                {{-- </div> --}}

            </div>
        </div>
    </div>
@endsection