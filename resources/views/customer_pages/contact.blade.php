@extends('layouts.customerlayout')
@section('title')
    Bravis | Contact Us
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/contact/contact.css')}}">
@endsection

@section('content')
    <!-- add contact details here -->
    <div class="contact_session grid">
        <div class="left">
            <h2>You Can Contact Us Directly At:</h2>
            <div class="flex_col">
                <div class="flex_row">
                    <p>Email</p>
                    <p>:</p>
                    <p>bravismy@gmail.com</p>
                </div>
                <div class="flex_row">
                    <p>Contact</p>
                    <p>:</p>
                    <p>(+95)9234535987</p>
                </div>
                <div>
                    Or you can write us via contact form. We answer as quick as possible. 
                </div>
            </div>
            <div class="social_icon flex_row">
                <img src="/images/instagram_2111463 (1).png" alt="">
                <img src="/images/facebook_733547 (2).png" alt="">
                <img src="/images/whatsapp_733585.png" alt="">
            </div>
        </div>
        <div class="right">
            <h1>Contact Us</h1>
            <form action="">
                <input type="text" placeholder="Enter Your Name"><br>
                <input type="email" placeholder="Enter Valid Email Address"><br>
                <textarea name="message" id="message" cols="20" rows="6" placeholder="Enter Your Message"></textarea><br>
                <button class="submit button2">Submit</button>
            </form>
        </div>
    </div>
@endsection