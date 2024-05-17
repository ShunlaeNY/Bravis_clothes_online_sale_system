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
            <form action="{{route('SearchCustomers')}}" method="post" class="grid">
                @csrf
                <input type="text" name="search" placeholder="Search">
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{route('CustomerList')}}" class="reset_button button">Reset</a>
                </div>
            </form>
        </div>
        <div class="session3">
            <div>
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->id}}</td>
                            <td>{{$customerlist->fname}} {{$customerlist->lname}}</td>
                            <td>{{$customerlist->email}}</td>
                            <td>{{$customerlist->address}}</td>
                            {{-- <td>{{$customerlist->state}}</td> --}}
                            {{-- <td>{{$customerlist->zipcode}}</td> --}}
                            <td>{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->status}}</td>
                            {{-- <td>{{$customerlist->dob}}</td> --}}
                            {{-- <td>{{$customerlist->image}}</td> --}}
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/customerlist/edit/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        {{-- <div class="session4">
            <div>
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->id}}</td>
                            <td>{{$customerlist->fname}} {{$customerlist->lname}}</td>
                            <td>{{$customerlist->email}}</td>
                            <td>{{$customerlist->address}}</td>
                           
                            <td>{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->status}}</td>
                            
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/customerlist/edit/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="session5">
            <div>
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->id}}</td>
                            <td>{{$customerlist->fname}} {{$customerlist->lname}}</td>
                            <td>{{$customerlist->email}}</td>
                            <td>{{$customerlist->address}}</td>
                           
                            <td>{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->status}}</td>
                       
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/customerlist/edit/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/customerlist/delete/'.$customerlist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>  --}}
    </div>
@endsection
