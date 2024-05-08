@extends('layouts.adminlayout')

@section('title')
    Bravis | CustomerList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/customer/customer.css')}}">
@endsection

@section('main')
    <div class="main">
        <h3>All Customers</h3>
        <div class="session1">
            <div class="grid">
                <input type="text" placeholder="Search">
                <div class="flex_row">
                    <button class="search_button">Search</button>
                    <button class="reset_button">Reset</button>
                </div>
            </div>
        </div>
        <div class="session3">
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->name}}</td>
                            <td>{{$customerlist->email}}</td>
                            <td>{{$customerlist->address}}</td>
                            <td>{{$customerlist->state}}</td>
                            <td>{{$customerlist->zipcode}}</td>
                            <td>{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->dob}}</td>
                            <td>{{$customerlist->image}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
