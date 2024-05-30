@extends('layouts.adminlayout')
@section('title')
    Bravis | OrderList
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/order/order.css')}}">
@endsection

@section('main')
    <div class="main">
        <h3>Order</h3>
        <div class="session1">
            <div class="grid">
                <div class="flex_col">
                    <small>Order Start Date</small>
                    <input type="date">
                </div>
                <div class="flex_col">
                    <small>Order End Date</small>
                    <input type="date">
                </div>
                <div>
                    <input type="text" placeholder="Search">
                </div>
                <div>
                    <button>Search</button>
                </div>
            </div>
        </div>
        <div class="session3">
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th class="first_title">Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Price</th>
                        <th>Ordered Date</th>
                        <th>Payment info</th>
                        <th>Status</th>
                        <th class="last_title">Action</th>
                    </tr>
                    {{-- {{dd($order_items)}} --}}
                    @foreach ($order_items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->customer_fname}} {{$item->customer_lname}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->paymentmethod}}</td>
                            <td>
                                <div class="status-btn pending-btn">{{$item->status}}</div>
                                {{-- <div class="status-btn processing-btn">{{$item->status}}</div> --}}
                                {{-- <div class="status-btn delivered-btn">{{$item->status}}</div> --}}
                            </td>
                            <td>
                                @if (auth('admin')->user()->role_id === 1)
                                    <button id="myBtn"><i class="fa-solid fa-pen-to-square"></button>
                                @else
                                    <button><i class="fa-solid fa-pen-to-square"></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach   
                </table>
            </div>
        </div>
        <div class="Pagination">
            {{$order_items->links('pagination::bootstrap-4')}}
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="flex_row" style="justify-content: space-between;">
                    <h3>Update Status</h3>
                    <div class="close">&times;</div>
                </div>
                
            <div>
                <select name="update_status" id="update_status">
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
        </div>
    
  </div>
    </div>
    


    <script>
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
        div.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
@endsection
