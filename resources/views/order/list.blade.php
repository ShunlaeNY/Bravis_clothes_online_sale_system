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
                        <th>Date</th>
                        <th>Payment info</th>
                        <th class="last_title">Status</th>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_cancelled">Cancelled</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Delivered</div></td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_cancelled">Cancelled</div></td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_pending">Pending</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Delivered</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Delivered</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Processing</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Delivered</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Delivered</div></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sweater</td>
                        <td>Aung Kyaw</td>
                        <td>53,000MMK</td>
                        <td>13/2/23</td>
                        <td>Debit Card</td>
                        <td><div class="status status_complete">Processing</div></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="last_row_left">
                            <div class="page_info">
                                Showing 1-10 of 30
                            </div>
                        </td>
                        <td colspan="5" class="last_row_right">
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
@endsection
