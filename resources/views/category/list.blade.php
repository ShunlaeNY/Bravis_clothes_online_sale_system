@extends('layouts.adminlayout')
@section('title')
    Bravis | Category List
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
@section('main')
        <div class="main">
            <div class="session1 flex_row">
                <h3>Category</h3>
                @if (auth('admin')->user()->role_id === 1)
                    <a href="{{route('CategoryCreate')}}">+ Add Category</a>
                @else
                    <a href="{{route('CategoryCreate')}}" class="disable_btn">+ Add Category</a>
                @endif
            </div>
            <div class="session2">
                <form action="{{route('SearchCategories')}}" method="post" class="grid">
                    @csrf
                    <input type="text" name="name" placeholder="Search by Category Name">
                    <input type="text" name="admin_name" placeholder="Search by Admin">
                    <div class="buttons flex_row">
                        <button type="submit" class="filter_button button">Filter</button>
                        <a href="{{route('CategoryList')}}" class="reset_button button">Reset</a>
                    </div>
                </form>
            </div>
            <div class="session3">
                <table>
                        <tr>
                            <th class="first_title">Category Name</th>
                            <th>Admin Name</th>
                            <th class="last_title">Action</th>
                        </tr>
                        @foreach ($categorylists as $categorylist)
                            <tr>
                                <td>{{$categorylist->name}}</td>
                                <td>{{$categorylist->admin_name}}</td>
                                <td>
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach     
                </table>

            </div>
            <div class="session4">
                <table>
                        <tr>
                            <th class="first_title">Category Name</th>
                            <th>Admin Name</th>
                            <th class="last_title">Action</th>
                        </tr>
                        @foreach ($categorylists as $categorylist)
                            <tr>
                                <td>{{$categorylist->name}}</td>
                                <td>{{$categorylist->admin_name}}</td>
                                <td>
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach     
                </table>

            </div>
            <div class="session5">
                <table>
                        <tr>
                            <th class="first_title">Category Name</th>
                            <th>Admin Name</th>
                            <th class="last_title">Action</th>
                        </tr>
                        @foreach ($categorylists as $categorylist)
                            <tr>
                                <td>{{$categorylist->name}}</td>
                                <td>{{$categorylist->admin_name}}</td>
                                <td>
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/categorylist/delete/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach     
                </table>

            </div>
        </div>
    </div>
@endsection