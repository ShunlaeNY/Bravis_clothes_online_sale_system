@extends('layouts.adminlayout')

@section('title')
    Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/index.css')}}">
@endsection

@section('main')
    <div class="main">
        <div class="session1 grid">
            <div class="total_earnings">
                <p>Total Earnings</p>
                <p>K 45900000</p>
            </div>
            <div class="total_expenses">
                <p>Total Expenses</p>
                <p>K 1520000</p>
            </div>
            <div class="clients">
                <p>Clients</p>
                <p>8925</p>
            </div>
            <div class="page_visitors">
                <p>Page Visitors</p>
                <p>135000</p>
            </div>
        </div>
        <div class="session2 flex_row">
            <div class=" date flex_row">
                <div class="today">
                    Today
                </div>
                <div>Week</div>
                <div>Month</div>
                <div>Year</div>
            </div>
            <div class="filter flex_row">
                    
                <input type="date" name="" id="">
                <div>
                    <i class="fa-solid fa-filter"></i>
                </div>
            </div>
        </div>
        <div class="session3 grid">
            <div class="total_order flex_row">
                <img src="/image/icon/Total Order.svg" alt="">
                <div>
                    <p>Total Order</p>
                    <p>500</p>
                </div>
            </div>
            <div class="order_pending flex_row">
                <img src="/image/icon/Pending.svg" alt="">
                <div>
                    <p>Order_pending</p>
                    <p>125</p>
                </div>
            </div>
            <div class="order_processing flex_row">
                <img src="/image/icon/Processing.svg" alt="">
                <div>
                    <p>Order Processing</p>
                    <p>65</p>
                </div>
            </div>
            <div class="order_delivered flex_row">
                <img src="/image/icon/Delivered.svg" alt="">
                <div>
                    <p>Order Delivered</p>
                    <p>310</p>
                </div>
            </div>
        </div>
        <div class="session4 grid">
            <div class="flex_col">
                <div class="flex_row">
                    <p>Top selling products</p>
                    <div>
                        <button>Men</button>
                        <button>Women</button>
                    </div>
                </div>
                <div id="piechart" style="width: 100% !important;height:300px;"></div>
            </div>
            <div class="flex_col">
                <div class="flex_row">
                    <p>Sale Statics</p>
                </div>
                <canvas id="myChart" style="width: 100% !important;height: 300px;"></canvas>
                
            </div>
        </div>
        <div class="session5">
            <p>Recent Transitions</p>
            <div class="filter_entry flex_row">
                <div>
                    Show
                    <select name="" id="select_entry">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    entries
                </div>
                <div>
                    <label for="">Search:</label>
                    <input type="text" id="select_input">
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="transition_table">
                    <tr>
                        <th class="first_title">ID</th>
                        <th>Product</th>
                        <th>Customer Name</th>
                        <th>Price</th>
                        <th>Payment Info</th>
                        <th class="last_title">Status</th>
                    </tr>
                    <tr>
                        <td>#Order111</td>
                        <td>
                            <div class="flex_row">
                                <div class="product_img"></div>
                                <p>Polo Shirt</p>
                            </div>
                        </td>
                        <td>Mg Myo</td>
                        <td>25,450MMK</td>
                        <td>Credit Card</td>
                        <td>
                            <div class="status status_complete">Complete</div>
                        </td>
                    </tr>
                    <tr>
                        <td>#Order111</td>
                        <td>
                            <div class="flex_row">
                                <div class="product_img"></div>
                                <p>Polo Shirt</p>
                            </div>
                        </td>
                        <td>Mg Myo</td>
                        <td>25,450MMK</td>
                        <td>Credit Card</td>
                        <td>
                            <div class="status status_pending">Pending</div>
                        </td>
                    </tr>
                    <tr>
                        <td>#Order111</td>
                        <td>
                            <div class="flex_row">
                                <div class="product_img"></div>
                                <p>Polo Shirt</p>
                            </div>
                        </td>
                        <td>Mg Myo</td>
                        <td>25,450MMK</td>
                        <td>Credit Card</td>
                        <td>
                            <div class="status status_cancelled">Cancelled</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="last_row_left">
                            <div class="page_info">
                                Showing 1-3 of 30
                            </div>
                        </td>
                        <!-- <td colspan="4" class="last_row_right">
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </td> -->
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/admin/pie_chart.js')}}"></script>
    <script src="{{asset('js/admin/bar_chart.js')}}"></script>
@endsection