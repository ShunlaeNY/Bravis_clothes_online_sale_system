@extends('layouts.adminlayout')

@section('title')
    Bravis | StaffList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/staff.css')}}">
@endsection

@section('main')
    <div class="main">
        <div class="session1 flex_row">
            <h3>All Staffs</h3>
            @if (auth('admin')->user()->role_id === 1)
                <a href="{{route('StaffCreate')}}">+ Add Staff</a>
            @else 
                 <a href="{{route('StaffCreate')}}" class="disable_btn" >+ Add Staff</a>
            @endif
        </div>
        <div class="session2">
            <div class="grid">
                <input type="text" placeholder="Search By Name/ Email/ Phone number">
                <select name="" id="">
                    <option value="">Admin</option>
                </select>
                <button>Search</button>
            </div>
        </div>
        <div class="session3">
            <table>
                <tr>
                    <th class="first_title">Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Position</th>
                    <th>Profile Photo</th>
                    <th class="last_title">Action</th>
                </tr>

                    @foreach ($stafflists as $stafflist)
                        <tr>
                            <td>{{$stafflist->name}}</td>
                            <td>{{$stafflist->email}}</td>
                            <td>{{$stafflist->address}}</td>
                            <td>{{$stafflist->phonenumber}}</td>
                            <td>{{$stafflist->rolename}}</td>
                            <td>{{$stafflist->image}}</td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                    <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{url('admin/dashboard/stafflist/delete/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>

                                @else
                                    <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{url('admin/dashboard/stafflist/delete/'.$stafflist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                 @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
            <div class="pagination">

            </div>
        </div>
    </div>
@endsection