@extends('layouts.adminlayout')

@section('title')
    Bravis | SupplierList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/staff/staff.css')}}">
@endsection

@section('main')
    <div class="main">
        <div class="session1 flex_row">
            <h3>All Suppliers</h3>
            <a href="{{route('SupplierCreate')}}">+ Add Supplier</a>
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
                        <th class="first_title">Supplier Name</th>
                        <th>Brand</th>
                        <th class="last_title">Action</th>
                    </tr>
                    @foreach ($supplierlists as $supplierlist)
                            <tr>
                                <td>{{$supplierlist->name}}</td>
                                <td>{{$supplierlist->brand_name}}</td>
                                <td>
                                    <a href="{{url('admin/dashboard/supplierlist/edit/'.$supplierlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{url('admin/dashboard/supplierlist/delete/'.$supplierlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
@endsection