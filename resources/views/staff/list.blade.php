@extends('layouts.adminlayout')

@section('title')
    Bravis | StaffList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection

@section('main')
{{-- alert --}}
<div class="alert warning">
    <span class="closebtn">&times;</span>  
    <strong>Warning!</strong> You don't have Permissions for this action!
</div>
    <div class="main">
        <div class="session1 flex_row">
            <h3>All Staffs</h3>
            @if (auth('admin')->user()->role_id === 1)
                <a href="{{route('StaffCreate')}}">+ Add Staff</a>
            @else 
                 <a class="disable_btn" >+ Add Staff</a>
            @endif
        </div>
        <div class="session2">
            <form action="{{route('SearchStaffs')}}" method="get" class="grid">
                {{-- @csrf --}}
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
            @if ($stafflists->isEmpty())
                    <div class="flex_row" style="justify-content: center"><p>No staff meets your requirements!</p></div>
            @else
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Name</th>
                        <th class="email">Email</th>
                        <th class="address">Address</th>
                        <th class="phone">Phone Number</th>
                        <th>Position</th>
                        <th class="last_title">Action</th>
                    </tr>

                        @foreach ($stafflists as $stafflist)
                            <tr>
                                <td>{{$stafflist->id}}</td>
                                <td>
                                    <div class="flex_row staff_img">
                                        <img src="{{asset('image/admin/staffs_info/'.$stafflist->image)}}" alt="" width="35" height="35">
                                        {{$stafflist->name}}
                                    </div>
                                </td>
                                <td class="email">{{$stafflist->email}}</td>
                                <td class="address">{{$stafflist->address}}</td>
                                <td class="phone">{{$stafflist->phonenumber}}</td>
                                <td>{{$stafflist->rolename}}</td>
                                <td>
                                    @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/stafflist/edit/'.$stafflist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="deleteBtn" data-staff-id="{{ $stafflist->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>

                                    @else
                                        <i class="fa-solid fa-pen-to-square disable_btn"></i>
                                        <i class="fa-regular fa-trash-can disable_btn"></i> 
                                    @endif
                                </td>
                            </tr>
                            {{-- Warning Modal for each staff --}}
                            <div id="warningModal_{{ $stafflist->id }}" class="modal">
                                <div class="modal-content">
                                    <div class="flex_row" style="justify-content: space-between;">
                                        <h2>Warning</h2>
                                        <span class="close">&times;</span>
                                    </div>
                                    <p>You don't have permission for this action.</p>
                                </div>
                            </div>
                        @endforeach
                </table>
            @endif
        </div>
        {{-- <div class="Pagination">
            {{$stafflists->links('pagination::bootstrap-4')}}
        </div> --}}
        <div class="Pagination">
            {{ $stafflists->appends(['search' => request('search'), 'role' => request('role')])->links('pagination::bootstrap-4') }}
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
        {{-- <script>
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
        </script> --}}
        {{-- JavaScript for Modals --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // // Info Modals
                // var infoButtons = document.querySelectorAll('.infoBtn');
                // infoButtons.forEach(function (button) {
                //     button.addEventListener('click', function () {
                //         var productId = this.getAttribute('data-product-id');
                //         var modal = document.getElementById("infoModal_" + productId);
                //         modal.style.display = "block";
                //     });
                // });

                // Warning Modals
                var warningButtons = document.querySelectorAll('.warningBtn');
                warningButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var staffId = this.getAttribute('warn-staff-id');
                        var modal = document.getElementById("warningModal_" + staffId);
                        modal.style.display = "block";
                    });
                });

                // Close Modals
                var closeSpans = document.querySelectorAll('.close');
                closeSpans.forEach(function (span) {
                    span.addEventListener('click', function () {
                        var modal = this.closest('.modal');
                        modal.style.display = "none";
                    });
                });

                // Window click to close modals
                window.onclick = function (event) {
                    var modals = document.querySelectorAll('.modal');
                    modals.forEach(function (modal) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    });
                }

                // Delete Modal
                var deleteModal = document.getElementById("deleteModal");
                var deleteButtons = document.querySelectorAll('.deleteBtn');
                var staffIdInput = document.getElementById('modal_staff_id');
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var staffId = this.getAttribute('data-staff-id');
                        staffIdInput.value = staffId;
                        deleteModal.style.display = "block";
                    });
                });

                // Close delete modal
                var span = document.getElementsByClassName("close")[0];
                span.onclick = function () {
                    deleteModal.style.display = "none";
                }
            });
        </script>
    </div>
@endsection