<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/add_to_card.css')}}">
    @yield('css')
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  
    <div class="section1">
        
        <!-- navi -->
        <div class="navigation flex_col">
            <div class="flash_sale_bar flex_row">
                <div class="flash_sale">
                    "Find your fashion flair with Bravis's handpicked collection of stylish essentials and statement pieces."
                </div>
                <div>
                    Welcome!
                    @if (auth('customer')->user() != null)
                        {{auth('customer')->user()->fname}} {{auth('customer')->user()->lname}}
                    @else
                        Guest
                    @endif
                </div>
                <div class="link">
                    {{-- <a href="">FAQ</a>|
                    <a href="">orders and returns</a>| --}}
                    @if (auth('customer')->user() != null)
                        
                    @else
                        <a href="{{route('CustomerLogin')}}">Log In</a>
                    @endif
                </div>
            </div>
            <div class="nav_bar flex_row">
                <div class="logo">
                    <a href="{{route('Home')}}">Bravis</a>
                </div>
                <div class="menu flex_row">
                    <div class="home">
                        <a href="{{route('Home')}}">Home</a>
                    </div>
                    <div class="women drop_down">
                        <a href="{{ route('CustomerSideProductList', ['category' => 'Women Fashion']) }}">Women Fashion</a>
                    </div>
                    <div class="men drop_down">
                        <a href="{{ route('CustomerSideProductList', ['category' => 'Men Fashion']) }}" >Men Fashion</a>
                    </div>
                    <div class="Accessories">
                        <a href="{{ route('CustomerSideProductList', ['category' => 'Accessories']) }}">Accessories</a>
                    </div>
                    <div class="sport_wears">
                        <a href="{{ route('CustomerSideProductList', ['category' => 'Sport Wears']) }}">Sport Wears</a>
                    </div>
                </div>
                <div class="extra_icon flex_row" style="align-items: center;">
                    <div class="add_to_cart_icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>{{count($cartarray)}}</span>
                    </div>
                    @if (auth('customer')->user() != null)
                        <div class="user_profile" style=" width:40px; height:40px;">
                            <img src="{{asset('image/customer/customers_info/' .auth('customer')->user()->image)}}" alt="" style="border-radius: 50%">
                        </div>
                        <!-- user Profile Info -->
                        <div class="user_profile_info">
                            <a href="{{url('customer/editprofile/'.auth('customer')->user()->id)}}"><i class="fa-solid fa-gear"></i>Edit Profile</a><br>
                            <a href="{{route('CustomerLogout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
                        </div>
                        
                    @else
                        <div class="login_ph">
                            <a href="{{route('CustomerLogin')}}">Login</a> 
                        </div>   
                    @endif
                    
                </div>
            </div>
            <div id="myNav1" class="overlay1">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content1">
                    <a href="{{route('Home')}}">Home</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Women Fashion']) }}">Women Fashion</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Men Fashion']) }}" >Men Fashion</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Accessories']) }}">Accessories</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Sport Wears']) }}">Sport Wears</a>
                    <a href="{{ route('CustomerSideProductList')}}">All Products</a>
                    <a href="{{route('AboutUs')}}">About</a>
                    <a href="{{route('ContactUs')}}">Contact</a>
                    <a href="{{route('PrivacyPolicy')}}">Policy</a>
                </div>
              </div>
              <div class="flex_row" style="justify-content: space-between; align-items:center;padding:5px 0px;">
                <div class="sticky" style="font-size:30px;cursor:pointer" onclick="openNav()">
                    &#9776; Bravis
                </div>
              </div>
    </div>
    {{-- session start --}}
    @if (session()->has('cartdata'))
    {{-- {{dd(session()->get('cartdata'))}} --}}
    <div class="shopping_cart_box">
        <form action="{{route('CheckOut')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex_row">
                <h1>Cart</h1>
                <i class="fa-regular fa-circle-xmark close_button"></i>
            </div>
            <hr>
            @php
                $array = [];//create an empty array
            @endphp
            <div class="item-container">
                <div class="scroll">
                    @forelse ($cartarray as $item) 
                    <div class="tee1_pick flex_row">
                        <div class="img" style="height:125px !important;">
                            <img src="{{asset('image/admin/products_info/'.$item['image'])}}" alt="" width="100%" height="100%">
                        </div>
                        <div class="pick_detail">
                            <p><b>{{$item['name']}}</p><span>({{$item['size']}})</b></span>
                            <p>Price - {{$item['price']}}MMK</p>
                            <div class="add_or_remove flex_row">
                                <div class="add_or_remove_quantity grid">
                                    <form action="{{route('AddToCart.show')}}" method="post" class="minus">
                                        @csrf
                                        <input type="hidden" name="removeQty" id="" value="true">
                                        <input type="hidden" name="addToCart" id="" value="{{true}}">
                                        <input type="hidden" name="sizes" id="" value="{{$item['size']}}">  
                                        <input type="hidden" name="product_id" id="" value="{{$item['product']}}">
                                        <button formaction="{{route('AddToCart.show')}}" type="submit" class="minus_btn">-</button>
                                    </form>
                                    <div class="number">{{$item['quantity']}}</div>
                                    <form action="{{route('AddToCart.show')}}" method="POST" class="plus">
                                        @csrf
                                        {{-- @php
                                            $addQty = true;
                                        @endphp --}}
                                        <input type="hidden" name="addQty" id="" value="{{true}}">
                                        <input type="hidden" name="addToCart" id="" value="{{true}}">
                                        <input type="hidden" name="product_id" id="" value="{{$item['product']}}">
                                        <input type="hidden" name="sizes" id="" value="{{$item['size']}}">
                                        <button formaction="{{route('AddToCart.show')}}" type="submit">+</button>
                                    </form>
                                </div>
                                <form action="{route('AddToCart.show')}" method="POST" class="remove_button">
                                    @csrf
                                    <input type="hidden" name="removeFromCart" id="" value="{{$item['product']}}">
                                    
                                    <input type="hidden" name="addToCart" id="" value="{{true}}">
                                    <input type="hidden" name="sizes" id="" value="{{$item['size']}}">
                                    <input type="hidden" name="product_id" id="" value="{{$item['product']}}">
                                    <button formaction="{{route('AddToCart.show')}}" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </div>
                            
                            
                            <p class="total_price">Total Price - {{$item['price']*$item['quantity']}}MMK</p>
                            @php
                                array_push($array,$item['price']*$item['quantity']);
                            @endphp   
                        </div>
                    </div>
                @empty    
                @endforelse
                </div>
                {{-- @endforeach --}}
                @php
                    $totalItemPrice = array_reduce($array,function($a,$b){
                        return $a+$b;
                    })
                @endphp
                <div class="totalItemPrice flex_row" style="align-items: center">
                    <h4>Total Item Price</h4>
                    <p>{{$totalItemPrice}}MMK</p>
                    <input type="hidden" name="total_price" value="{{$totalItemPrice}}">
                    <input type="hidden" name="total_items" id="" value="{{count($cartarray)}}">
                </div>
                <div class="checkout">
                    <button formaction="{{route('CheckOut')}}" type="submit" class="button2 checkout_button">Check out</button>
                </div>
            </div>
        </form>
    </div>
    @endif
    {{-- session end --}}
    
    @yield('content')

    {{-- footer --}}
    <div class="footer grid">
        <a href="{{route('Home')}}"><b>Home</b></a>
        <a href="{{route('AboutUs')}}"><b>About Us</b></a> 
        <a href="{{route('ContactUs')}}"><b>Contact Us</b></a>
        <a href="{{route('CustomerSideProductList')}}"><b>All Products</b></a>

    </div>
    
   

    {{-- scripts --}}
    <script src="{{asset('js/admin/user_profile_info_popup.js')}}"></script>
    <script src="{{asset("js/customer/add_to_card.js")}}" defer></script>
    <script src="{{asset('js/customer/hamburger_menu.js')}}"></script>
    {{-- <script src="{{asset('js/customer/curtain_menu.js')}}"></script> --}}
    @yield('js')
    {{-- <script>
        const profiles = document.querySelector(".user_profile_phone");
        const profileInfos = document.querySelector(".user_profile_info_phone");

    profiles.addEventListener("click", () => {
    if (profileInfos.style.display === "none" || profileInfos.style.display === "") {
        profileInfos.style.display = "inline-block";
        } else {
            profileInfos.style.display = "none";
        }
    });
    </script> --}}
</body>
</html>
<script>
    function openNav() {
  document.getElementById("myNav1").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav1").style.width = "0%";
}
</script>