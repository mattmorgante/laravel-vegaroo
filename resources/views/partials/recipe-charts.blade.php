<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawBasic);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nutrient', 'Grams'],
            ['Carbs', {!! $recipe->carbs !!}],
            ['Protein', {!! $recipe->protein !!}],
            ['Fat', {!! $recipe->fat !!}]
        ]);
        var options = {
            legend: {position: 'top'}
        };
        var chart = new google.visualization.PieChart(document.getElementById('macro_chart'));
        chart.draw(data, options);
    }

    function drawBasic() {
        var data = google.visualization.arrayToDataTable([
            ['Nutrient', 'Grams'],
            ['Fiber', {!! $recipe->fiber!!}],
            ['Sugar', {!! $recipe->sugar !!}]
        ]);
        var options = {
            legend: {position: 'none'},
            chartArea: {width: '25%'},
            hAxis: {
                minValue: 0
            }
        };
        var chart = new google.visualization.ColumnChart(
            document.getElementById('micro_chart'));
        chart.draw(data, options);
    }
</script>