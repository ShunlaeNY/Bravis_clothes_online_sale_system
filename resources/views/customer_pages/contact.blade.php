@extends('layouts.customerlayout')
@section('title')
    Bravis | Contact Us
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/contact/contact.css')}}">
@endsection

@section('content')
    <!-- add contact details here -->
    <div class="contact_session">
        <div class="left">
            <h1 style="margin-bottom: 20px; text-align:center;">Contact Us</h1>
            <h2 style="margin-bottom: 25px;">You Can Contact Us Directly At:</h2>
            <div style="align-items: center" class="flex_col">
                <div style="align-items: center;padding: 10px" class="flex_row">
                    <p>Email</p>
                    <p>:</p>
                    <p>bravismy@gmail.com</p>
                </div>
                <div style="align-items: center;padding::10px;" class="flex_row">
                    <p>Contact</p>
                    <p>:</p>
                    <p>(+95)9234535987</p>
                </div>
                <div style="padding: 20px 0">
                    Or you can write us via contact form. We answer as quick as possible.
                </div>
            </div>
            <div class="social_icon flex_row">
                <img src="{{ asset('image/customer/instagram_2111463 (1).png') }}" alt="">
                <img src="{{ asset('image/customer/facebook_733547 (2).png') }}" alt="">
                <img src="{{ asset('image/customer/whatsapp_733585.png') }}" alt="">
            </div>
        </div>

    </div>
@endsection