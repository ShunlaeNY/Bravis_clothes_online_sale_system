@extends('layouts.adminlayout')

@section('title')
    Bravis | CategoryList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/add_staff.css')}}">
@endsection

@php
    $updatestatus = false;
    if(isset($categorydata)){
        $updatestatus = true;
    }
@endphp

@section('main')
<div class="main">
    <h4><b>{{$updatestatus == true ? 'Update Category' : 'Add Category'}}</b></h4>
    <p>{{$updatestatus == true ? 'Update' : 'Add'}} your category necessary information here</p>
    <form action="{{$updatestatus == true ? route('CategoryUpdateProcess') : route('CategoryCreateProcess')}}" method="post" class="add_staff_form">
        @csrf
        @if ($updatestatus == true)
            @method('PATCH')
        @endif
        <input type="hidden" name="id" value="{{$updatestatus == true ? $categorydata->id :''}}">
        <div class="grid">
            <label for="name">Category Name</label>
            <input type="text" name="name" placeholder="Enter Category Name" value="{{$updatestatus == true ? $categorydata->name : ''}}">

            <input type="hidden" name="admin_id" value="{{auth('admin')->user()->id}}">

            <button><a href="{{route('CategoryList')}}">Cancel</a></button>
            <button type="submit">{{$updatestatus == true ? 'Update' : 'Add'}}</button>
        </div>
    </form>
</div> 
@endsection
