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
                legend: { position: "none" },

                hAxis: {
                    title: '% Consumed',
                    minValue: 0,
                    maxValue: 100
                },
                vAxis: {
                    title: 'Food'
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
                legend: { position: "none" },
                hAxis: {title: 'Day of Week'},
                vAxis: {minValue: 0, maxValue:100}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
            chart.draw(data, options);
        }
    </script>

    <div class="container">
        <h2>Header Info</h2>
        <p>Daily Progress = {{ $today->percentage }}% </p>
        <p>Date picker = on select, go to route with new date</p>
        <h2>Cards</h2>



        <div class="card-wrapper">
        @foreach ($foods as $food)
            <div class="{{ ($today->{"$food->slug"} >= $food->recommended) ? 'green' : '' }} food-card">
                <a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a>
                <br>
                <i class="fas fa-minus-circle" onclick='increment(-1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}")'></i>
                <input class="table-data" disabled size=3 id='{{$food->slug }}-{{$today->id}}' value='{{ $today->{"$food->slug"} }}'> / {{ $food->recommended }}
                <i class="fas fa-plus-circle" onclick='increment(1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}" )'></i>
            </div>
        @endforeach
        </div>

        <h2>Weekly Report</h2>
        <div id="chart_div2" style="width: 900px; height: 500px"></div>
        <div id="chart_div" style="width: 900px; height: 500px;"></div>


    </div>

@endsection

<script>
    function increment(incrementor, target, recommended) {
        console.log(target);
        var value = parseInt(document.getElementById(target).value);
        value+=incrementor;
        if (value > recommended) {
        } else {
            document.getElementById(target).value = value;

            var data = target.split("-");

            if ( value >= recommended ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#26ce81";
            }

            $.ajax({
                url: "/save2",
                cache: false,
                data: {
                    food: data[0],
                    dayId: data[1],
                    value: value
                }
            })
                    .done(function (response) {
                        console.log(response);
                        console.log('yes');
                    })
                    .fail(function () {
                        console.log("error");
                    });
        }
    }
</script>