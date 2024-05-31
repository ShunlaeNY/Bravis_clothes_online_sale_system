
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Categories', 'Total Orders'],
    ['Women Fashion',     50],
    ['Men Fashion',      20],
    ['Accessories',  15],
    ['Sport Wrears', 15]
  ]);

  var options = {
    title: ''
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

  chart.draw(data, options);
}