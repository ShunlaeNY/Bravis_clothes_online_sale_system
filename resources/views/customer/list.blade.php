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
            <form action="{{route('SearchCustomers')}}" method="post" class="grid">
                @csrf
                <input type="text" name="search" placeholder="Search">
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{route('CustomerList')}}" class="reset_button button">Reset</a>
                </div>
            </form>
        </div>
        <div class="session3">
            <div>
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer's Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>

                    @foreach ($customerlists as $customerlist)
                        <tr>
                            <td>{{$customerlist->id}}</td>
                            <td>{{$customerlist->fname}} {{$customerlist->lname}}</td>
                            <td>{{$customerlist->email}}</td>
                            <td>{{$customerlist->address}}</td>
                            <td>{{$customerlist->phonenumber}}</td>
                            <td>{{$customerlist->status}}</td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                        <a href="{{url('admin/dashboard/customerlist/edit/'.$customerlist->id)}}" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>   
                                        <button class="deleteBtn" data-customer-id="{{ $customerlist->id}}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>                                 
                                        @else
                                            <i class="fa-regular fa-trash-can"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="Pagination">
            {{$customerlists->links('pagination::bootstrap-4')}}
        </div>

                <!-- The Modal -->
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

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = document.getElementById("deleteModal");
                        var span = document.getElementsByClassName("close")[0];
                        var deleteButtons = document.querySelectorAll('.deleteBtn');
                        var customerIdInput = document.getElementById('modal_customer_id');
        
                        deleteButtons.forEach(function(button) {
                            button.addEventListener('click', function() {
                                var customerId = this.getAttribute('data-customer-id');
                                customerIdInput.value = customerId;
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
