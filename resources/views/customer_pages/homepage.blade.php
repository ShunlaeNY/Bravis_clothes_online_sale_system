@extends('layouts.customerlayout')
@section('title')
    Bravis
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/card_slider.css')}}">
@endsection

@section('content')
    <div class="section1_body flex_row">
        <div class="image">
            <img src="{{ asset('image/customer/man-black-sweater-black-bucket-hat-youth-apparel-shoot.png') }}"
                alt="" >
        </div>
        <div class="text">
            <h1 class="text_title">
                Express Your Unique Style
            </h1>
            <p>Timeless Classics</p>
            <a href="{{route('CustomerSideProductList')}}"><button>Shop Now<i class="fa-solid fa-arrow-right-long"></i></button></a>
        </div>
    </div>

    {{-- cart --}}
    {{-- @if (session()->has('cartdata'))
        <div class="shopping_cart_box">
            <form action="" method="get" class="form">
                <div class="flex_row">
                    <h1>Cart</h1>
                    <i class="fa-regular fa-circle-xmark close_button"></i>
                </div>
                <hr>
                @php
                    $arr = [];
                @endphp
                <div class="item-container">
                    @forelse ($cartarray as $cartdata)
                        <div class="tee1_pick flex_row">
                            @foreach ($productlists as $item)
                            <div class="image">
                                <img src="{{asset('image/admin/products_info/'.$item->image)}}" alt="">
                            </div>
                            <div class="pick_detail">
                                <p>{{$item->name}}</p>
                                <p>{{$item->price}}MMK per one</p>
                                <div class="add_or_remove_quantity grid">
                                    <div class="minus">
                                        <a href="">-</a>
                                    </div>
                                    <div class="number">
                                        {{$data['quantity']}}
                                    </div>
                                    <div class="plus">
                                        <a href="">+</a>
                                    </div>
                                </div>
                                <div class="remove_button">
                                    <a href="" class="remove_button">
                                        Remove
                                    </a>
                                </div>
                            </div>
                            <p>Total -{{$item->price * $data['quantity']}} MMK</p>
                            @endforeach
                            <?php
                                array_push($arr,{{$item->price * $data['quantity']}});
                            ?>
                        </div>
                    @empty   
                    @endforelse

                    @php
                        $totalItemPrice = array_reduce($arr, function ($x, $y) {
                            return $x + $y;
                        }, 0); // 0 is the initial value
                    @endphp
                    <div class="totalItemPrice">
                        <p>Total Item Price - {{$totalItemPrice}} MMK</p>
                        <input type="hidden" name="total_price" value="{{$totalItemPrice}}">
                        <input type="hidden" name="total_items" value="{{count($cartarray)}}">
                    </div>
                    <div class="checkout">
                        <button type="submit" class="button2 checkout_button">Check out</button>
                    </div>
                </div>
            </form>
        </div>
    @else 
    @endif --}}
    {{-- end of cart --}}

    <div class="section2">
        <div class="fast_icons_list flex_row">
            <div class="fast_icons flex_row">
                <img src="{{asset('assets/icons/credit-card_4021708 (1).png')}}" alt="">
                <div>
                    <p>
                        Flexible Payment
                    </p>
                    <p>Pay With Multiple Cards</p>
                </div>
            </div>
            <div class="fast_icons flex_row">
                <img src="{{asset('image/customer/delivery-truck_2769339.png')}}" alt="">
                <div>
                    <p>Delivery</p>
                    <p>Free Delivery over 5lakhs</p>
                </div>
            </div>
            <div class="fast_icons flex_row">
                <img src="{{asset('assets/icons/headphones_1250595.png')}}" alt="">
                <div>
                    <p>Customer Service</p>
                    <p>24/7 Active</p>
                </div>
            </div>
        </div>
        <div class="new_arrival" id="shop_now">
            <h1>New Arrival</h1>
            <div class="new_arrival_list container">
                <div class="slider-wrapper">
                    <button id="prev_slide" class="slide-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="card-list grid">
                            @foreach ($productlists as $productlist)
                                <a href="{{url('/productdetails/'.$productlist->id)}}">
                                    <div class="flex_col card-list-items">
                                        <img src="{{asset('image/admin/products_info/'.$productlist->image)}}" alt="image of {{$productlist->image}}">
                                        <div>
                                            <p>{{$productlist->name}}</p>
                                            <p>{{$productlist->price}}MMK</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach 
                    </div>
                    <button id="next_slide" class="slide-button"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div class="slider-scrollbar flex_row">
                    <div class="scrollbar-track">
                        <div class="scrollbar-thumb"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ready2Wear">
            <h1>Ready To Wear Perfection</h1>
            <div class="ready2Wear_item grid">
                <a href="{{route('CustomerSideProductList', ['category' => 'Men Fashion']) }}" class="men flex_col">
                    Men Clothing
                </a>
                <a href="{{ route('CustomerSideProductList', ['category' => 'Women Fashion']) }}" class="women flex_col">
                    Women Clothing
                </a>
                <a href="{{ route('CustomerSideProductList', ['category' => 'Accessories']) }}" class="accessories flex_col">
                    Accessories
                </a>                
                <a href="{{ route('CustomerSideProductList', ['category' => 'Sport Wears']) }}" class="sport_wear flex_col">
                    Sport Wear
                </a>
            </div>
        </div>
        <div class="follow_us">
            <h3>Follow us</h3>
            <p>@bravisSLNY</p>
            <div class="image flex_row">
                <div>
                    <img src="image/customer/iam_os-9wM5SCjhsOM-unsplash (1) 1.png" alt="">
                </div>
                <div>
                    <img src="image/customer/trendy-fashionable-couple-posing (1).jpg" alt="">
                </div>
                <div>
                    <img src="image/customer/portrait-stylish-lady-sunglasses-wide-brimmed-hat-cool-young-woman-black-jacket-pants-poses-smiles-isolated-background 1.png" alt="">
                </div>  
            </div>
            <a href="{{route('ContactUs')}}" class="button1">Follow Us</a>
        </div>
    </div>
@endsection


    
@section('js')
<script src="{{asset('js/customer/slide_show_button.js')}}" defer></script>
@endsection

    
</body>
</html>