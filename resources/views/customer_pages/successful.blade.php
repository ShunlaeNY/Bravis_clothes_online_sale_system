<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Payment Successful</title>
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/add_to_card.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/pages/success/thank_you_shopping.css')}}">
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
                        {{auth('customer')->user()->fname}}
                    @else
                        Guest
                    @endif
                </div>
                <div class="link">
                    {{-- <a href="">FAQ</a>|
                    <a href="">orders and returns</a>| --}}
                    @if (auth('customer')->user() != null)
                        <a href="{{route('CustomerLogout')}}">Log Out</a>
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
                {{-- <div class="extra_icon flex_row">
                    <div class="add_to_cart_icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>{{count($cartarray)}}</span>
                    </div>
                </div> --}}
            </div>
            <div id="myNav1" class="overlay1">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content1">
                    <a href="{{route('Home')}}">Home</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Women Fashion']) }}">Women Fashion</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Men Fashion']) }}" >Men Fashion</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Accessories']) }}">Accessories</a>
                    <a href="{{ route('CustomerSideProductList', ['category' => 'Sport Wears']) }}">Sport Wears</a>
                    <a href="{{route('AboutUs')}}">About</a>
                    <a href="{{route('ContactUs')}}">Contact</a>
                    <a href="{{route('PrivacyPolicy')}}">Policy</a>
                </div>
              </div>
              <div class="sticky" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Bravis</div>
    </div>
    <div class="section2">
        <div class="flex_row">
            <div class="flex_col">
                <div class="check_mark flex_row">
                    <img src="/images/checkmark_8832119.png" alt="">
                </div>
                <h1>Thank You.</h1>
                <p>Your order was completely successfully</p>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="truck flex_row">
                    <img src="/images/delivery-truck_2769339.png" alt="">
                    <p>Your Product will be arrived within one week</p>
                </div>
                <a href="/index.html#shop_now"><button class="button2">Continue To Shopping
                </button></a>
            </div>
        </div>
    </div>
{{-- footer --}}
<div class="footer grid">
    <a href="{{route('Home')}}"><b>Home</b></a>
    <a href="{{route('AboutUs')}}"><b>About Us</b></a> 
    <a href="{{route('ContactUs')}}"><b>Contact Us</b></a>
    <a href="{{route('CustomerSideProductList')}}"><b>All Products</b></a>

</div>



{{-- scripts --}}
<script src="{{asset("js/customer/add_to_card.js")}}" defer></script>
<script src="{{asset('js/customer/hamburger_menu.js')}}"></script>
{{-- <script src="{{asset('js/customer/curtain_menu.js')}}"></script> --}}
@yield('js')

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