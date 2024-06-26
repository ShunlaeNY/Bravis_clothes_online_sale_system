@extends('layouts.masterproduct')
@section('categoryname')
    @if ($categoryname == null)
        All products
    @else
        {{$categoryname}}
    @endif
@endsection

@section('category_link')
    @if ($categoryname == null)
        <a href="{{route('CustomerSideProductList')}}">All Products</a>
    @else
        <a href="{{route('CustomerSideProductList')}}">{{$categoryname}}</a>
    @endif
@endsection

@section('filter')

    <div class="filter">
        <div class="flex_row">
            <form action="{{route('Search')}}" method="post" class="search">
                @csrf
                <input type="text" name="search" class="input" placeholder="Search...">
                <input type="hidden" name="categoryname" value="{{$categoryname}}">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="sort_by flex_row">
                 <form action="{{route('Sort')}}" method="post" id="sortForm">
                    @csrf
                    <input type="hidden" name="categoryname" id="categoryname" value="{{$categoryname}}">
                    <span>Sort By:</span>
                    <select name="sort" id="sort" class="input" onchange="document.getElementById('sortForm').submit()">
                        <option value="sort" {{request('sort') == 'sort' ? 'selected' : ''}}>Choose...</option>
                        <option value="low_to_high_price" {{request('sort') == 'low_to_high_price' ? 'selected' : ''}}>Lower to Higher Price</option>
                        <option value="high_to_low_price" {{request('sort') == 'high_to_low_price' ? 'selected' : ''}}>Higher to Lower Price</option>
                        <option value="most_selling" {{request('sort') == 'most_selling' ? 'selected' : ''}}>Most Selling Products</option>
                        <option value="latest" {{request('sort') == 'latest' ? 'selected' : ''}}>Latest Products</option>
                    </select>
                    {{-- <button type="submit" class="filter_btn"><i class="fa-solid fa-filter"></i></button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
@section('product_list')
    @if ($products->isEmpty())
        <div class="flex_row" style="justify-content: center"><h3>No product found!</h3></div>
    @else
        <div class="men_tee_list grid">
        @foreach ($products as $product)
            <a href=" {{ route('ProductDetailsPage' , $product->id ) }} ">
                <div>
                    <img src=" {{asset('image/admin/products_info/'.$product->image)}} " alt="">
                    <p><b>{{ $product->name }}</b></p>
                    <p>Gender : {{ $product->gender }} </p>
                    <p>Category : {{ $product->categoryname }} </p>
                    <p>Price :  {{ number_format(floatval($product->price)) }} MMK </p>
                </div>
            </a>
        @endforeach
        </div>
    @endif
@endsection