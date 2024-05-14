@extends('layouts.customerlayout')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/customer/pages/category/category_sort.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/pages/category/men/men_tee.css') }}">
@endsection

@section('content')
    <div class="intro_session flex_row">
        Men's Tees
    </div>
    <div class="filter">
        <div class="link">
            <a href="/index.html">Home</a>/
            <a href="../men/tee.html">Tees</a>
        </div>
        <div class="flex_row">
            <div class="search">
                <input type="text" class="input" placeholder="Search...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="sort_by flex_row">
                <div>
                    <span>Sort By:</span>
                    <select name="" id="" class="input">
                    <option value="low_to_high_price">Price, Low Price to High</option>
                    <option value="high_to_low_price">Price, High Price to Low</option>
                </select>
                </div>
                <!-- <img src=".././images/icons/icons8-sort-down-30.png" alt=""> -->
            </div>
            

        </div>
    </div>
@endsection
