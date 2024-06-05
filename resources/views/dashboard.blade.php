@extends('layouts.adminlayout')

@section('title')
   Bravis | Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/index.css')}}">
@endsection

@section('main')
        <div class="main">
            <div class="session1 grid">
                <div class="total_earnings">
                    <p>Total Earnings</p>
                    <p>{{$TotalEarning}} MMK </p>
                </div>
                <div class="total_expenses">
                    <p>Total Products</p>
                    <p>{{$productCount}}</p>
                </div>
                <div class="clients">
                    <p>Clients</p>
                    <p>{{$supplierCount}}</p>
                </div>
                <div class="page_visitors">
                    <p>Page Visitors</p>
                    <p>{{$userCount}}</p>
                </div>
            </div>
            <div class="session3 grid">
                <div class="total_order flex_row">
                    <img src="{{asset('image/admin/icon/Total Order.svg')}}" alt="" width="60px" height="65px">
                    <div>
                        <p>Total Order</p>
                        <p >{{$TotalOrder}}</p>
                    </div>
                </div>
                <div class="order_pending flex_row">
                    <img src="{{asset('image/admin/icon/Pending.svg')}}" alt="" width="60px" height="60px">
                    <div>
                        <p>Order Pending</p>
                        <p >{{$TotalOrderPending}}</p>
                    </div>
                </div>
                <div class="order_processing flex_row">
                    <img src="{{asset('image/admin/icon/Processing.svg')}}" alt="" width="60px" height="60px">
                    <div>
                        <p>Order Processing</p>
                        <p >{{$TotalOrderProcessing}}</p>
                    </div>
                </div>
                <div class="order_delivered flex_row">
                    <img src="{{asset('image/admin/icon/Delivered.svg')}}" alt="" width="60px" height="60px">
                    <div>
                        <p>Order Delivered</p>
                        <p >{{$TotalOrderDelivered}}</p>
                    </div>
                </div>
            </div>
            <div class="session4 grid">
                <div class="flex_col pie"  >
                    <div class="flex_row">
                        <p>Top selling products</p>
                        <div class="men_women_btn_pie">
                            <button>Men</button>
                            <button>Women</button>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div id="piechart"></div>
                    </div>
                </div>
                <div class="flex_col chart">
                    <div class="flex_row">
                        <p>Sale Statics</p>
                    </div>
                    <div style="width: 80%; padding:10px 20px;">
                        <canvas id="myChart"></canvas>    
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    {{-- <script type="text/javascript" src="{{asset('js/admin/pie_chart.js')}}"></script> --}}
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Categories', 'Total Orders'],
            ['Women Fashion', {{$women_fashion_order}}],
            ['Men Fashion', {{$men_fashion_order}}],
            ['Accessories',  {{$accessories_order}}],
            ['Sport Wrears',{{$sport_wear_order}}]
        ]);

        var options = {
            title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
    </script>
    {{-- <script src="{{asset('js/admin/bar_chart.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js">
    </script>
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            // Sales data passed from the controller
            const salesData = @json($monthlySales);
            

            const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const barColors = ["blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue"];

            new Chart("myChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: "Sales",
                        backgroundColor: barColors,
                        data: salesData
                    }]
                },
                options: {
                    legend: {
        display: false,
    },
                    title: {
                        display: false,
                        text: "kkkkk"
                    },
                    scales:{
                        y:{
                            beginAtZero:true
                        }
                    }
                }
            });
        });
    </script>
@endsection