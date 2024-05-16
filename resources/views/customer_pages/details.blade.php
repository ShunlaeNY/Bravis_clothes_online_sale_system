@extends('layouts.customerlayout')

@section('title')
    Bravis | Product Details
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/category/category_sort.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/pages/category/men/detail/men_tee_detail.css')}}">
@endsection

@section('content')
    <div class="shopping_cart_box">
        <div class="flex_row">
            <h1>Cart</h1>
            <i class="fa-regular fa-circle-xmark close_button"></i>
        </div>
        <hr> 
        <div class="tee1_pick flex_row">
            <div class="img">
                <img src="/images/09_2_1_3_1000_1000 1.png" alt="">
            </div>
            <div class="pick_detail">
                <p>Men’s Neck Solid Color Short Sleeve Tee</p>
                <p>12500MMK</p>
                <div class="flex_row">
                    <div class="add_or_remove_quantity grid">
                        <div class="minus">-</div>
                        <div class="number">1</div>
                        <div class="plus">+</div>
                    </div>
                    <div class="remove_button">
                        Remove
                    </div>
                </div>
            </div>
        </div> 
        <a href="../../checkout/index.html" class="button2 checkout_button">Check out</a>  
    </div>
    <div class="section2 flex_row">

        <div class="img">
            <img src="{{asset('image/admin/products_info/'.$productdata->image)}}" alt="">
        </div>
        <div class="text">
            <p class="title">{{ $productdata->name }} </p>
            <p class="price"> Price - {{ number_format(floatval($productdata->price)) }} MMK</p>
            <div class="sizes flex_row">
                <label><b>Sizes -</b></label>
                <input type="checkbox" name="small" id="small">Small
                <input type="checkbox" name="medium" id="medium">Medium
                <input type="checkbox" name="Large" id="Large">Large
            </div>
            <p class="description">
                {{ $productdata->description }}
            </p>
            
            <div class="flex_row add_to_cart">
                <a href="" class="button2 pick_item">
                    Add to cart
                </a>
            </div>
            <div class="flex_row delivery_text">
                <img src="{{ asset('image/customer/delivery-truck_2769339.png') }}" alt=""
                style="width: 40px; height: 40px;margin :0 10px">
                <p class="free_deli">Free delivery on orders over 5lakhs.</p>
            </div>
        </div>
    </div>
    <div class="recommend">
        <h1>You may also like</h1>
        <div class="recommend_list grid">
            @foreach ($productByGender as $item)
            <a href=" {{ route('ProductDetailsPage' , $item->id ) }} ">
                <div>
                    <img src=" {{asset('image/admin/products_info/'.$item->image)}} " alt="">
                    <p><b>{{ $item->name }}</b></p>
                    <p>Gender : {{ $item->gender }} </p>
                    <p>Price :  {{ number_format(floatval($item->price)) }} MMK </p>
                </div>
            </a>
        @endforeach
            
        </div>
    </div>
@endsection
    
<!-- script -->
@section('js')
        <script src="asset('js/customer/pick_item.js')"></script>
        <script src="asset('js/customer/pick_size.js)"></script>
 @endsection

