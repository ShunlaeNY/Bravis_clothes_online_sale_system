@extends('layouts.adminlayout')

@section('title')
    Bravis | OrderList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/add_staff.css')}}">
@endsection

@section('main')
<div class="main">
    <h4><b>Update Order Status</b></h4>
    <p>Update your orders status for delivered items</p>
    <form action="{{route('OrderStatusUpdateProcess')}}" method="post" class="add_staff_form" enctype="multipart/form-data">
        @csrf
        {{dd($order_item)}}
        <input type="hidden" name="id" value="{{$order_item->id}}">
        
        <div class="grid">
            <label for="fname">Customer Name</label>
            <div>{{$order_item->fname}} {{$order_item->lname}}</div>

            <label for="status">Status</label>
            <select name="status" id="status" value="{{$order_item->status}}">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            {{-- {{dd($customerdata)}} --}}
            <button><a href="{{route('CustomerList')}}">Cancel</a></button>
            <button type="submit">Update</button>
        </div>
    </form>
</div> 
@endsection
