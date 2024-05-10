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
                    Flash Sales : Sign in and Get Extra  25%  off on Selected Items
                </div>
                <div>
                    Welcome
                    @if ( auth('customer')->user() != null)
                        {{auth('customer')->user()->name}}!
                    @else
                        Guest!
                    @endif
                </div>
                <div class="link">
                    <a href="">FAQ</a>|
                    <a href="">orders and returns</a>|
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
                        <a href="" >Women</a>
                        <div class="women_drop_down_content">
                            <h3>Women Clothing</h3>
                            <div class="women_clothing_list flex_row">
                                <div class="flex_col">
                                    <a href="pages/category/women/dress.html">Women's Dresses</a>
                                    <a href="pages/category/women/blouse.html">Women's Tops, Tees & Blouses</a>
                                    <a href="pages/category/women/hoodie.html">Women's Fashion Hoodies & Sweat shirts</a>
                                    <a href="pages/category/women/pant.html">Women's Pants</a>
                                    <a href="pages/category/women/skirt.html">Women's Skirts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="men drop_down">
                        <a href="" >Men</a>
                        <div class="men_drop_down_content">
                            <h3>Men Clothing</h3>
                            <div class="men_clothing_list flex_row">
                                <div class="flex_col">
                                    <a href="pages/category/men/tee.html">Men's Tee</a>
                                    <a href="pages/category/men/men_t_shirt.html">Men's T-Shirts</a>
                                    <a href="pages/category/men/hoodie.html">Men's Hoodies & Sweat Shirts</a>
                                    <a href="pages/category/men/pant.html">Men’s Pants</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact">
                        <a href="{{route('ContactUs')}}" >Contact</a>
                    </div>
                    <div class="about_us">
                        <a href="{{route('AboutUs')}}" >About Us</a>
                    </div>
                </div>
                <div class="extra_icon flex_row">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <div class="add_to_cart_icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navi_ph flex_row">
            <div class="logo">
                Bravis
            </div>
            <i class="fa-solid fa-bars hamburger_menu open_menu"></i>
            <i class="fa-solid fa-xmark close_menu"></i>
        </div>
        <div class="overflow_menu">
            <div class="menu_link flex_col">
                <a href="">Women</a>
                <a href="">Men</a>
                <a href="/pages/contact/index.html">Contact</a>
                <a href="/pages/about/index.html">About</a>
            </div>
        </div>
    </div>
    <div class="shopping_cart_box">
        <div class="flex_row">
            <h1>Cart</h1>
            <i class="fa-regular fa-circle-xmark close_button"></i>
        </div>
        <hr>    
    </div>

    @yield('content')

    {{-- footer --}}
    <div class="footer grid">
        <div class="flex_col">
            <a href="{{route('Home')}}">Home</a>
        </div>
        <div class="flex_col">
            <a href="{{route('AboutUs')}}">About Us</a> 
        </div>
        <div class="flex_col">
            <a href="{{route('ContactUs')}}">Contact Us</a>
        </div>
        <div class="flex_col">
            <a href="">All Products</a>
        </div>
    </div>

    {{-- scripts --}}
    <script src="{{asset("js/customer/add_to_card.js")}}" defer></script>
    <script src="{{asset('js/customer/hamburger_menu.js')}}"></script>
    @yield('js')
    
</body>
</html>