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
            <a href="{{route('StaffCreate')}}">+ Add Staff</a>
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
            <div style="overflow-x: auto;">
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
                                    <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{url('admin/dashboard/stafflist/delete/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection