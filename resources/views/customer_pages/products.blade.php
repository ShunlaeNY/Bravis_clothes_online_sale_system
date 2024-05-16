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