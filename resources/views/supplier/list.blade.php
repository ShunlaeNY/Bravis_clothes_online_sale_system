@extends('layouts.adminlayout')

@section('title')
    Bravis | SupplierList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection

@section('main')
    <div class="main">
        <div class="session1 flex_row">
            <h3>All Suppliers</h3>
            @if (auth('admin')->user()->role_id === 1)
                <a href="{{route('SupplierCreate')}}">+ Add Supplier</a>
            @else
                <a href="{{route('SupplierCreate')}}" class="disable_btn">+ Add Supplier</a>
            @endif
        </div>
        <div class="session2">
            <form action="{{route('SearchSuppliers')}}" method="post" class="grid">
                @csrf
                <input type="text" name="supplier_name" placeholder="Search by Supplier Name">
                <input type="text" name="brand_name" placeholder="Search by Brand">
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{route('SupplierList')}}" class="reset_button button">Reset</a>
                </div>
            </form>
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
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/supplierlist/edit/'.$supplierlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/supplierlist/delete/'.$supplierlist->id)}}" class="btn edit-btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @else
                                        <a href="{{url('admin/dashboard/supplierlist/edit/'.$supplierlist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{url('admin/dashboard/supplierlist/delete/'.$supplierlist->id)}}" class="btn edit-btn disable_btn"><i class="fa-regular fa-trash-can"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
@endsection