<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Admin Login</title>

    <link rel="stylesheet" href="{{asset('css/admin/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/account/login/login.css')}}">
</head>
<body>
    <div class="background_image">
        <div class="flex_row">
            <form action="{{route('AdminLoginProcess')}}" method="post" class="flex_col">
                @csrf
                <h2>Bravis</h2>
                <p>ADMIN PANEL</p>
                <p>Control panel login</p>
                {{-- set usertype Admin --}}
                <input type="hidden" name="usertype" value="admin">
                <div class="login_form">
                    <div class="">
                        <img src="{{asset('image/admin/icon/staff.svg')}}" alt="">
                        <input type="text" name="email" placeholder="admin">
                    </div>
                    <div>
                        <img src="{{asset('image/admin/icon/key.svg')}}" alt="">
                    <input type="password" name="password" placeholder="password">
                    </div>
                </div>
                <br>
                <button class="login_btn" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>