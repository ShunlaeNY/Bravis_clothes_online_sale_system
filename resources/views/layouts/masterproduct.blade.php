@extends('layouts.customerlayout')

@section('title')
    Bravis | Products
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/customer/pages/category/category_sort.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/pages/category/men/men_tee.css') }}">
@endsection

@section('content')
    <div class="intro_session flex_row">
        @yield('categoryname')
    </div>
    @yield('filter')

    @yield('product_list')

@endsection
