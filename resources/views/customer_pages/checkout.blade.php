@php
    if (auth('customer')->user() != null) {
        $registered_user = true;
    }
    else{
        $registered_user = false;
    }
@endphp
{{-- {{dd($registered_user)}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Check Out</title>
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/pages/checkout/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/add_to_card.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="section1">
        <div class="flex_row">
            <div>
                <h1>Bravis</h1>
                <p>CHECKOUT</p>
            </div>
        </div>
        {{-- <div class="add_to_cart_icon">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>0</span>
        </div> --}}
        
    </div>
    <div class="shopping_cart_box">
        <div class="flex_row">
            <h1>Cart</h1>
            <i class="fa-regular fa-circle-xmark close_button"></i>
        </div>
        <hr>    
    </div>   
    <div class="section2">
        <form action="{{route('payment')}}" method="post" >
            @csrf
            <div class="flex_row">
                <div class="form">
                    <input type="hidden" name="usertype" value="customer">
                    <input type="hidden" name="customer_id" value="{{$registered_user == true ? auth('customer')->user()->id : null}}">
                    {{-- <input type="hidden" name="cartarray" value="{{$cartarray}}"> --}}
                    {{-- <input type="hidden" name="Total_paynow" id="" value=""> --}}
                    {{-- @php
                        $cart = array();
                        $cart = $cartarray;
                    @endphp --}}
                    <div class="div1">
                        <div class="flex_row">
                            <h2>Contact</h2>
                            @if (!$registered_user)
                                <p>Have an account? <a href="{{route('CustomerLogin')}}">Log in</a></p>
                            @endif
                        </div>
                        <input type="email" name="email" placeholder="Email*" class="input" value="{{$registered_user == true ? auth('customer')->user()->email : ''}}">
                        <br>
                        <input type="text" name="phonenumber" id="" placeholder="Phone Number*" class="input" value="{{$registered_user == true ? auth('customer')->user()->phonenumber : ''}}">
                        <br>
                    </div>
                    <div class="div2">
                        <h2>Delivery</h2>
                        <input type="text" placeholder="Country/Region"  class="input" value="Myanmar">
                        <div class="name flex_row">
                            <input type="text" name="fname" id="fname" placeholder="First Name*" class="input" value="{{$registered_user == true ? auth('customer')->user()->fname : ''}}">
                            <input type="text" name="lname" id="lname" placeholder="Last Name*"  class="input" value="{{$registered_user == true ? auth('customer')->user()->lname : ''}}">
                        </div>
                        <textarea name="address" id="" cols="30" rows="1" placeholder="Address*" class="input">{{$registered_user == true ? auth('customer')->user()->address : ''}}</textarea>
                        <div class="address flex_row">
                            <input type="text" name="state" id="" placeholder="State/Region(Eg. Yangon)" class="input" value="{{$registered_user == true ? auth('customer')->user()->state : ''}}">
                            <input type="text" name="zipcode" id="" placeholder="Zip Code(Eg. 111)" class="input" value="{{$registered_user == true ? auth('customer')->user()->zipcode : ''}}">
                        </div>
                    </div>
                    <div class="div3">
                        <h2>Shipping Fees</h2>
                        
                        <button type="button" onclick="getInputValue();" id="yangon_fee" class="input yangon">Yangon <span>2500MMK</span></button>
                        <br>
                        <button type="button" onclick="getInputValue1();" id="other_fee" class="input other_region">Other Region <span>3500MMK</span></button>   
                        <input type="hidden" name="delivery_fee" class="delivery-fee-for-form" id="delivery" value="">
                    </div>
                    {{-- <div class="div4">
                        <h2>Payment</h2>
                        <p>All transactions are secured and encrypted</p>
        
                        <label for="payment_type">Payment Type</label>
                        <select name="payment_type" class="input" id="payment_type">
                            <option value="{{ null }}">Select Payment Type</option>
                            <option value="COD" {{$registered_user == false ? "disabled" : ''}}>Cash On Delivery (only avaliable while registered)</option>
                            <option value="prepaid">Prepaid</option>
                        </select>
        
                        <div class="card" id="card" style="margin-top: 20px;">
                            <div class="flex_row credit_card">
                                <p>Credit Card</p>
                                <img src="/images/credit-card_8813684.png" alt="">
                            </div>
                            <div class="card_info">
                                <div class="parent">
                                    <input type="text" placeholder="Card Number" name="cardnumber"  class="input card_info">
                                <i class="fa-solid fa-lock"></i>
                                </div>
                                <div class="flex_row">
                                    <input type="text" placeholder="Expiration Date(MM/YY)" name="expirationdate" class="input card_info">
                                    <input type="text" placeholder="Security Code" name="securitycode"  class="input card_info">
                                </div>
                                <input type="text" placeholder="Name on card" name="nameoncard" class="input card_info">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="detail">
                    @php
                        $last = end($cartarray);
                    @endphp
                    <div class="flex_row">
                        <h2>Your Order</h2>
                        <a href="{{url('productdetails/'.$last['product'])}}">Edit</a>
                    </div>
                    <div class="list flex_row">
                        <div>
                            <div>{{ $total_items }} item{{ $total_items > 1 ? 's' : '' }}</div>
                            <div>Delivery Fees</div>
                            @if ($registered_user)
                                <div >Discount 20%</div>
                            @else
                                <div >Discount (available for registered user)</div>
                            @endif
                            <div><b>Total</b></div>
                        </div>
                        <div class="text_right">
                            <div>{{$total_price}} <span>MMK</span></div>
                            <input type="hidden" value="{{$total_price}}" id="totalprice">
                            <div class="delivery_fee"><label  id="delivery_fee" value=""></label><span> MMK</span></div>
                            {{-- <input type="hidden" id="dprice" name="delifee" value=""> --}}
                            @if ($registered_user)
                                <div>{{$total_price * 0.2 }}<span>MMK</span></div>
                            @else
                                <div>0 <span>MMK</span></div>
                            @endif
                            <input type="hidden" id="discountprice" name="discprice" value="{{$registered_user == true ? $total_price * 0.2 : 0 }}">
                            <div class="total"><label id="total" value=""></label><span> MMK</span></div>
                            <input type="hidden" name="Total_paynow" id="Total_paynow" value="">
                        </div>
        
                    </div>
        
                    <hr>
                    <h2>Item Details</h2>
                    @php
                        $count=1;
                    @endphp
                    <div>
                        @foreach ($cartarray as $item)
                        <div style="display:inline-block;background-color:#D9D9D9; padding:3px; border-radius:2px;">No. {{$count}}</div>
                        <div class="item_detail flex_row">
                            <img src="{{asset('image/admin/products_info/' .$item['image'])}}" alt="">
                            <div>
                                <p><b>{{$item['name']}}</b></p>
                                <p>Price: {{$item['price']}}</p>
                                <p>Size: {{$item['size']}}</p>
                                <p>Quantity : {{$item['quantity']}} item{{ $item['quantity'] > 1 ? 's' : '' }}</p>
                            </div>
                        </div>
                        @php
                            $count +=1;
                        @endphp
                    
                    <hr>
                    @endforeach
                    </div>
                    
                    
        
                </div>
            </div>
            <div >
                <button type="submit" class="payNow button2" style="width:46%;">Pay Now</button>
            </div>
        </form>

    </div>

    <!-- script -->
    {{-- <script src="{{asset('js/customer/add_to_card.js')}}"></script> --}}
    <script src="{{asset('js/customer/shipping_fee.js')}}"></script>
</body>
</html>