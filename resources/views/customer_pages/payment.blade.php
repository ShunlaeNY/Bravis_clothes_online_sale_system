
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravis | Payment Form </title>
    <link rel="stylesheet" href="{{asset('css/customer/global/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/pages/checkout/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/component/add_to_card.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: var(--secondary-color);">
    <div class="section1 col-lg-12" style="margin-bottom: 50px;">
        <div class="flex_row">
            <div>
                <h2>Bravis</h2>
                <p>Payment</p>
            </div>
        </div>
    </div>

    <div class="container col-lg-12">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table flex_row" style="justify-content: space-between;align-items:center;">
                        <h2 class="panel-title" >Proceed Your Payment</h2>
                        <a href="{{route('CheckOut')}}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="panel-body">
                        <p>Dear {{$customername}},</p>
                        <p>Please enter your card details below to complete your purchase. We ensure your information is protected with advanced encryption.</p>

                            <ul style="margin-left: 40px;">
                                <li>Card Number:</li>
                                <li>Expiration Date:</li>
                                <li>CVV:</li>
                                <li>Cardholder Name:</li>
                            </ul>
                        <p>
                            By providing your payment information, you agree to our <span><a href="{{route('PrivacyPolicy')}}" style="color: blue !important;">Terms of Service and Privacy Policy</a></span>.
                        </p>
                    </div>
                    <div class="panel-body">
          
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
      
                         <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">   
                            @csrf             
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                            <input type='hidden' name='totalpurchase' id='totalpurchase' value="{{$totalpurchase}}">                              
                            <br>
                            <div id="card-element" class="form-control" ></div>
                            <button 
                                id='pay-btn'
                                class="btn btn-success mt-3"
                                type="button"
                                style="margin-top: 20px; width: 100%;padding: 7px;"
                                onclick="createToken()">Pay Now
                            </button>
                        <form>
                    </div>
                </div>        
            </div>
        </div>  
    </div>
    
    {{-- <div class="col-md-6">
        <img src="{{asset('image/customer/paymentcard-removebg-preview.png')}}" alt="" width="900px" height="auto">
    </div> --}}     
    </body>
         
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
      
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
      
        /*------------------------------------------
        --------------------------------------------
        Create Token Code
        --------------------------------------------
        --------------------------------------------*/
        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
       
                if(typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }
      
                /* creating token success */
                if(typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
     
</html>