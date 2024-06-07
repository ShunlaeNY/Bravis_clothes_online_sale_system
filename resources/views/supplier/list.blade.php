@extends('layouts.adminlayout')

@section('title')
    Bravis | SupplierList
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/product/product.css') }}">
@endsection

@section('main')
    {{-- alert --}}
    <div class="alert warning">
        <span class="closebtn">&times;</span>  
        <strong>Warning!</strong> You don't have Permissions for this action!
    </div>


    <div class="main">
        <div class="session1 flex_row">
            <h3>All Suppliers</h3>
            {{-- <button class="alert_btn">+ Add Supplier</button> --}}
            @if (auth('admin')->user()->role_id === 1)
                <a href="{{ route('SupplierCreate') }}">+ Add Supplier</a>
            @else
                <a class="alert_btn">+ Add Supplier</a>
            @endif
        </div>
        <div class="session2">
            <form action="{{ route('SearchSuppliers') }}" method="get" class="grid">
                {{-- @csrf --}}
                <input type="text" name="supplier_name" placeholder="Search by Supplier Name">
                <input type="text" name="brand_name" placeholder="Search by Brand">
                <div class="buttons flex_row">
                    <button type="submit" class="filter_button button">Filter</button>
                    <a href="{{ route('SupplierList') }}" class="reset_button button">Reset</a>
                </div>
            </form>
        </div>
        <div class="session3">
            <div style="overflow-x: auto;">
                <table class="supplier_table">
                    <tr>
                        <th class="first_title">Supplier Name</th>
                        <th>Brand</th>
                        <th class="last_title">Action</th>
                    </tr>
                    @foreach ($supplierlists as $supplierlist)
                        <tr>
                            <td>{{ $supplierlist->name }}</td>
                            <td>{{ $supplierlist->brand_name }}</td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                    <a href="{{ url('admin/dashboard/supplierlist/edit/' . $supplierlist->id) }}" class="btn edit-btn">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button class="deleteBtn" data-supplier-id="{{ $supplierlist->id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                @else
                                    <button class="warningBtn" warn-supplier-id="{{ $supplierlist->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="warningBtn" warn-supplier-id="{{ $supplierlist->id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                    @endif
                            </td>
                        </tr>
                        {{-- Warning Modal for each supplier --}}
                        <div id="warningModal_{{ $supplierlist->id }}" class="modal">
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
            </div>
        </div>
        <div class="Pagination">
            {{ $supplierlists->links('pagination::bootstrap-4') }}
        </div>

        <!-- The Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <div class="flex_row" style="justify-content: space-between;">
                    <h3>Delete Supplier</h3>
                    <span class="close">&times;</span>
                </div>
                <p>Do you want to delete this supplier?</p>
                <form id="deleteForm" action="{{ route('SupplierDelete') }}" method="post" class="flex_row" style="justify-content: flex-end">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <input type="hidden" name="supplier_id" id="modal_supplier_id">
                    <button type="submit" class="change_button">Delete</button>
                </form>
            </div>
        </div>

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById("deleteModal");
                var span = document.getElementsByClassName("close")[0];
                var deleteButtons = document.querySelectorAll('.deleteBtn');
                var supplierIdInput = document.getElementById('modal_supplier_id');

                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var supplierId = this.getAttribute('data-supplier-id');
                        supplierIdInput.value = supplierId;
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
                        var supplierId = this.getAttribute('warn-supplier-id');
                        var modal = document.getElementById("warningModal_" + supplierId);
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
                var staffIdInput = document.getElementById('modal_supplier_id');
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var staffId = this.getAttribute('data-supplier-id');
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
