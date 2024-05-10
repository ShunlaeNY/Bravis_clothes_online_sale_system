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
            <h1>Welcome Back!</h1>
            <p>Sign In and Get 25% on selected items</p>
            <div class="flex_row">
                <form action="{{route('CustomerLoginProcess')}}" method="post">
                    @csrf
                    <input type="hidden" name="usertype" value="customer">
                    <h1>Sign In Here</h1>
                    <input type="Email" name="email" placeholder="Email Address"><br>
                    <input type="password" name="password" placeholder="Password"><br>
                    <button type="submit" class="login_button button2">Login</button>
                    <p>Don’t have an account? <a href="{{route('CustomerRegister')}}">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="image">
            <img src="{{asset('image/customer/Background-image.png')}}" alt="">
        </div>
    </div>
</body>
</html>