<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Admin Login</title>

    <link rel="stylesheet" href="{{asset('css/admin/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/account/login/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    {{-- <div class="background_image flex_row">
        <div class="container flex_col">
            <form action="{{route('AdminLoginProcess')}}" method="post">
                @csrf
                <div class="texts">
                    <div class="title">
                        <h2>Bravis</h2>
                        <p>ADMIN PANEL</p>
                        <p>Control panel login</p>
                    </div>
                    
                    <input type="hidden" name="usertype" value="admin">
                    <div class="login_form grid">
                        <div class="flex_row">
                            <div class="input_box">
                                <img src="{{asset('image/admin/icon/staff.svg')}}" alt="">
                                <input type="text" name="email" placeholder="admin">
                            </div>
                            @error('email')
                                <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                            @enderror
                        </div>
                        <div class="flex_row">
                            <div class="input_box">
                                <img src="{{asset('image/admin/icon/key.svg')}}" alt="">
                                <div class="password_container">
                                    <input type="password" name="password" placeholder="password"> 
                                        <i class="fa-solid fa-eye-slash hide_password"></i>
                                        <i class="fa-solid fa-eye show_password"></i>   
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button class="login_btn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="background_image">
        <div class="flex_row">
            <form action="{{route('AdminLoginProcess')}}" method="POST" class="flex_col">
                @csrf
                <input type="hidden" name="usertype" value="admin">
                <h2>Bravis</h2>
                <p>ADMIN PANEL</p>
                <p>Control panel login</p>
                <div class="login_form flex_col">

                    <div class="admin_login flex_row">
                        <img src="{{asset('image/admin/icon/staff.svg')}}" alt="">
                        <input name="email" type="text" class="@error('email') is-invalid @enderror"
                            placeholder="admin">
                    </div>
                    @error('email')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                    <div class="admin_login flex_row">
                        <img src="{{asset('image/admin/icon/key.svg')}}" alt="">
                        <div class="password_container">
                            <input name="password" type="password" placeholder="password">
                                <i class="fa-solid fa-eye-slash hide_password"></i>
                                <i class="fa-solid fa-eye show_password"></i> 
                        </div> 
                    </div>
                    @error('password')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <button type="submit" name="submit" class="login_btn">Login</button>
            </form>
        </div>
    </div>
    <script src="{{asset('js/customer/show_hide_password.js')}}"></script>

</body>
</html>