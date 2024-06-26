<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Customer Login Form</title>
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/account/login_form.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container grid">
        <div class="text">
            <h1 class="text_white">Welcome Back!</h1>
            <p class="text_white">Sign In and Get 25% on selected items</p>
            <div class="flex_row">
                <form action="{{route('CustomerLoginProcess')}}" method="post">
                    @csrf
                    <input type="hidden" name="usertype" value="customer">
                    <h1>Sign In Here</h1>
                    <div>
                        <input type="Email" name="email" placeholder="Email Address" value="{{ old('email') }}"><br>
                        @error('email')
                            <div class="alert alert-danger error"><small><i class="fa-solid fa-triangle-exclamation"></i> {{$message}}</small></div>
                        @enderror
                    </div>
                    <div>
                        <div class="password_container">
                            <input name="password" id="password" type="password" placeholder="password">
                                <span><i class="fa-solid fa-eye-slash hide_password"></i></span>
                                <span><i class="fa-solid fa-eye show_password"></i> </span>
                        </div>
                        @error('password')
                            <div class="alert alert-danger error"><small><i class="fa-solid fa-triangle-exclamation"></i> {{$message}}</small></div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="login_button button2">Login</button>
                    <p>Don’t have an account? <a href="{{route('CustomerRegister')}}">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="image">
        </div>
    </div>
    <script src="{{asset('js/customer/show_hide_password.js')}}"></script>
</body>
</html>