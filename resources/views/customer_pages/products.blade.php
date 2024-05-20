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
                {{-- <a href="{{Route('CustomerSideProductList')}}">Reset</a> --}}
            </form>
            <div class="sort_by flex_row">
                 <form action="{{route('Sort')}}" method="post">
                    @csrf
                    <span>Sort By Price:</span>
                    <select name="sort" id="sort" class="input">
                        <option value="sort">Choose...</option>
                        <option value="low_to_high_price">Lower to Higher</option>
                        <option value="high_to_low_price">Higher to Lower</option>
                    </select>
                    <button type="submit" class="filter_btn"><i class="fa-solid fa-filter"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('product_list')
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
@endsection