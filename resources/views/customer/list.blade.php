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
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
                            <i class="fa-regular fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff001</td>
                        <td>Staff1</td>
                        <td>staff001@gmail.com</td>
                        <td>09-123-456-789</td>
                        <td>
                            <a href="/pages/customer/edit_customer.html"><i class="fa-solid fa-pen-to-square"></i></a>
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
