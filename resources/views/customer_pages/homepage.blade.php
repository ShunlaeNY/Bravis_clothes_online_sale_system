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
            <h1>
                Express Your Unique Style
            </h1>
            <p>Timeless Classics</p>
            <a href=""><button>Shop Now<i class="fa-solid fa-arrow-right-long"></i></button></a>
        </div>
    </div>
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
                                    <div class="flex_col">
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
                <a href="" class="men flex_col">
                    Men Clothing
                </a>
                <a href="" class="women flex_col">
                    Women Clothing
                </a>
                <a href="" class="accessories flex_col">
                    Accessories
                </a>                
                <a href="" class="sport_wear flex_col">
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