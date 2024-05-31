@extends('layouts.adminlayout')

@section('title')
    Bravis | StaffList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
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
            <form action="{{route('SearchStaffs')}}" method="post" class="grid">
                @csrf
                    {{-- {{dd($roles);}} --}}
                <input type="text" name="search" placeholder="Search">
                <select name="role" id="roles">
                    <option value="role">Search by Roles...</option>
                    @foreach ($roles as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{route('StaffList')}}" class="reset_button button">Reset</a>
                </div>
            </form>
        </div>
        <div class="session3">
            <table>
                <tr>
                    <th class="first_title">Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Position</th>
                    <th class="last_title">Action</th>
                </tr>

                    @foreach ($stafflists as $stafflist)
                        <tr>
                            <td>
                                <div class="flex_row staff_img">
                                    <img src="{{asset('image/admin/staffs_info/'.$stafflist->image)}}" alt="" width="35" height="35">
                                    {{$stafflist->name}}
                                </div>
                            </td>
                            <td>{{$stafflist->email}}</td>
                            <td>{{$stafflist->address}}</td>
                            <td>{{$stafflist->phonenumber}}</td>
                            <td>{{$stafflist->rolename}}</td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                    <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button class="deleteBtn" data-staff-id="{{ $stafflist->id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>

                                @else
                                    <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <i class="fa-regular fa-trash-can"></i>
                                 @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="Pagination">
            {{$stafflists->links('pagination::bootstrap-4')}}
        </div>

        <!-- The Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <div class="flex_row" style="justify-content: space-between;">
                    <h3>Delete Staff</h3>
                    <span class="close">&times;</span>
                </div>
                <p>Do you want to delete this staff?</p>
                <form id="deleteForm" action="{{ route('StaffDelete') }}" method="post" class="flex_row" style="justify-content: flex-end">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <input type="hidden" name="staff_id" id="modal_staff_id">
                    <button type="submit" class="change_button">Delete</button>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById("deleteModal");
                var span = document.getElementsByClassName("close")[0];
                var deleteButtons = document.querySelectorAll('.deleteBtn');
                var staffIdInput = document.getElementById('modal_staff_id');

                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var staffId = this.getAttribute('data-staff-id');
                        staffIdInput.value = staffId;
                        modal.style.display = "block";
                    });
                });

                span.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            });
        </script>
    </div>
@endsection