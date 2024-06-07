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
            <form action="{{route('SearchCustomers')}}" method="get" class="grid">
                {{-- @csrf --}}
                <input type="text" name="search" placeholder="Search">
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{route('CustomerList')}}" class="reset_button button">Reset</a>
                </div>
            </form>
        </div>
        <div class="session3">
            <div>
                @if ($customerlists->isEmpty())
                    <div class="flex_row" style="justify-content: center"><p>No product meets your requirements!</p></div>
                @else
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th class="email">Email</th>
                        <th class="address">Address</th>
                        <th class="phone">Phone Number</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->id}}</td>
                            <td>{{$customerlist->fname}} {{$customerlist->lname}}</td>
                            <td class="email">{{$customerlist->email}}</td>
                            <td class="address">{{$customerlist->address}}</td>
                            <td class="phone">{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->status}}</td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                    <a href="{{url('admin/dashboard/customerlist/edit/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button class="deleteBtn" data-customer-id="{{ $customerlist->id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                @else
                                    <i class="fa-regular fa-trash-can disable_btn"></i> 
                                @endif
                            </td>
                        </tr>
                        {{-- Warning Modal for each customer --}}
                        <div id="warningModal_{{ $customerlist->id }}" class="modal">
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
        </div>
        {{-- <div class="Pagination">
            {{$customerlists->links('pagination::bootstrap-4')}}
        </div> --}}
        <div class="Pagination">
            {{ $customerlists->appends(['search' => request('name')])->links('pagination::bootstrap-4') }}
        </div>

        <!-- The Delete Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <div class="flex_row" style="justify-content: space-between;">
                    <h3>Delete Customer</h3>
                    <span class="close">&times;</span>
                </div>
                <p>Do you want to delete this customer?</p>
                <form id="deleteForm" action="{{ route('CustomerDelete') }}" method="post" class="flex_row" style="justify-content: flex-end">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <input type="hidden" name="customer_id" id="modal_customer_id">
                    <button type="submit" class="change_button">Delete</button>
                </form>
            </div>
        </div>

        {{-- JavaScript for Modals --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Warning Modals
                var warningButtons = document.querySelectorAll('.warningBtn');
                warningButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var customerId = this.getAttribute('warn-customer-id');
                        var modal = document.getElementById("warningModal_" + customerId);
                        modal.style.display = "block";
                    });
                });

                // Close Warning Modals
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
                var customerIdInput = document.getElementById('modal_customer_id');
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var customerId = this.getAttribute('data-customer-id');
                        customerIdInput.value = customerId;
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
