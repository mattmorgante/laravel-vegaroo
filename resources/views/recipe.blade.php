@extends('layouts.app')

@include('includes.recipe-seo')

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
                ['Carbs',     carbs],
                ['Protein',      protein],
                ['Fat',  fat]
            ]);

            var options = {
                legend: {position: 'top'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }


        function drawBasic() {

            var fiber ={!! $recipe->fiber!!};
            var sugar = {!! $recipe->sugar !!};

            var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Grams'],
                ['Fiber', fiber],
                ['Sugar', sugar]
            ]);

            var options = {
                legend: {position: 'none'},
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

<br>
    <div class="flexible_row">
        <div class="row_item recipe_detail">
            <h1>{{ $recipe->title }}</h1>
            <p>{{ $recipe->description }}</p>
            <div class="recipe_extras">
                {{--<p><span class="call-out-small">Cost: </span><br>{{ $recipe->cost }}</p>--}}
                <p><span class="call-out-small">Time: </span><br>{{ $recipe->time }}</p><br>
                <p><span class="call-out-small">Calories: </span><br>{{ $recipe->calories }}</p>
                {{--<p><span class="call-out-small">Nutritional Quality:</span> <br>{{ $recipe->score }} / 10</p>--}}
            </div>
        </div>
        <div class="row_item instructions">
            <h2>Ingredients: </h2>
            @foreach($ingredients as $ingredient )
                <ul>
                    <li>{{ $ingredient }}</li>
                </ul>
            @endforeach
        </div>
        <div class="row_item instructions">
            <h2>Instructions: </h2>
            @foreach($instructions as $i=>$instruction)
                <p>{{$i+1}}. {{$instruction}}</p>
            @endforeach
        </div>
    </div>

    <div class="flexible_row">
        <div class="row_item">
            <h2>Macro Nutrient Information</h2>
            <h3>{{ $recipe->calories }} Calories</h3>
            <div id="piechart" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="row_item">
            <h2>Micro Nutrient Information</h2>
            <div id="chart_div" style="width: 100%; height: 300px;"></div>
        </div>

    </div>

    <h3>More {{ $categoryName }}</h3>
    <div class="flexible_row">
        @foreach ($similarRecipes as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </div>

    <hr>

    <h2 class="other-recipes">Other Recipes</h2>

    @include('partials.grain-bowls')
    @include('partials.curries')
    @include('partials.snacks')

<br>

    {{--<div class="notes">--}}
        {{--<h4>Additional Notes</h4>--}}
    {{--<ul>--}}
        {{--@foreach($notes as $note)--}}
            {{--<li>{{$note}}</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}

    {{--<div class="related">--}}
        {{--<h4>Related Links</h4>--}}
        {{--<ul>--}}
            {{--<li>Either from around the web or internal links? .... not sure yet , probably both</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
@endsection