<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin/global/style.css')}}">
    @yield('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
    <div class="session grid">
        <div class="nav flex_col">
            <a href="{{route('Dashboard')}}" target="_self">
                <h1 class="nav_text">Bravis</h1>
                <div class="flex_row">
                    <i class="fa-solid fa-house"></i>
                    <p class="nav_text">Dashboard</p>
                </div>
            </a>    
            <a href="{{route('ProductList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <p class="nav_text">Product</p>
                </div>
            </a>
            <a href="{{route('CategoryList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <p class="nav_text">Category</p>
                </div>
            </a>
            <a href="{{route('CustomerList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-users"></i>
                    <p class="nav_text">Customer</p>
                </div>
            </a>
            <a href="{{route('OrderList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p class="nav_text">Order</p>
                </div>
            </a>
            <a href="{{route('StaffList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-user"></i>
                    <p class="nav_text">Staff</p>
                </div>
            </a>
            <a href="{{route('SupplierList')}}" target="_self">
                <div class="flex_row">
                    <i class="fa-solid fa-user"></i>
                    <p class="nav_text">Supplier</p>
                </div>
            </a>

        </div>
        <div class="header flex_row">
            <div class="flex_row icons">
                {{-- <img src="/image/icon/bell.svg" alt=""> --}}
                {{-- <img src="/image/icon/msg.svg" alt=""> --}}
            </div>
            <div class="user_profile">
                <img src="" alt="image of admin user">
            </div>     
        </div>
        <!-- user Profile Info -->
        <div class="user_profile_info">
               <a href=""><i class="fa-solid fa-gear"></i>Edit Profile</a><br>
               <a href="{{route('AdminLogout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
        </div>

        {{-- main --}}
        @yield('main')
        
    </div>

    

    
    <!-- script-->
    <script src="{{asset('js/admin/user_profile_info_popup.js')}}"></script>
    @yield('js')
</body>
</html>