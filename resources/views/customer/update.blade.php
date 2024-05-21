@extends('layouts.adminlayout')

@section('title')
    Bravis | CustomerList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/add_staff.css')}}">
@endsection

@section('main')
<div class="main">
    <h4><b>Update Customer</b></h4>
    <p>Update your customers necessary information here</p>
    <form action="{{route('CustomerUpdateProcess')}}" method="post" class="add_staff_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$customerdata->id}}">
        <div class="grid">
            <label for="fname">Customer Name</label>
            <div>{{$customerdata->fname}} {{$customerdata->lname}}</div>

            <label for="email">Email</label>
            <div>{{$customerdata->email}}</div>
            <label for="password">Password</label>
            <div>
                <input type="password" name="password" placeholder="Enter Reset Password">
            </div>

            <label for="status">Status</label>
            <select name="status" id="status" value="{{$customerdata->email}}">
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
