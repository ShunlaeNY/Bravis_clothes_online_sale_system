@extends('layouts.adminlayout')
@section('title')
    Bravis | Product List
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
@section('main')
{{-- alert --}}
<div class="alert warning">
    <span class="closebtn">&times;</span>  
    <strong>Warning!</strong> You don't have Permissions for this action!
</div>
<div class="main">
    <div class="session1 flex_row">
        <h3>Products</h3>
        @if (auth('admin')->user()->role_id === 1)
            <a href="{{route('ProductCreate')}}">+ Add Product</a>
        @else
            <a class="alert_btn">+ Add Product</a>
        @endif
    </div>
    <div class="session2">
        <form action="{{route('SearchProducts')}}" method="get" class="grid">
            {{-- @csrf --}}
            <input type="text" name="name" placeholder="Search by Product Name">
            <select name="category" id="category">
                <option value="category">Select Category...</option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <input type="text" name="min_price" placeholder="Min Price">
            <input type="text" name="max_price" placeholder="Max Price">
            <div class="buttons flex_row">
                <button type="submit" class="filter_button button">Filter</button>
                <a href="{{route('ProductList')}}" class="reset_button button">Reset</a>
            </div>
        </form>
    </div>
    <div class="session3">
        <table>
            <tr>
                <th class="first_title">Product Name</th>
                <th class="category">Category</th>
                <th class="brand">Brand</th>
                <th class="price">Price</th>
                <th class="size">Sizes</th>
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
                    <td class="category">{{$productlist->categoryname}}</td>
                    <td class="brand">{{$productlist->brand}}</td>
                    <td class="price">{{$productlist->price}}</td>
                    <td class="size">
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
                        <div class="btn-container">
                            <button class="infoBtn" data-product-id="{{ $productlist->id }}">
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                            @if (auth('admin')->user()->role_id === 1)
                                <a href="{{url('admin/dashboard/productlist/edit/'.$productlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="deleteBtn" data-product-id="{{ $productlist->id}}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>  
                            @else
                                <button class="warningBtn" warn-product-id="{{ $productlist->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="warningBtn" warn-product-id="{{ $productlist->id }}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                                
                            @endif
                        </div>
                    </td>
                </tr>
                {{-- Info Modal for each product --}}
                <div id="infoModal_{{ $productlist->id }}" class="modal">
                    <div class="modal-content">
                        <div class="flex_row" style="justify-content: space-between;">
                            <h2>{{ $productlist->name }}</h2>
                            <span class="close_info">&times;</span>
                        </div>
                        <div class="flex_col" style="margin-bottom: 30px">
                            <div class="grid model-grid">
                                <div>
                                    <img src="{{ asset('image/admin/products_info/' . $productlist->image) }}" alt="photo of {{ $productlist->name }}" width="150px" height="auto" style="border: 1px solid rgba(100, 100, 100, 0.473);align-self:center">
                                </div>
                                <div>
                                    <p>Category: {{ $productlist->categoryname }}</p>
                                    <p>Uploaded By: {{ $productlist->adminname }}</p>
                                    <p>Supplier: {{ $productlist->suppliername }}</p>
                                    <p>Gender: {{ $productlist->gender }}</p>
                                </div>
                            </div>
                            <div>
                                <p>Brand   : {{ $productlist->brand }}</p>
                                <p>Price   : {{ $productlist->price }} MMK</p>
                                <p>Sizes   :</p>
                                <ul >
                                    <li>S: {{ $productlist->small_qty }}</li>
                                    <li>M: {{ $productlist->medium_qty }}</li>
                                    <li>L: {{ $productlist->large_qty }}</li>
                                </ul>
                                <p>Description : </p>
                                <small>{{$productlist->description}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Warning Modal for each product --}}
                <div id="warningModal_{{ $productlist->id }}" class="modal">
                    <div class="modal-content">
                        <div class="flex_row" style="justify-content: space-between;">
                            <h2>Warning</h2>
                            <span class="close_info">&times;</span>
                        </div>
                        <p>You don't have permission for this action.</p>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

    <div class="Pagination">
        {{$productlists->links('pagination::bootstrap-4')}}
    </div>
    <!-- The Modal for Delete-->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="flex_row" style="justify-content: space-between;">
                <h3>Delete Product</h3>
                <span class="close">&times;</span>
            </div>
            <p>Do you want to delete this product?</p>
            <form id="deleteForm" action="{{ route('ProductDelete') }}" method="post" class="flex_row" style="justify-content: flex-end">
                @csrf
                <input type="hidden" name="product_id" id="modal_product_id">
                <button type="submit" class="change_button">Delete</button>
            </form>
        </div>
    </div>
</div>

{{-- JavaScript for Modals --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Info Modals
        var infoButtons = document.querySelectorAll('.infoBtn');
        infoButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = this.getAttribute('data-product-id');
                var modal = document.getElementById("infoModal_" + productId);
                modal.style.display = "block";
            });
        });

        // Warning Modals
        var warningButtons = document.querySelectorAll('.warningBtn');
        warningButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = this.getAttribute('warn-product-id');
                var modal = document.getElementById("warningModal_" + productId);
                modal.style.display = "block";
            });
        });

        // Close Modals
        var closeInfoSpans = document.querySelectorAll('.close_info');
        closeInfoSpans.forEach(function (span) {
            span.addEventListener('click', function () {
                var modal = this.closest('.modal');
                modal.style.display = "none";
            });
        });

        // Window click to close modals
        window.onclick = function (event) {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function (modal) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        }

        // Delete Modal
        var deleteModal = document.getElementById("deleteModal");
        var deleteButtons = document.querySelectorAll('.deleteBtn');
        var productIdInput = document.getElementById('modal_product_id');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = this.getAttribute('data-product-id');
                productIdInput.value = productId;
                deleteModal.style.display = "block";
            });
        });

        // Close delete modal
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function () {
            deleteModal.style.display = "none";
        }
    });
</script>
@endsection
