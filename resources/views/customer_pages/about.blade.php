@extends('layouts.customerlayout')
@section('title')
    Bravis | About Us
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/about/about.css')}}">
@endsection

@section('content')
    <div>
        <div class="intro flex_row">About Us</div>
    </div>
    <div class="body body1 flex_row">
        <div class="flex_col">
            <h1>Our Story</h1>
            <p>Bravis has launched in Myanmar since 2022. And Bravis was established with a new retail format that responds to the demand of a sector of young professionals who are interested in a highly aware of new trends.</p>
            <img src="{{asset('image/customer/7R9A5223-780x520 1.png')}}" alt="image of our story">
        </div>
    </div>
    <div class="body body2 flex_row">
        <div class="flex_col">
            <h1>Our Vision</h1>
            <p>To create a lead authentic brand, generating fashion nurturing confidence for Myanmar people.we envision transforming online shopping for fashion into a personalized, innovative, and sustainable experience. Our goal is to inspire and connect individuals through a curated collection that celebrates diverse styles.</p>
            <img src="{{asset('image/customer/side-view-woman-looking-clothes 1.png')}}" alt="image of our vision">
        </div>
    </div>
    <div class="body body3 flex_row">
        <div class="flex_col">
            <h1>Our Mission</h1>
            <p>Our mission is to empower individuals to express their unique style with confidence through high-quality, trendsetting fashion. We are committed to curating a diverse and sustainable collection that caters to the dynamic tastes of our customers.</p>
            <img src="{{asset('image/customer/people-analyzing-checking-finance-graphs-office 1.png')}}" alt="image of our mission">
        </div>
    </div>
    <div class="body body4 flex_row">
        <div class="flex_col">
            <h1>Our Development Team</h1>
            <p>Our Development Team is dedicated to advancing the intersection of fashion and technology. Our mission is to innovate and elevate the online shopping experience, leveraging cutting-edge technologies to ensure a seamless, secure, and visually captivating platform. We are committed to staying ahead of industry trends, embracing creativity, and fostering a collaborative environment where our team members thrive and contribute to the continuous evolution of <b>Bravis</b>.
            </p>
        </div>
    </div>
@endsection
