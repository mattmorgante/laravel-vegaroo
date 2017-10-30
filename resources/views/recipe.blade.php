@extends('layouts.app')

@section('header.javascript')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawBasic);

        var carbs = {!! $recipe->carbs !!};
        var protein ={!! $recipe->protein !!};
        var fat = {!! $recipe->fat !!};

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Grams'],
                ['Carbohydrates',     carbs],
                ['Protein',      protein],
                ['Fat',  fat]
            ]);

            var options = {
                title: 'Macro Nutrient Breakdown'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }


        function drawBasic() {

            var fiber ={!! $recipe->fiber!!};
            var sugar = {!! $recipe->sugar !!};

            var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Grams',],
                ['Fiber', fiber],
                ['Sugar', sugar],
            ]);

            var options = {
                title: 'Micro Nutrient Breakdown',
                chartArea: {width: '25%'},
                hAxis: {
                    minValue: 0,
                }
            };

            var chart = new google.visualization.ColumnChart(
                    document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

@endsection

@section('content')

@include('partials.nav')

    <div class="flexible_row">
        <div class="row_item">
            <h1>{{ $recipe->title }}</h1>
            <p>{{ $recipe->description }}</p>
            <div class="recipe_extras">
                <p>Cost: <br>{{ $recipe->cost }}</p>
                <p>Time: <br>{{ $recipe->time }}</p>
                <p>Nutritional Quality: <br>{{ $recipe->score }} / 10</p>
            </div>
        </div>
        <div class="row_item">
            <h2>Nutritional Information</h2>
            <div id="piechart" style="width: 300px; height: 300px;"></div>
            <div id="chart_div"></div>
        </div>
    </div>

    <div class="flexible_row">
        <div class="row_item">
            <h2>Ingredients: </h2>
            @foreach($ingredients as $ingredient )
                <ul>
                    <li>{{ $ingredient }}</li>
                </ul>
            @endforeach
        </div>
        <div class="row_item">
            <h2>Instructions: </h2>
            @foreach($instructions as $i=>$instruction)
                <p>{{$i+1}}. {{$instruction}}</p>
            @endforeach
        </div>
        <div class="row_item">
            <h2>5</h2>
        </div>
    </div>

    <div class="notes">
        <h4>Additional Notes</h4>
    <ul>
        @foreach($notes as $note)
            <li>{{$note}}</li>
        @endforeach
    </ul>
    </div>

    <div class="related">
        <h4>Related Links</h4>
        <ul>
            <li>Either from around the web or internal links? .... not sure yet , probably both</li>
        </ul>
    </div>
@endsection