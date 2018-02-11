@extends('layouts.app')

@include('partials.nav')
@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['Food', '% Consumed'],
            ['Beans', {{ $week['beans'] }}],
            ['Greens', {{ $week['greens'] }}],
            ['Cruciferous', {{ $week['cruciferous'] }}],
            ['Berries', {{ $week['berries'] }}],
            ['Fruits', {{ $week['fruits'] }}],
            ['Vegetables', {{ $week['vegetables'] }}],
            ['Grains', {{ $week['grains'] }}],
            ['Flaxseeds', {{ $week['flaxseeds'] }}],
            ['Nuts', {{ $week['nuts'] }}],
            ['Spices', {{ $week['spices'] }}],
            ['Beverages', {{ $week['water'] }}],
            ['Exercise', {{ $week['exercise'] }}]
        ]);

        var options = {
            title: 'Percentage Of Each Food\u0027s Recommended Servings Consumed In The Last 7 Days',
            legend: { position: "none" },

            hAxis: {
                minValue: 0,
                maxValue: 100
            },
            vAxis: {
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Day', '% of Total'],
            ['{{ $days[6] }}',  {{ $percentage[6] }}],
            ['{{ $days[5] }}',  {{ $percentage[5] }}],
            ['{{ $days[4] }}',  {{ $percentage[4] }}],
            ['{{ $days[3] }}',  {{ $percentage[3] }}],
            ['{{ $days[2] }}',  {{ $percentage[2] }}],
            ['{{ $days[1] }}',  {{ $percentage[1] }}],
            ['{{ $days[0] }}',  {{ $percentage[0] }}]
        ]);

        var options = {
            title: 'Percentage of Total Recommended Servings Consumed In The Last 7 Days',
            legend: { position: "none" },
            vAxis: {minValue: 0, maxValue:100}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
    }
</script>

<div class="container">
  <div class="user-nav">
    <a href="/home">Daily Dashboard</a>
    <a class="active-nav-item" href="#">Weekly Report</a>
    <a href="/welcome">Welcome To Vegaroo</a>
  </div>
  <h2>Your Progress Over The Last 7 Days</h2>
  <div id="chart_div2" style="width: 100%; height: 500px"></div>
  <div id="chart_div" style="width: 100%; height: 500px;"></div>
</div>


@endsection
