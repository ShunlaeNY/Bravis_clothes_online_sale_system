@extends('layouts.customerlayout')
@section('title')
    Bravis
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/card_slider.css')}}">
@endsection

@section('content')
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
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/woman-green-hoodie-jacket-winter-apparel-shoot.jpg" alt="">
                            <div>
                                <p>Women’s Sweat Shirt</p>
                                <p>35000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/man-wearing-blank-shirt.jpg" alt="">
                            <div>
                                <p>Men’s Back Polo Shirt</p>
                                <p>45000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/shirt-3737407_1280.jpg" alt="">
                            <div>
                                <p>Men’s Gray Coat</p>
                                <p>25000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
                        <div class="flex_col">
                            <img src="images/comfortable-jogger-pants-gray-studio-apparel.jpg" alt="">
                            <div>
                                <p>Men’s Gray Jogger Pants</p>
                                <p>40000MMK</p>
                            </div>
                        </div>
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
                <div class="men">
                    Men Clothing
                </div>
                <div class="women">
                    Women Clothing
                </div>
                <div class="accessories">
                    Accessories
                </div>                
                <div class="sport_wear">
                    Sport Wear
                </div>
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
            <button class="button1">Follow Us</button>
        </div>
    </div>
@endsection


    
@section('js')
<script src="{{asset('js/customer/slide_show_button.js')}}" defer></script>
@endsection

    
</body>
</html>