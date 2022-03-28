@extends('app')

@section('content')

<div id="piechart" style="background-color: black !important;"></div>
<?php 
$suucess = \App\Models\Transaction::where('status', 1)->count();
$fail = \App\Models\Transaction::where('status', 0)->count();
?>
@stop

@section('scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Successful', <?php echo $suucess ?>],
  ['Fail', <?php echo $fail ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Transaction Status', 'width':1200, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

@endsection