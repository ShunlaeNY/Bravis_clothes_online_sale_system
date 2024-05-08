@extends('layouts.adminlayout')

@section('title')
    Bravis | StaffList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/add_staff.css')}}">
@endsection

@php
    $updatestatus = false;
    if(isset($staffdata)){
        $updatestatus = true;
    }
@endphp

@section('main')
<div class="main">
    <h4><b>{{$updatestatus == true ? 'Update Staff' : 'Add Staff'}}</b></h4>
    <p>{{$updatestatus == true ? 'Update' : 'Add'}} your staff necessary information here</p>
    <form action="{{$updatestatus == true ? route('StaffUpdateProcess') : route('StaffCreateProcess')}}" method="post" class="add_staff_form" enctype="multipart/form-data">
        @csrf
        @if ($updatestatus == true)
            @method('PATCH')
        @endif
        <input type="hidden" name="id" value="{{$updatestatus == true ? $staffdata->id :''}}">
        <div class="grid">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Staff Name" value="{{$updatestatus == true ? $staffdata->name : ''}}">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Staff Email" value="{{$updatestatus == true ? $staffdata->email : ''}}">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Staff Password">

            <label for="phonenumber">Phone Number</label>
            <input type="text" name="phonenumber" placeholder="Example : 09-XXXXXX" value="{{$updatestatus == true ? $staffdata->phonenumber : ''}}">

            <label for="address">Address</label>
            <textarea name="address" id="textarea" cols="30" rows="10">{{$updatestatus == true ? $staffdata->address : ''}}</textarea>

            <label for="rolename">Staff Position</label>
            <select name="rolename" id="rolename" {{$updatestatus==true? "disabled" :''}}>
                <option value="roleid" selected>Choose ...</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>

            <label for="image">Profile Photo</label>
            <input type="file" name="image">

            <button><a href="{{route('StaffList')}}">Cancel</a></button>
            <button type="submit">{{$updatestatus == true ? 'Update' : 'Add'}}</button>
        </div>
    </form>
</div> 
@endsection
