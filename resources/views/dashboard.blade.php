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
                <img src="/image/icon/Total Order.svg" alt="">
                <div>
                    <p>Total Order</p>
                    <p>{{$TotalOrder}}</p>
                </div>
            </div>
            <div class="order_pending flex_row">
                <img src="/image/icon/Pending.svg" alt="">
                <div>
                    <p>Order_pending</p>
                    <p>{{$TotalOrderPending}}</p>
                </div>
            </div>
            <div class="order_processing flex_row">
                <img src="/image/icon/Processing.svg" alt="">
                <div>
                    <p>Order Processing</p>
                    <p>{{$TotalOrderProcessing}}</p>
                </div>
            </div>
            <div class="order_delivered flex_row">
                <img src="/image/icon/Delivered.svg" alt="">
                <div>
                    <p>Order Delivered</p>
                    <p>{{$TotalOrderDelivered}}</p>
                </div>
            </div>
        </div>
        <div class="session4 grid">
            <div class="flex_col"  style="width: 100% !important;height:300px !important;">
                <div class="flex_row">
                    <p>Top selling products</p>
                    <div>
                        <button>Men</button>
                        <button>Women</button>
                    </div>
                </div>
                <div id="piechart"></div>
            </div>
            <div class="flex_col" style="width: 100% !important;height: 300px !important;">
                <div class="flex_row">
                    <p>Sale Statics</p>
                </div>
                <canvas id="myChart" style="height: 50px !important;width:100px;"></canvas>    
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
    <script>
        const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep","Oct", "Nov","Dec"];
        const yValues = [580, 560, 200, 90, 350,500,420,700,300,690,490,220];
        const barColors = ["blue","blue","blue","blue","blue","blue","blue","blue","blue","blue","blue","blue"];

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: ""
            }
        }
        });
    </script>
@endsection