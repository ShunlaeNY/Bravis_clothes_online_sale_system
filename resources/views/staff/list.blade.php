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
            <a href="/pages/staff/add_staff.html">+ Add Staff</a>
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
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th class="last_title">Action</th>
                    </tr>
                    <tr>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>Admin</td>
                        <td>
                            <a href="/pages/staff/update_staff.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>Admin</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>Admin</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="last_row_left">
                            <div class="page_info">
                                Showing 1-3 of 30
                            </div>
                        </td>
                        <td colspan="3" class="last_row_right">
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection