@extends('layouts.adminlayout')
@section('title')
    Bravis | OrderList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/order/order.css')}}">
@endsection

@section('main')
    <div class="main">
        <h3>Order</h3>
        <div class="session1">
            <div class="grid">
                <div class="flex_col">
                    <small>Order Start Date</small>
                    <input type="date">
                </div>
                <div class="flex_col">
                    <small>Order End Date</small>
                    <input type="date">
                </div>
                <div>
                    <input type="text" placeholder="Search">
                </div>
                <div>
                    <button>Search</button>
                </div>
            </div>
        </div>
        <div class="session3">
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th class="first_title">Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Price</th>
                        <th>Ordered Date</th>
                        <th>Payment info</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>
                   
                    
                </table>
            </div>
        </div>
    </div>
@endsection
