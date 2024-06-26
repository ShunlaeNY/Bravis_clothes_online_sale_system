@extends('layouts.adminlayout')
@section('title')
    Bravis | OrderList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
{{-- @dd($order_items); --}}
@section('main')

    <div class="main">
        <h3>Order</h3>
            <form action="{{route('SearchOrders')}}" method="get" class="session2">
                {{-- @csrf --}}
                <div class="grid order-grid">
                    <div class="flex_col">
                        <small>Order Start Date</small>
                        <input type="date" name="orderstartdate">
                    </div>
                    <div class="flex_col">
                        <small>Order End Date</small>
                        <input type="date" name="orderenddate">
                    </div>
                    <div>
                        <input type="text" placeholder="Search" name="search">
                    </div>
                    <div class="buttons flex_row">
                        <button type="submit" class="filter_button button">Search</button>
                        <a href="{{route('OrderList')}}" class="reset_button button">Reset</a>
                    </div>
                </div>
            </form>
        <div class="session3">
            <div>
                @if ($orders->isEmpty())
                    <div class="flex_row" style="justify-content: center"><p>No order meets your requirements!</p></div>
                @else
                <table>
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Customer Name</th>
                        <th class="customer">Order Qty</th>
                        <th class="price">Total Price</th>
                        <th class="orderdate">Ordered Date</th>
                        <th class="paymentinfo">Payment info</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>
                    {{-- {{dd($orders)}} --}}
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->customer_fname}} {{$item->customer_lname}}</td>
                            <td class="customer">{{$item->total_qty}}</td>
                            <td class="price">{{$item->total_price}}</td>
                            <td class="orderdate">{{$item->created_at}}</td>
                            <td class="paymentinfo">{{$item->paymentmethod}}</td>
                            <td>
                                @if ($item->status == "Pending")
                                    <div class="status-btn pending-btn">{{$item->status}}</div>
                                @elseif ($item->status == "Processing")
                                    <div class="status-btn processing-btn">{{$item->status}}</div>
                                @elseif ($item->status == "Delivered")
                                    <div class="status-btn delivered-btn">{{$item->status}}</div>
                                @endif
                            </td>
                            <td>
                                <button class="infoBtn" data-order-id="{{ $item->id }}">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>
                                <button class="editStatusBtn" data-order-id="{{$item->id}}" data-order-status="{{$item->status}}"><i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                            
                        </tr>

                        {{-- Info Modal for each product --}}
                        <div id="infoModal_{{ $item->id }}" class="modal">
                            <div class="modal-content">
                                <div class="flex_row" style="justify-content: space-between;">
                                    <h2>Order Details</h2>
                                    <span class="close_info">&times;</span>
                                </div>
                                <div class="scrolldetail">
                                    <div class="flex_col" style="margin-bottom: 30px">
                                        @if (isset($orderitems[$item->id]))
                                            <div class="order-detail-grid grid">
                                                @foreach ($orderitems[$item->id] as $orderitem)
                                                <div style="padding:10px 0px;">
                                                    <img src="{{asset('image/admin/products_info/'.$orderitem->product_image)}}" alt="" width="100px" height="100px">
                                                </div>
                                                <div >
                                                    
                                                    <p>Product Name :{{$orderitem->product_name}}</p>
                                                    <p>Quantity :{{$orderitem->qty}}</p>
                                                    <p>Price :{{$orderitem->price}}</p>
                                                    
                                                </div>
                                                {{-- <hr> --}}
                                                @endforeach
                                            </div>
                                            
                                        @else
                                            
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach   
                </table>
                @endif
                
            </div>
        </div>
        {{-- <div class="Pagination">
            {{$orders->links('pagination::bootstrap-4')}}
        </div> --}}
        <div class="Pagination">
            {{ $orders->appends(['search' => request('search'), 'orderstartdate' => request('orderstartdate'),'orderenddate' => request('orderenddate')])->links('pagination::bootstrap-4') }}
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="flex_row" style="justify-content: space-between;">
                    <h3>Update Status</h3>
                    <span class="close">&times;</span>
                </div>
                <div style="font-size: 14px;">
                    <p><b>Pending</b> - Customer ordered items and haven't checked by the admins</p>
                    <p><b>Processing</b> - Order has been checked and start delivering</p>
                    <p><b>Delivered</b> - Order had been reached to customer</p>
                </div>
                <form action="{{ route('updateOrderStatus') }}" method="post" class="updatestatusform">
                    @csrf
                    <input type="hidden" name="order_id" id="modal_order_id">
                    <div class="flex_row">
                        <label for="update_status"><b>Change:</b></label>
                        <select name="update_status" id="update_status" class="update_status">
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <div class="flex_row" style="justify-content: flex-end">
                        <button type="submit" class="change_button">Change</button>
                    </div>   
                </form>
            </div>
        </div>
        
    </div>
    
  </div>
    </div>
    


    {{-- <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var editButtons = document.querySelectorAll('.editStatusBtn');
        var orderIdInput = document.getElementById('modal_order_id');
        var statusSelect = document.getElementById('update_status');
    
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var orderId = this.getAttribute('data-order-id');
                var currentStatus = this.getAttribute('data-order-status');
                
                orderIdInput.value = orderId;
                statusSelect.value = currentStatus;
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


{{-- info --}}
    {{-- JavaScript for Info Modals --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var infoButtons = document.querySelectorAll('.infoBtn');

            infoButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var orderId = this.getAttribute('data-order-id');
                    var modal = document.getElementById("infoModal_" + orderId);
                    modal.style.display = "block";
                });
            });

            var closeInfoSpans = document.querySelectorAll('.close_info');
            closeInfoSpans.forEach(function (span) {
                span.addEventListener('click', function () {
                    var modal = this.closest('.modal');
                    modal.style.display = "none";
                });
            });

            window.onclick = function (event) {
                var modals = document.querySelectorAll('.modal');
                modals.forEach(function (modal) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            }
            // window.onclick = function(event) {
            //         if (event.target == modal) {
            //             modal.style.display = "none";
            //         }
            //     }
        });
    </script>
@endsection
