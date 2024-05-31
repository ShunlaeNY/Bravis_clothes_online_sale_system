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
                                        <button class="deleteBtn" data-category-id="{{ $categorylist->id}}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button> 
                                    @else
                                        <a href="{{url('admin/dashboard/categorylist/edit/'.$categorylist->id)}}" class="btn edit-btn disable_btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <i class="fa-regular fa-trash-can"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach     
                </table>

            </div>
            <div class="Pagination">
                {{$categorylists->links('pagination::bootstrap-4')}}
            </div>

            <!-- The Modal -->
            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <div class="flex_row" style="justify-content: space-between;">
                        <h3>Delete Category</h3>
                        <span class="close">&times;</span>
                    </div>
                    <p>Do you want to delete this category?</p>
                    <form id="deleteForm" action="{{ route('CategoryDelete') }}" method="post" class="flex_row" style="justify-content: flex-end">
                        @csrf
                            <input type="hidden" name="category_id" id="modal_category_id">
                                <button type="submit" class="change_button">Delete</button>
                    </form>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.getElementById("deleteModal");
                    var span = document.getElementsByClassName("close")[0];
                    var deleteButtons = document.querySelectorAll('.deleteBtn');
                    var categoryIdInput = document.getElementById('modal_category_id');
    
                    deleteButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            var categoryId = this.getAttribute('data-category-id');
                            categoryIdInput.value = categoryId;
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
        
    </div>
@endsection