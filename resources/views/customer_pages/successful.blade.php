@extends('layouts.customerlayout')
@section('title')
    Bravis | Order Successful
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/success/thank_you_shopping.css')}}">
@endsection

@section('content')
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


@endsection