
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Customer Sign Up</title>
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/account/sign_up.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
        <h1>Create Account</h1>
        <div class="flex_row">
            <form action="{{route('CustomerRegisterProcess')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Full Name</label>
                <br>
                <div class="flex_row">
                    <div>
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        @error('fname')
                                <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        @error('lname')
                                <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                        @enderror
                    </div>

                </div>
                <br>
                <label for="dob">Date of Birth</label>
                <br>
                <div>
                    <input type="date" name="dob">
                    @error('dob')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <label for="email">Email</label>
                <br>
                <div>
                    <input type="email" name="email" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <label for="phonenumber">Phone Number</label>
                <br>
                <div>
                    <input type="text" name="phonenumber" placeholder="phonenumber">
                    @error('phonenumber')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <label for="password">Password</label>
                <br>
                <small>Tip: Use upper case, lower case, special characters and numbers</small>
                <div class="password_container">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <i class="fa-solid fa-eye-slash hide_password"></i>
                    <i class="fa-solid fa-eye show_password"></i>
                    @error('password')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <label for="address">Location</label>
                <br>
                <div>
                    <textarea name="address" id="address" cols="30" rows="10"></textarea><br>
                    @error('address')
                        <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <div class="flex_row">
                    <div>
                        <input type="text" name="state" placeholder="State/Region">
                        @error('state')
                            <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="zipcode" placeholder="Zip Code (Eg. 1111)">
                        @error('zipcode')
                            <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                        @enderror
                    </div>
                </div>
                <label for="image">Upload Photo</label>
                <br>
                <div>
                    <input type="file" name="image">
                    @error('image')
                            <div class="alert alert-danger error"><small><b>*{{$message}}*</b></small></div>
                    @enderror
                </div>
                <br>
                <br>
                <div class="sign_up flex_row">
                    <button type="submit" class="button2">Sign Up</button>
                </div>
    
            </form>
        </div>
    </div>
    
    <!-- script -->
    <script src="{{asset('js/customer/show_hide_password.js')}}"></script>
</body>
</html>