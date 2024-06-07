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
    <div class="flex_row bg_container">
        <div class="background_image">
            <div class="form_container">
                <form action="{{route('AdminLoginProcess')}}" method="POST" class="">
                    @csrf
                    <input type="hidden" name="usertype" value="admin">
                    <div class="title">
                        <h2>Bravis</h2>
                        <p>ADMIN PANEL</p>
                        <p>Control panel login</p>
                    </div>
                    <div class="login_form flex_col">
    
                        <div>
                            <div class="admin_login flex_row">
                                <i class="fa-solid fa-user"></i>
                                <input name="email" type="text"
                                    placeholder="admin" class="input" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger error"><small><i class="fa-solid fa-triangle-exclamation"></i> {{$message}}</small></div>
                            @enderror
                        </div>
                        <div>
                            <div class="admin_login flex_row password_container">                             
                                    <i class="fa-solid fa-key"></i>
                                    
                                    <input name="password" id="password" type="password" placeholder="password" class="input">
                                        <i class="fa-solid fa-eye-slash hide_password"></i>
                                        <i class="fa-solid fa-eye show_password"></i>
                                                                                                
                            </div>
                            @error('password')
                                <div class="alert alert-danger error"><small><i class="fa-solid fa-triangle-exclamation"></i> {{$message}}</small></div>
                                @enderror
                        </div>
                    </div>
                    <br>
                    <div class="flex_row" style="justify-content: center;">
                        <button type="submit" name="submit" class="login_btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/customer/show_hide_password.js')}}"></script>

</body>
</html>